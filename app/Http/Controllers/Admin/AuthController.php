<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * 認証に利用するID
     *
     */
    protected $username = 'id';

    /**
     * ログイン画面
     *
     * @return view
     */
    public function index()
    {
        return view('admin.auth.login');
    }

    /**
     * ログアウト画面
     *
     * @return view
     */
    public function logout(Request $Request)
    {
        if (Auth::guard('admin')->check()) Auth::guard('admin')->logout();

        return redirect(ADMIN_URL_PREFIX . '/login');
    }

    /**
     * 認証に利用するIDを取得する
     *
     */
    public function username()
    {
        return $this->username;
    }

    /**
     * 認証処理
     *
     * web  : ambassador用
     * admin: administrator用
     *
     * @return view
     */
    public function authenticate(Request $Request)
    {
        $this->validateLogin($Request);
        $id = $Request->input('id');
        $password = $Request->input('password');

        // ログイン試行可能回数とロック時間(分)を設定
        $this->limiter()->tooManyAttempts($this->throttleKey($Request),
                config('app.login_attempt', '5'),
                config('app.login_locktime', '1'));

        if ($this->hasTooManyLoginAttempts($Request)) {
            // ログイン試行回数が制限値を超過したらログイン機能をロック
            $this->fireLockoutEvent($Request);
            return redirect()->back()->with('loginFailed', 'ログイン失敗回数を超過しました。');
        }

        // Administratorアカウントであるか認証します
        Auth::guard('admin');
        $this->username = 'name';
        if (Auth::guard('admin')->attempt(['name' => $id, 'password' => $password ])) return redirect()->route('admin.top');

        // ログイン失敗数をカウントアップ
        $this->incrementLoginAttempts($Request);

        return redirect()->back()->with('loginFailed', 'ログインに失敗しました');
    }
}
