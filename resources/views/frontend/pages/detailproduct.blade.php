@extends('frontend.master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản Phẩm {{ $detail_product->name }}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{ route('index') }}">Trang Chủ</a> / <span>Thông tin chi tiết</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="{{ asset('public/uploads/images/'.$detail_product->image) }}" height="300px" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title"><h5><b>{{ $detail_product->name }}</b></h5></p>
								<p class="single-item-price">
									@if($detail_product->promotionprice === 0)
										<span class="">{{ number_format($detail_product->unitprice,0,",",".").'₫' }}</span>
									@else
										<span class="flash-del">{{ number_format($detail_product->unitprice,0,",",".") }}</span>
										<span class="flash-sale">{{ number_format($detail_product->promotionprice,0,",",".").'₫' }}</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p></p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Số Lượng :</p>
							<div class="single-item-options">
								<input type="number" step="1" max="99" min="1" value="1" size="4" class="wc-select" name="color"/>
								<a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description"><b>Giới Thiệu</b></a></li>
							{{-- <li><a href="#tab-reviews">Reviews</a></li> --}}
						</ul>

						<div class="panel" id="tab-description">
							<p>{{ $detail_product->description }}</p>
						</div>
						<div class="panel" id="tab-reviews">
							{{-- <p>No Reviews</p> --}}
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h6>Sản Phẩm Liên Quan</h6>

						<div class="row">
							@foreach($related_products as $product)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="ribbon-wrapper">
										@if($product->promotionprice != 0)
											<div class="ribbon sale">Sale</div>
										@endif
									</div>
									<div class="single-item-header">
										<a href="{{ route('detailproduct', $product->id) }}"><img src="{{ asset('public/uploads/images/'.$product->image) }}" height="300px"alt="Ảnh sản phẩm {{$product->name}}" ></a>
									</div>
									<div class="single-item-body">
										<a href="{{ route('detailproduct', $product->id) }}">
											<p class="single-item-title"><b>{{ $product->name }}</b></p>
										</a>
										<p class="single-item-price">
											@if($product->promotionprice === 0)
												<span class="">{{ number_format($product->unitprice,0,",",".").'₫' }}</span>
											@else
												<span class="flash-del">{{ number_format($product->unitprice,0,",",".").'₫' }}</span>
												<span class="flash-sale">{{ number_format($product->promotionprice,0,",",".").'₫' }}</span>
											@endif
											
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="#"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{ route('detailproduct', $product->id) }}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Best Sellers</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="public/user/images/products/sales/1.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="public/user/images/products/sales/2.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="public/user/images/products/sales/3.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="public/user/images/products/sales/4.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">New Products</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="public/user/images/products/sales/1.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="public/user/images/products/sales/2.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="public/user/images/products/sales/3.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="public/user/images/products/sales/4.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection