<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class CheckRejectRoute
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // ログイン中のアカウントのroleを取得
        $currentRole = (Auth::guard('web')->getUser()) ? Auth::guard('web')->getUser()->role : Auth::guard('admin')->getUser()->role;

        // アクセス拒否対象ルートを取得
        $rejectRoute = [];
        switch ($currentRole) {

            // Adminアカウント
            case \Config::get('app.role_admin'):
                $rejectRoute = [
                    'member.top',
                ];
                break;
        }

        // リクエスト先がアクセス許可対象ルートに含まれていた場合は404ページを表示
        if (in_array($request->route()->getName(), $rejectRoute)) return response()->view('errors.404');

        return $next($request);
    }
}
