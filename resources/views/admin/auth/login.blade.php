@extends('admin.layouts.login')

@section('type')Admin
@endsection

@section('content')
<form action="/{{ ADMIN_URL_PREFIX }}/login" method="POST">
  {{csrf_field()}}

  <div class="form-group has-feedback">
    <input type="text" class="form-control" name="id" id="id" placeholder="ログインID">
    <span class="glyphicon glyphicon-user form-control-feedback"></span>
  </div>

  <div class="form-group has-feedback">
    <input type="password" class="form-control" name="password" placeholder="パスワード">
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
  </div>

  <div class="row">
    <div class="col-xs-12 mx-auto">
      <button type="submit" class="btn btn-primary">ログイン</button>
    </div>
  </div>

</form>
@endsection
