@extends('frontend.master')
@section('content')
<div class="fullwidthbanner-container">
	<div class="fullwidthbanner">
		<div class="bannercontainer" >
	    <div class="banner" >
				<ul>
					@foreach($slides as $slide)
					<!-- THE FIRST SLIDE -->
					<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
			            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
								<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="{{ asset('public/uploads/'.$slide['image']) }}" data-src="{{ asset('public/uploads/'.$slide['image']) }}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('{{ asset('public/uploads/'.$slide['image']) }}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
								</div>
						</div>
		        	</li>
					@endforeach
				</ul>
			</div>
		</div>

		<div class="tp-bannertimer"></div>
	</div>
</div>
			<!--slider-->
</div>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-products-list">
						<h4>Sản Phẩm Mới</h4>
						<div class="beta-products-details">
							<p class="pull-left"> {{ count($new_products) }} sản phẩm </p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
							@foreach($new_products as $newproduct)
							<div class="col-sm-3">
								<div class="single-item">
									<div class="ribbon-wrapper">
										@if($newproduct->promotionprice != 0)
											<div class="ribbon sale" >Sale</div>
										@endif	
									</div>
									<div class="single-item-header">
										<a href="{{ route('detailproduct', $newproduct->id) }}"><img width="300px;" height="200px;" src="{{ asset('public/uploads/images/'.$newproduct->image) }}" alt=""></a>
									</div>
									<div class="single-item-body">
										<a href="{{ route('detailproduct', $newproduct->id) }}">
											<p class="single-item-title">{{ $newproduct->name }}</p>	
										</a>
										<p class="single-item-price">
											@if($newproduct->promotionprice === 0)
												<span class="">{{ number_format($newproduct->unitprice,0,",",".").'₫' }}</span>
											@else
												<span class="flash-del">{{ number_format($newproduct->unitprice,0,",",".") }}</span>
												<span class="flash-sale">{{ number_format($newproduct->promotionprice,0,",",".").'₫' }}</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{ route('cart.add',$newproduct->id) }}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{ route('detailproduct', $newproduct->id) }}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>

					<div class="beta-products-list">
						<h4>Sản phẩm khuyến mãi</h4>
						<div class="beta-products-details">
							<p class="pull-left"> {{ count($sale_products) }} sản phẩm</p>
							<div class="clearfix"></div>
						</div>
						<div class="row">
							@foreach($sale_products as $product)
							<div class="col-sm-3">
								<div class="single-item">
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									<div class="single-item-header">
										<a href="{{ route('detailproduct', $product->id) }}"><img src="{{ asset('public/uploads/images/'.$product->image) }}" width="300px" height="200px" alt=""></a>
									</div>
									<div class="single-item-body">
										<a href="{{ route('detailproduct', $product->id) }}">
											<p class="single-item-title">{{ $product->name }}</p>	
										</a>
										<p class="single-item-price">
											<span class="flash-del">{{ number_format($product->unitprice,0,",", ".") }}</span>
											<span class="flash-sale">{{ number_format($product->promotionprice,0,",", ".").'₫' }}</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{ route('cart.add',$product->id) }}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{ route('detailproduct', $product->id) }}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach	
						</div>
						<div class="space40">&nbsp;</div>
						<div class="row">{{ $sale_products->links() }}</div>
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
	
@endsection