@extends('frontend.master')
@section('content')
	<div class="inner-header">
			<div class="container">
				<div class="pull-left">
					<h6 class="inner-title">Đăng nhập</h6>
				</div>
				<div class="pull-right">
					<div class="beta-breadcrumb">
						<a href="{{ route('index') }}">Trang Chủ</a> / <span>Đăng nhập</span>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
	</div>
		<div class="container">
			<div id="content">
				
				<form action="#" method="post" class="beta-form-checkout">
					<div class="row">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<h4>Đăng Nhập</h4>
							<div class="space20">&nbsp;</div>

							
							<div class="form-block">
								<label for="email">Tài Khoản*</label>
								<input type="email" id="email" placeholder="Nhập địa chỉ email" required>
							</div>
							<div class="form-block">
								<label for="password">Mật Khẩu*</label>
								<input type="text" id="password" required>
							</div>
							<div class="form-block">
								<span>Chưa có tài khoản ?</span>
								<a href="{{ route('getSignup') }}"><b>Đăng ký tại đây</b></a>
							</div>
							<button type="submit" class="btn btn-primary">Đăng Nhập</button>
						</div>
						<div class="col-sm-3"></div>
					</div>
				</form>
			</div> <!-- #content -->
		</div> <!-- .container -->
@endsection