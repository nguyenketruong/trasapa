@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Liên Hệ</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <span>Liên Hệ</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="beta-map">
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3779.904350668982!2d105.69862961489503!3d18.668287687323193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3139cdd1927da3c3%3A0xbc29adc5b866c4ba!2zUGhvbmcgxJDhu4tuaCBD4bqjbmcsIFRwLiBWaW5oLCBOZ2jhu4cgQW4!5e0!3m2!1svi!2s!4v1575222223589!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe></div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>Liên Hệ</h2>
					<div class="space20">&nbsp;</div>
					<p>Công Ty Cổ Phần Máy Tính Trường Nguyễn</p>
					<div class="space20">&nbsp;</div>
					<form action="backend/homepage/lienhe" method="post" >
					<input type="hidden" name="_token" value="{{csrf_token()}}">	
						<div class="form-block">
							<input name="name" type="text" placeholder=" Vui lòng nhâp Họ Tên của Bạn ">
						</div>
						<div class="form-block">
							<input name="tieude" type="text" placeholder="Tiêu Đề ">
						</div>
						<div class="form-block">
							<textarea name="noidung" placeholder="Nội Dung "></textarea>
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary"> Gửi Tin Nhắn<i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
				<div class="col-sm-4">
					<h2>Thông tin liên hệ</h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Địa chỉ </h6>
					<p>
						Số 88 Đường Phong Đình Cảng <br>
						Thành Phố Vinh <br>
						Nghệ An
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Số Điện thoại</h6>
					<p>
						0968686868<br>
						<a href="mailto:biz@betadesign.com">www.truongnguyem.com</a>
					</p>
				</div>
			</div>
		</div> <!-- #content -->
	</div> 
@endsection