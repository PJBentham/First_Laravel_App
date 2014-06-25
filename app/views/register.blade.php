@extends('layouts.default')

@section('content')
<div class="row">
          <div style="padding-top: 100px; padding-left: 40px;" class="col-sm-3 col-sm-offset-3">
	<form action="secure/sec_reg.php" method="post" name="registration_form" class="form-horizontal">
            <div class="control-group">
              <label class="control-label" for="inputUser">Username</label>
              	<div class="controls">
                	<input type="text" id="username" name="username"placeholder="Username">
            	</div>
        	</div>
            <div class="control-group">
              <label class="control-label" for="inputEmail">Email</label>
              <div class="controls">
                <input type="text" id="email" name="email"placeholder="Email">
            </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputPassword">Password</label>
          <div class="controls">
            <input type="password" name="password" id="password" placeholder="Password">
            <input type="hidden" name="p" id="p" value="">
        </div>
    </div>
    <div style="padding-top: 20px;" class="control-group">
      <div class="controls">
          <button type="submit" class="btn" onclick="formhash(this.form, this.form.password, this.form.p);">Register</button>            
      </div>
  	</div>
  </form>
</div>
@stop