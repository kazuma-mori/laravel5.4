<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <meta name="robots" content="noindex">

    <title>{{ PROJECT_NAME }} | @yield('type')</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/adminlte/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/adminlte/dist/css/skins/_all-skins.min.css') }}">

    <!-- JS -->
    <script src="{{ asset('/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
  </head>
  <body class="hold-transition login-page">

    <div class="login-box">
      <div class="login-logo">
        <a href=""><b>{{ PROJECT_NAME }}</b></a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
        @yield('content')
      </div>
      <!-- /.login-box-body -->

      {{-- validationエラー --}}
      @if (count($errors) > 0)
        @php
          $target = [];
          if ($errors->first('id'))       $target[] = 'ログインID';
          if ($errors->first('password')) $target[] = 'パスワード';
          $msg = sprintf('%sを入力してください。', implode('、', $target));
        @endphp
        <p class="text-danger" style="text-align: center;">{{ $msg }}</p>
      @endif

      {{-- ログイン失敗 --}}
      @if (session()->has('loginFailed'))
        <p class="text-danger" style="text-align: center;">ログインに失敗しました。</p>
      @endif

    </div>
    <!-- /.login-box -->
  </body>
</html>
