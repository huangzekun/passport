<form method="post" action="/loginadd">
{{csrf_field()}}
<input type="hidden" name="url" vlue={{$url}}>
<div class="form-group">
    <label for="exampleInputEmail1">用户名：</label>
    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="请输入用户名">
</div>
<div class="form-group">
    <label for="exampleInputPassword1">密码：</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="user_pwd" placeholder="请输入密码">
</div>
<button type="submit" class="btn btn-success btn-block">登陆</button>
</form>