@extends('frontend.master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đặt hàng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{ route('index') }}">Trang chủ</a> / <span>Đặt hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			@if(Session::has('messages'))
				<div class="alert alert-success">{{ Session::get('messages') }}</div>
			@endif
			<form action="{{ route('postCheckout') }}" method="POST" class="beta-form-checkout">
				@csrf
				<div class="row">
					<div class="col-sm-6">
						<h4>Đặt hàng</h4>
						<div class="space20">&nbsp;</div>
						@if(Auth::check())
							<div class="form-block">
								<label>Họ tên*</label>
								<input type="text" name="txtFullname" id="name" value="{{ auth()->user()->fullname }}" placeholder="Nhập họ tên đầy đủ" required>
							</div>
							<div class="form-block">
								<label>Email*</label>
								<input type="email" name="txtEmail" value="{{ auth()->user()->email }}" id="email" required placeholder="expample@gmail.com">
							</div>
						@else
							<div class="form-block">
								<label>Họ tên*</label>
								<input type="text" name="txtFullname" id="name" placeholder="Nhập họ tên đầy đủ" required>
							</div>
							<div class="form-block">
								<label>Email*</label>
								<input type="email" name="txtEmail" id="email" required placeholder="expample@gmail.com">
							</div>
						@endif
						<div class="form-block">
							<label for="address">Địa chỉ*</label>
							<input type="text" id="adress" name="txtAddress" placeholder="Nhập địa chỉ giao hàng" required>
						</div>
						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text" name="txtPhone" placeholder="Số điện thoại người nhận" id="phone" required>
						</div>
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea id="notes" name="txtNote"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								@foreach($cart->items as $item)
								<div class="your-order-item">
									<div>
									<!--  one item	 -->
										<div class="media">
											<img width="60px" height="60px" src="{{ asset('public/uploads/images/'.$item['image']) }}" alt="" class="pull-left">
											<div class="media-body">
												<p class="font-large">{{ $item['name'] }}</p><br/>
												<span class="color-gray your-order-info">Số Lượng: {{ $item['quantity'] }}</span>
											</div>
										</div>
									<!-- end one item -->
									</div>
									<div class="clearfix"></div>
								</div>
								@endforeach
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">{{ number_format($cart->totalPrice,0,",",".").'₫'}}</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" data-order_button_text="" checked>
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 21110000794850
											<br>- Chủ TK: Nguyễn Đức Tiệp
											<br>- Ngân hàng BIDV, Chi nhánh Cầu Giấy - Hà Nội
										</div>						
									</li>
									
								</ul>
							</div>

							<div class="text-center">
								<button type="submit" class="beta-btn primary"> 
									Đặt hàng <i class="fa fa-chevron-right"></i>
								</button>
							</div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection