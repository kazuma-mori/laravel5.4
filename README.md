# laravel5.4

### 各種情報
#### 管理画面ログイン
/admin/login<br>
usersテーブルのseederを参照<br>
ID:test<br>
Password:test<br>

##### 認証関係
認証はweb.phpでmiddlewareとして呼び出され<br>
app/Http/Middleware/xxxx.phpで処理されています<br>
使用するテーブル等はconfig/auth.php等で変更してください(デフォルトはusers)<br>


### 変更点
#### テーブル
##### users,password_resets
 - ユニーク制約とすると767bytes以上入らなくなってしまう
 - MariaDB10のデフォルトcharsetがutf8mb4

以上の事からusers,password_resetsテーブルのemailカラムの最大値を128としました。<br>


### Assets
#### Bootstrap
 - 4系を使用しているため、3系と書き方が異なります
 - ※popper.jsが前提として必要なため、呼び出すのを忘れずに

#### AdminLte
 - 2.4を使用しています

#### font-awesome
 - 4.7を使用しています
