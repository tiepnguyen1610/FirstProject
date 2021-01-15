@extends('frontend.master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng Kí Tài Khoản</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{ route('index') }}">Trang Chủ</a> / <span>Đăng kí</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        
        <form action="{{ route('register') }}" method="POST" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <h4>Đăng kí</h4>
                    <div class="space20">&nbsp;</div>
                    
                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="email" id="email" name="email" placeholder="Nhập địa chỉ email..." required>
                    </div>

                    <div class="form-block">
                        <label for="your_last_name">Họ & Tên*</label>
                        <input type="text" id="your_last_name" name="fullname" placeholder="Nhập họ tên đầy đủ..." required>
                    </div>
                    <div class="form-block">
                        <label for="password">Mật Khẩu*</label>
                        <input type="password" name="password" placeholder="Nhập mật khẩu tối thiểu 6 ký tự" id="password" required>
                    </div>
                    <div class="form-block">
                        <label for="repassword">Xác Nhận Mật Khẩu*</label>
                        <input type="password" name="repassword" id="repassword" required>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Đăng Ký</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection