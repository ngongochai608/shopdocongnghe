@extends('layout')
@section('content')

	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập tài khoản</h2>
						<?php
						$message_dn = Session::get('message_dn');
						if($message_dn){
							echo '<span class="text-alert message_dn">'.$message_dn.'</span>';
							Session::put('message_dn',null);
						}
						?>
						<form action="{{URL::to('/login-customer')}}" method="POST">
							{{csrf_field()}}
							<input type="text" name="email_account" placeholder="Tài khoản" />
							<input type="password" name="password_account" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Ghi nhớ đăng nhập
							</span>
							<a href="#" class="quen_mat_khau">Quên mật khẩu</a>
							<button type="submit" class="btn btn-default">Đăng nhập</button>
						</form>
						<div class="login-fb-gg">
						<a href="{{url('/login-facebook')}}">Login Facebook</a> |
						<a href="{{url('/login-google')}}">Login Google</a>
						</div>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Hoặc</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng ký</h2>
						<?php
						$message = Session::get('message');
						if($message){
							echo '<span class="text-alert message">'.$message.'</span>';
							Session::put('message',null);
						}
						?>
						<form action="{{URL::to('/add-customer')}}" method="POST">
							{{ csrf_field() }}
							<input type="text" name="customer_name" placeholder="Họ và tên"/>
							<input type="email" name="customer_email" placeholder="Địa chỉ email"/>
							<input type="password" name="customer_password" placeholder="Mật khẩu"/>
							<input type="text" name="customer_phone" placeholder="Phone"/>
							<div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
							<br/>
							@if($errors->has('g-recaptcha-response'))
							<span class="invalid-feedback" style="display:block">
								<strong>{{$errors->first('g-recaptcha-response')}}</strong>
							</span>
							@endif
							<button type="submit" class="btn btn-default">Đăng ký</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection