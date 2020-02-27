@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản Phẩm {{$sanpham->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <span>Thông Tin Sản Phẩm</span>
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
							<img src="source/image/product/{{$sanpham->image}}" alt="" height="250px" width="250px">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title"><h2>{{$sanpham->name}}</h2></p>
								<p class="single-item-price">
									@if($sanpham->promotion_price!=0)
									<span class="flash-del">{{number_format($sanpham->unit_price)}}đ</span>
									<span class="flash-sale">{{number_format($sanpham->promotion_price)}}đ</span>
									@else
									<span>{{number_format($sanpham->unit_price)}}đ</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$sanpham->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Số Lượng</p>
							<div class="single-item-options">
								<select class="wc-select" name="size">
									<option>{{$sanpham->unit}}</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
								</select>
								<a class="add-to-cart" href="{{route('themgiohang',$sanpham->id)}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
								<a class="beta-btn primary" href="{{route('giohang')}}">Xem Giỏ Hàng <i class="fa fa-chevron-right"></i></a>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô Tả </a></li>
							<li><a href="#tab-reviews">Bình Luận</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$sanpham->description}}</p>
						</div>
						<div class="panel" id="tab-reviews">
							<p>Chưa có bình luận </p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản Phẩm Tương Tự </h4>

						<div class="row">

							@foreach($sp_tuongtu as $tt )
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="product.html"><img src="source/image/product/{{$tt->image}}" alt="" height="250px" width="250px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title"><h2>{{$tt->name}}</h2></p>
										<p class="single-item-price">
										@if($tt->promotion_price!=0)
									<span class="flash-del">{{number_format($tt->unit_price)}}đ</span>
									<span class="flash-sale">{{number_format($tt->promotion_price)}}đ</span>
									@else
									<span>{{number_format($tt->unit_price)}}đ</span>
									@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$tt->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsanpham',$tt->id)}}">Chi Tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row">{{$sp_tuongtu->links()}}</div>
					</div> 
					<div>
					<a href="https://viettimes.vn/top-20-smartphone-dang-mua-nhat-tren-the-gioi-2017-147313.html"><img src="source/image/banner.jpg" alt="" height="520px" width="260px"  ></a>

				</div><!-- .beta-products-list -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> 
@endsection