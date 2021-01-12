@extends('frontend.master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản Phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{ route('index') }}">Trang Chủ</a> / <span>Loại sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($categories as $category)
							<li><a href="{{ route('typeproduct', $category->id) }}">{{ $category->name }}</a></li>	
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Sản Phẩm Mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Có {{ count($typeproducts) }} Sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($typeproducts as $product)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="ribbon-wrapper">
											@if($product->promotionprice != 0)
												<div class="ribbon sale" >Sale</div>
											@endif	
										</div>

										<div class="single-item-header">
											<a href="{{ route('detailproduct', $product->id) }}"><img src="{{ asset('public/uploads/images/'.$product->image) }}" width="300px;" height="200px" alt=""></a>
										</div>
										<div class="single-item-body">
											<a href="{{ route('detailproduct', $product->id) }}">
												<p class="single-item-title">{{ $product->name }}</p>
											</a>
											<p class="single-item-price">
												@if($product->promotionprice === 0)
													<span class="">{{ number_format($product->unitprice,0,",",".").'₫' }}</span>
												@else
													<span class="flash-del">{{ number_format($product->unitprice,0,",",".") }}</span>
												<span class="flash-sale">{{ number_format($product->promotionprice,0,",",".").'₫' }}</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href=""><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{ route('detailproduct', $product->id) }}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="row">{{$typeproducts->links()}}</div>
						</div> <!-- .beta-products-list -->
						{{-- <div class="pagination">
						    <a href="#">&laquo;</a>
						    <a href="#">1</a>
						    <a class="active" href="#">2</a>
						    <a href="#">3</a>
						    <a href="#">&raquo;</a>
						  </div> --}}
						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản Phẩm Khác</h4>
							<div class="beta-products-details">
								<p class="pull-left"></p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($products_other as $product)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="ribbon-wrapper">
											@if($product->promotionprice != 0)
												<div class="ribbon sale" >Sale</div>
											@endif	
										</div>
										<div class="single-item-header">
											<a href="{{ route('detailproduct', $product->id) }}"><img src="{{ asset('public/uploads/images/'.$product->image) }}" width="300px" height="200px" alt=""></a>
										</div>
										<div class="single-item-body">
											<a href="{{ route('detailproduct', $product->id) }}">
												<p class="single-item-title">{{ $product->name }}</p>	
											</a>
											<p class="single-item-price">
												@if($product->promotionprice == 0)
													<span>{{ number_format($product->unitprice,0,",",".").'₫' }}</span>
												@else
													<span class="flash-del">{{ number_format($product->unitprice,0,",",".").'₫' }}</span>
													<span class="flash-sale">{{ number_format($product->promotionprice,0,",",".").'₫' }}</span>
												@endif	
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href=""><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{ route('detailproduct', $product->id) }}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div>
@endsection