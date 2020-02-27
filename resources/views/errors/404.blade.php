@extends('master')
@section('content')
<section class="bg-gray">
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Lỗi Đăng Nhập</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('login')}}">Đăng Nhập</a> / <span>Page 404</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content" class="space-top-none space-bottom-none">
			<div class="abs-fullwidth bg-gray">
				<div class="space100">&nbsp;</div>
				<div class="space80">&nbsp;</div>
				<div class="container text-center">
					<h2>Xin Lỗi! Bạn Không Thể Vào Trang Web Này</h2>
					<div class="space40">&nbsp;</div>
					<img src="assets/dest/images/404.jpg" alt="">
					<div class="space30">&nbsp;</div>
					<p>Tài Khoản Hoặc Mật Khẩu Không Đúng Vui Lòng Đăng Nhập Lại</p>
					<form role="search" method="get" id="searchform" action="/">
				        <input type="text" value="" name="s" id="s" placeholder="Search entire store here..." />
				        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
					</form>
				</div>
				<div class="space100">&nbsp;</div>
				<div class="space30">&nbsp;</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
</section>
@endsection