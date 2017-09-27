@extends('auth.layout')

@section('body')
                <div class="container">
                    <div class="content-area">
                        <div class="row">
@if(Session::has('success'))
<div class="alert alert-success alert-dismissable">
    <i class="fa  fa-check-circle"> </i> <b> Success </b>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{Session::get('success')}}
</div>
@endif
@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <b>Alert !</b>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</div>
@endif

 <div class="login-box" style=" width: 500px;"  valign = "center">

 <div class="form-border" id='reset-form'>

<h5 class="login-box-msg">Registration Form</h5>
<div class="panel-body">
        <!-- form open -->
        {!!  Form::open(['action'=>'Auth\LoginController@postRegister', 'method'=>'post','name' => 'add_user_form']) !!}
           		<div class="row">
  
        <div class="form-group has-feedback input-field col s12 {{ $errors->has('user_name') ? 'has-error' : '' }}" ng-class="{ 'has-error' : add_user_form.user_name.$dirty && add_user_form.user_name.$invalid }">
            <input type="text" class="form-control validate"  id="user_name" name="user_name" ng-model="uname" required>
            <label for="uname" data-error="wrong" data-success="right" class="active">User Name</label>
			{!! $errors->first('user_name', '<spam class="help-block">:message</spam>') !!}
			<span class="glyphicon glyphicon-envelope form-control-feedback" style="top: 10px;"></span>
			         <div class="help-block" ng-messages="add_user_form.user_name.$error" ng-if="add_user_form.user_name.$dirty">
          <p ng-message="required">This field is required</p>
		  </div>
        </div>
		</div>

          <!-- Email -->
		             		<div class="row">
  
        <div class="form-group has-feedback input-field col s12 {{ $errors->has('email') ? 'has-error' : '' }}" ng-class="{ 'has-error' : add_user_form.user_email.$dirty && add_user_form.user_email.$invalid }">
            <input type="text" class="form-control validate"  id="user_email" name="user_email" ng-model="email" required>
            <label for="email" data-error="wrong" data-success="right" class="active">Email</label>
			{!! $errors->first('email', '<spam class="help-block">:message</spam>') !!}
			<span class="glyphicon glyphicon-envelope form-control-feedback" style="top: 10px;"></span>
			         <div class="help-block" ng-messages="add_user_form.user_email.$error" ng-if="add_user_form.user_email.$dirty">
          <p ng-message="required">This field is required</p>
		  </div>
        </div>
		</div>

          		<div class="row">
        <div class="form-group has-feedback input-field col s12 {{ $errors->has('password') ? 'has-error' : '' }}" ng-class="{ 'has-error' : add_user_form.user_password.$dirty && add_user_form.user_password.$invalid }">
      
			
			<input type="password" class="form-control validate"  id="user_password" name="user_password"  ng-minlength="8" ng-maxlength="12" required ng-model="user.user_password" password-verify="@{{ user.confirm_password }}">
			<label for="password" data-error="wrong" data-success="right" class="active">Password</label>
            {!! $errors->first('password', '<spam class="help-block">:message</spam>') !!}
			<span class="glyphicon glyphicon-lock form-control-feedback" style="top: 10px;"></span>
			
			<div class="help-block" ng-messages="add_user_form.user_password.$error" ng-if="add_user_form.user_password.$dirty">
          <p ng-message="required">This field is required</p>
          <p ng-message="minlength" ng-if="!add_user_form.user_password.$valid">This field is too short</p>
          <p ng-message="maxlength">This field is too long</p>
          <p ng-message="required">This field is required</p>
          <p ng-message="passwordVerify">No match!</p>
        </div>
        </div>
		</div>
				<div class="row">
        <!-- confirm password -->
        <div class="form-group has-feedback input-field col s12 {{ $errors->has('password_confirmation') ? 'has-error' : '' }}" ng-class="{ 'has-error' : add_user_form.confirm_password.$dirty && add_user_form.confirm_password.$invalid }">

			<input type="password" class="form-control validate" id="confirm_password" ng-model="user.confirm_password" name="confirm_password" required password-verify="@{{ user.user_password }}">
            <label for="confirm_password" data-error="wrong" data-success="right" class="active">Confirm Password</label>
			{!! $errors->first('password_confirmation', '<spam class="help-block">:message</spam>') !!}
			<span class="glyphicon glyphicon-log-in form-control-feedback" style="top: 10px;"></span>
        </div>
		</div>
        <!-- Confirm password -->
        <div class="form-group">
            <div class="col-md-3">              </div>
            <div class="col-md-3">
                <button type="submit" class="waves-effect waves-light btn-large" ng-disabled="add_user_form.$invalid">
                    Register
                </button>
            </div>
        </div>


    {!! Form::close()!!}
</div>
</div>
</div>
    <!-- </div> -->
</div>
</div>
</div>


@stop
