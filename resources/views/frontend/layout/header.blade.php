<style> 
	#btn-submit {
	    border: none;
	    height: 100%;
	    display: block;
	    background: none;
	    padding-left: 20px;
	    padding-right: 20px;
	}

	#region_logout {
		display: block;
		height: 100%;
	}
</style>

<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> Trang Hạ - Từ Sơn - Bắc Ninh </a></li>
						<li><a href=""><i class="fa fa-phone"></i>0973521620</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">

						@if(Auth::check())
							<li><a href=""><i class="fa fa-user"></i>{{ Auth::user()->fullname }}</a></li>
							<li id="region_logout">
								<form action="{{ route('logout') }}" method="POST" id="formLogout">
									@csrf
									<input type="submit" value="Đăng xuất" id="btn-submit">
								</form>
							</li>
						@else
							<li><a href=""><i class="fa fa-user"></i>Tài khoản</a></li>
						  	<li><a href="{{ route('register')}}">Đăng kí</a></li>
						 	<li><a href="{{ route('login') }}">Đăng nhập</a></li>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="{{ route('index') }}" id="logo"><img src="{{ asset('public/user/images/logo-cake.png') }}" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="/">
					        <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng ({{ ($cart->totalQuantity)? $cart->totalQuantity : 'Trống' }})<i class="fa fa-chevron-down"></i>
							</div>
							<div class="beta-dropdown cart-body">
								@foreach($cart->items as $item )
								<div class="cart-item">
									<a class="cart-item-delete" href="{{ route('cart.delete',$item['id']) }}"><i class="fa fa-times"></i></a>
									<div class="media">
										<a class="pull-left" href="#"><img src="{{ asset('public/uploads/images/'.$item['image']) }}" width="50px" height="50px" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">{{ $item['name'] }}</span>
											<span class="cart-item-amount">{{ $item['quantity'] }}*<span>{{ number_format($item['price'],0,",",".").'₫' }}</span></span>
										</div>
									</div>
								</div>
								@endforeach
								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{ number_format($cart->totalPrice,0,",",".").'₫'}}</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{ route('getCheckout') }}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
														
						</div> <!-- .cart -->
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('index')}}">Trang Chủ</a></li>
						<li><a href="#" disable >Sản Phẩm</a>
							<ul class="sub-menu">
								@foreach($categories as $category)
									<li><a href="{{ route('typeproduct', $category->id ) }}">{{ $category->name }}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="{{ route('about') }}">Giới Thiệu</a></li>
						<li><a href="{{ route('contact') }}">Liên Hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
