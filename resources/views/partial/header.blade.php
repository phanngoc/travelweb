<link rel="stylesheet" href="{{ Asset('lesscss/css/header.css') }}" />
<div id="header">
	<div class="inner-header">
		<div class="cross-bar-top">
			
		</div>
		<div class="logo">
			<div class="inner-logo">
				<div class="wrapper-logo">
					<h2>Du lịch nhanh</h2>
				</div>
				<div class="wrapper-button">
					<a href="{{ route('tour') }}" class="set-tour btn">Đặt tour</a>
				</div>
			</div>
		</div>
		<div class="menu">
			<div class="inner-menu">
				<nav>
					<ul class="main-menu">
						<li><a href="#">Trang chủ</a></li>
						<li><a href="#">Điểm đến</a></li>
						<li><a href="#">Âm thực</a></li>
						<li><a href="#">Khách sạn</a></li>
						<li>
						   <a href="#">Dịch vụ</a>
							<ul>
								<li><a href="#">Cafe Quán bar</a></li>
								<li><a href="#">Thuê xe</a></li>
								<li><a href="#">Khuyến mãi</a></li>
								<li><a href="#">Nhà hàng</a></li>
							</ul>
						</li>
						<li><a href="#">Tour du lịch</a></li>
					</ul>
					<div class="wrap-menu-mobile" style="display:none;">
						<select id="menu-mobile">
							<option value="">Trang chủ</option>
							<option value="">Điểm đến</option>
							<option value="">Âm thực</option>
							<option value="">Khách sạn</option>
							<option value="">Dịch vụ</option>
							<option value="">---Cafe Quán bar</option>
							<option value="">---Thuê xe</option>
							<option value="">---Khuyến mãi</option>
							<option value="">---Nhà hàng</option>
							<option value="">Tour du lịch</option>
						</select>
					</div>
				</nav>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$( window ).resize(function() {
		  var width_window = $( window ).width();
		  console.log(width_window);
		  if(width_window < 795)
		  {
		  	$('.wrap-menu-mobile').show();
		  	$('.main-menu').hide();
		  }
		  else
		  {
		  	$('.wrap-menu-mobile').hide();
		  	$('.main-menu').show();
		  }
		});
	});	
</script>