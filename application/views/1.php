
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,700;1,500;1,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Muli:ital,wght@0,700;0,800;1,700&display=swap" rel="stylesheet">

	<meta charset="utf-8">
	<title>Octo</title>

	<script src="https://octolng.com/js/jquery-3.5.1.min.js"></script>
	<script src="https://octolng.com/js/main.js?753596"></script>
	<script src="https://octolng.com/js/wow.min.js?710222"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

	<link rel="stylesheet" href="https://octolng.com/style/hover-min.css?299120">
	<link rel="stylesheet" href="https://octolng.com/style/block.css?410989">
	<link rel="stylesheet" href="https://octolng.com/style/main.css?47481">
	<link rel="stylesheet" href="https://octolng.com/style/page.css?910420">
	<link rel="stylesheet" href="https://octolng.com/style/animate.css">
	<link rel="stylesheet" href="https://octolng.com/style/mobile.css?371009">
	<script src="js/wow.min.js"></script>
	<script>
		new WOW().init();
		$(function () {
			$('.show_menu').on('click',function () {
				$('.mobile_menu').slideToggle('100');
			})
		});
		document.addEventListener('touchmove', function (event) {
			if (event.scale !== 1) { event.preventDefault(); }
		}, false);
	</script>


</head>

<body>



<div class="mobile_menu">
	<div class="menu_head">
		<a class="btn btn_green">Login</a>
		<a class="btn btn_blue">Apply</a>
		<a class="btn right show_menu ico_list">Menu </a>
	</div>
	<div class="mobile_mm" >
		<a href="#" class="fmm">Who we are</a>
		<a href="#whewedo" class="sub_fmm">What we do</a>
		<a href="#company" class="sub_fmm">Company</a>
		<a href="#marketplace" class="sub_fmm">Marketplace</a>
		<a href="#" class="sub_fmm cs">Team & Governance</a>
		<a href="#" class="sub_fmm cs">News</a>
	</div>
	<div class="mobile_mm">
		<a href="#tradingv" class="fmm">Trading Venue</a>
		<a href="https://octolng.com/main/markets" class="sub_fmm ">Markets</a>
		<a href="https://octolng.com/main/products" class="sub_fmm">Products</a>
		<a href="#" class="sub_fmm cs">CLEARING</a>
		<a href="#" class="sub_fmm cs">TRADE FINANCE</a>
		<a href="#" class="sub_fmm cs">CONTRACTING</a>
		<a href="https://octolng.com/main/reporting" class="sub_fmm ">REPORTING</a>
	</div>
	<div class="mobile_mm">
		<a href="#" class="fmm"> Market Data</a>
	</div>
	<div class="mobile_mm">
		<a href="#" class="fmm"> scheduling &
			operations</a>
	</div>
	<div class="mobile_mm">
		<a href="#" class="fmm"> Investor area</a>
	</div>

	<div class="mobile_mm"  >
		<a href="https://octolng.com/main/contact" class="fmm"> Contact</a>
	</div>
</div>

<div  id="page">
	<div id="header">
		<div id="top_logo_block"><a  href="https://octolng.com/" id="top_logo"></a></div>
		<div id="top_menu" >
			<div class="top_menu_block">
				<a href="https://octolng.com/#wheweare" class="top_menu">Who we are</a>
				<div class="submenu_con">
					<a href="https://octolng.com/#whewedo" class="top_sub_menu">What we do</a>
					<a href="https://octolng.com/#company"  class="top_sub_menu">company</a>
					<a href="https://octolng.com/#marketplace"  class="top_sub_menu">marketplace</a>
					<a href="https://octolng.com/#whewedo"  class="top_sub_menu cs">Managment</a>
					<a class="top_sub_menu cs">News</a>
				</div>
			</div>

			<div class="top_menu_block">
				<a href="#tradingv" class="top_menu">Trading Venue</a>
				<div class="submenu_con">
					<a  href="https://octolng.com/main/markets" class="top_sub_menu">Markets</a>
					<a href="https://octolng.com/main/products" class="top_sub_menu">Products</a>
					<a class="top_sub_menu cs">clearing</a>
					<a class="top_sub_menu cs">trade finance</a>
					<a class="top_sub_menu cs">contracting</a>
					<a href="https://octolng.com/main/reporting" class="top_sub_menu cs">reporting</a>
				</div>
			</div>

			<a href="#" class="top_menu">Market Data</a>
			<a href="#" class="top_menu">scheduling & operations</a>
			<a href="#" class="top_menu">Investor area</a>
			<a href="https://octolng.com/main/contact" class="top_menu">Contact</a>
		</div>
		<div id="top_btn">
			<a class="btn btn_green">Login</a>
			<a class="btn btn_blue">Apply</a>


		</div>
		<a class="btn menu_slide right show_menu ico_list">Menu</a>

	</div>
	<div class="content">
		<div class="bread">
			<a href="#">OctoLNG »</a>
			<a href="#">Trading Venue »</a>
			<a href="#">Markets</a>
		</div>


		<h1>Markets</h1>
		<p>
			OCTO LNG trading venue brings together within single multilateral execution system the following LNG markets:
		</p>
		<div class="content_list" id="bg1">
			Spot and short-term transacting in physical volumes of liquified natural gas (LNG)
		</div>
		<div class="content_list" id="bg2">
			Financial trading in cash-settled derivative instruments based upon a suit of LNG indexes and price assessments
		</div>
	</div>
	<div class="right_content hide">
		<div class="right_menu">
			<a href="https://octolng.com/main/markets" class="active"><span class="sub_green"></span> MARKETS</a>
			<a href="https://octolng.com/main/products" ><span class="sub_blue">02.</span>  Products</a>
			<a><span class="sub_blue">03.</span>  Clearing</a>
			<a><span class="sub_blue">04.</span>  TRADE FINANCE</a>
			<a> <span class="sub_blue">05.</span> CONTRACTING</a>
			<a class="lch"><span class="sub_blue">06.</span>  REPORTING</a>
		</div>
	</div>
	<div id="trblocks" class="desc_hide  ">
		<a href="https://octolng.com/main/markets"  class="trblock hvr-curl-top-right" style="background-color: #e8e8e8;
    color: #0c0c0c;"><span class="sub_blue">01.</span>markets</a>
		<a href="https://octolng.com/main/products" class="trblock hvr-curl-top-right"><span class="sub_blue">02.</span>products</a>
		<div class="trblock hvr-curl-top-right"><span class="sub_blue">03.</span>clearing</div>
		<div class="trblock hvr-curl-top-right"><span class="sub_blue">04.</span>trade finance</div>
		<div class="trblock hvr-curl-top-right"><span class="sub_blue">05.</span>contracting</div>
		<div class="trblock hvr-curl-top-right"><span class="sub_blue">06.</span>reporting</div>
	</div>
</div>

<div id="socfooter" class="hide">
	<div class="soc_bns">
		<div class="social_btn"  id="soc_in" ></div>
		<div class="social_btn" id="soc_fb"></div>
		<div class="social_btn" id="soc_twit" ></div>
	</div>
	<div class="copyriht">© 2020 OctoLNG</div>

</div>

<div class="mobile_footer desc_hide">
	<div class="footer_logo"></div>
	<div class="soc_bns">
		<div class="social_btn"  id="soc_in" ></div>
		<div class="social_btn" id="soc_fb"></div>
		<div class="social_btn" id="soc_twit" ></div>
	</div>
	<div class="info"><div  class="sm_icon" id="bg_planet"></div>Pilatusstrasse 3, Zug, CH-6300 Switzerland</div>
	<div class="info green_footer"><div  class="sm_icon" id="bg_mail"></div>info@octolng.com</div>
	<div class="info blue_footer"><div  class="sm_icon" id="bg_phone"></div>+41 58 255 1 444</div>

	<div class="btn_footer">
		<div class="btn btn_blue ico_user"> Login </div>
		<div class="btn btn_green ico_plus   "> Apply</div>
	</div>
	<div class="footer_mm" >
		<a href="#" class="fmm">Who we are</a>
		<a href="#whewedo" class="sub_fmm">What we do</a>
		<a href="#company" class="sub_fmm">Company</a>
		<a href="#marketplace" class="sub_fmm">Marketplace</a>
		<a href="#" class="sub_fmm cs">Team & Governance</a>
		<a href="#" class="sub_fmm cs">News</a>
	</div>
	<div class="footer_mm">
		<a href="#tradingv" class="fmm">Trading Venue</a>
		<a href="https://octolng.com/main/markets" class="sub_fmm ">Markets</a>
		<a href="https://octolng.com/main/products" class="sub_fmm">Products</a>
		<a href="#" class="sub_fmm cs">CLEARING</a>
		<a href="#" class="sub_fmm cs">TRADE FINANCE</a>
		<a href="#" class="sub_fmm cs">CONTRACTING</a>
		<a href="#" class="sub_fmm cs">REPORTING</a>
	</div>
	<div class="footer_mm">
		<a href="#" class="fmm"> Market Data</a>
	</div>
	<div class="footer_mm">
		<a href="#" class="fmm"> scheduling &
			operations</a>
	</div>
	<div class="footer_mm">
		<a href="#" class="fmm"> Investor area</a>
	</div>

	<div class="footer_mm"  >
		<a href="https://octolng.com/main/contact" class="fmm"> Contact</a>
	</div>

</div>

</body>
</html>

