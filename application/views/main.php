<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,700;1,500;1,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Muli:ital,wght@0,700;0,800;1,700&display=swap" rel="stylesheet">

	<meta charset="utf-8">
	<title>Octo</title>

	<script src="<?=base_url()?>js/jquery-3.5.1.min.js"></script>
	<script src="<?=base_url()?>js/main.js?<?=rand(10,1000000)?>"></script>
	<script src="<?=base_url()?>js/wow.min.js?<?=rand(10,1000000)?>"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

	<link rel="stylesheet" href="<?=base_url()?>style/hover-min.css?<?=rand(10,1000000)?>">
	<link rel="stylesheet" href="<?=base_url()?>style/block.css?<?=rand(10,1000000)?>">
	<link rel="stylesheet" href="<?=base_url()?>style/main.css?<?=rand(10,1000000)?>">
	<link rel="stylesheet" href="<?=base_url()?>style/mobile.css?<?=rand(10,1000000)?>">
	<link rel="stylesheet" href="<?=base_url()?>style/animate.css">
	<script src="js/wow.min.js"></script>
	<script>
		new WOW().init();
		$(function () {
			$('.show_menu').on('click',function () {
				$('.mobile_menu').slideToggle('100');
			})

			$('.mobile_menu a').on('click',function () {
				$('.mobile_menu').hide('100');
			})

            $('.an_more').on('click',function () {
                $('.open_anouce').hide()
                $('.open_anouce').fadeIn(400)
            })

            $('.anouce_close').on('click',function () {
                $(this).parent('.open_anouce').fadeOut(400)
            })


		});
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
	<a href="<?=base_url()?>main/management" class="sub_fmm ">Team & Governance</a>
	<a href="#" class="sub_fmm cs">News</a>
</div>
<div class="mobile_mm">
	<a href="#tradingv" class="fmm">Trading Venue</a>
	<a href="<?=base_url()?>main/markets" class="sub_fmm cs">Markets</a>
	<a href="<?=base_url()?>main/products" class="sub_fmm">Products</a>
	<a  href="#" class="sub_fmm cs">CLEARING</a>
	<a href="#" class="sub_fmm cs">TRADE FINANCE</a>
	<a  href="#" class="sub_fmm cs">CONTRACTING</a>
	<a  href="#" class="sub_fmm cs">REPORTING</a>
	<a  href="#" class="sub_fmm cs">RULEBOOK</a>
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
	<a href="<?=base_url()?>main/contact" class="fmm"> Contact</a>
</div>
</div>
<div  id="wheweare">
	<div id="header">
		<div id="top_logo_block"><a  href="<?=base_url()?>" id="top_logo"></a></div>
		<div id="top_menu" >
			<div class="top_menu_block">
			<a href="#wheweare" class="top_menu">Who we are</a>
			<div class="submenu_con">
			<a href="#whewedo" class="top_sub_menu">What we do</a>
			<a href="#company"  class="top_sub_menu">company</a>
			<a href="#marketplace"  class="top_sub_menu">marketplace</a>
			<a href="<?=base_url()?>main/management"  class="top_sub_menu ">Team & Governance</a>
			<a href="#"  class="top_sub_menu cs">News</a>
			</div>
			</div>

			<div class="top_menu_block">
			<a href="#tradingv" class="top_menu">Trading Venue</a>
			<div class="submenu_con">
				<a  href="<?=base_url()?>main/markets" class="top_sub_menu ">Markets</a>
				<a href="<?=base_url()?>main/products" class="top_sub_menu">Products</a>
				<a href="#" class="top_sub_menu cs">clearing</a>
				<a  href="#" class="top_sub_menu cs">trade finance</a>
				<a href="#" class="top_sub_menu cs">contracting</a>
				<a href="#" class="top_sub_menu cs">reporting</a>
				<a href="#" class="top_sub_menu cs">rulebook</a>
			</div>
			</div>

			<a href="#" class="top_menu">Market Data</a>
			<a href="#" class="top_menu">scheduling & operations</a>
			<a href="#" class="top_menu">Investor area</a>
			<a href="<?=base_url()?>main/contact" class="top_menu">Contact</a>
		</div>
		<div id="top_btn">
			<a class="btn btn_green">Login</a>
			<a class="btn btn_blue">Apply</a>
		</div>
		<a class="btn menu_slide right show_menu ico_list">Menu</a>
	</div>
    <div class="anouce"> Statement on war in Ukraine <a class="an_more hvr-rectangle-in">Read More </a></div>
    <div class="open_anouce">
        <div class="anouce_close">Close</div>
        <h2> <?=$cotent[15]->name ?></h2>
        <?=$cotent[15]->content?>
    </div>



	<h1 class="hmain wow bounceInLeft"><?=$cotent[0]->content?></h1>

	<div id="to_plaform" class="wow  bounceInRight " data-wow-delay="1s">
		<a href="https://demo.octolng.com:8443/login" target="_blank" id="octo_link">OCTO Trading Platform</a>
		<div id="arr"></div>
	</div>

	<div class="darkgreen wow  bounceInRight " data-wow-delay="1s"><?=$cotent[1]->content?></div>
	<a href="https://demo.octolng.com/login" class="btn btn_green to_plat desc_hide" >OCTO Trading Platform<span class="arr" style="padding-top: 1vh; background-position: center 22%;"></span></a>
	<div id="main_slider">
	<div class="main_slider">
		<div class="slider_element  "     id="sl1">
			<div class="slider_number">01</div>
			<div class="slider_text">LNG has once brought disruption to traditional gas markets. Today LNG market is itself in the need for fundamental rewiring</div>

		</div>
		<div class="slider_element  "     id="sl2">
			<div class="slider_number">02</div>
			<div class="slider_text">We bring about a physical and financial LNG liquidity pool formed by technologically advanced multilateral direct-trading marketplace </div>

		</div>
		<div class="slider_element  "     id="sl3">
			<div class="slider_number">03</div>
			<div class="slider_text">Our ambition is to fully commoditize LNG against the backdrop of sustainably growing share of spot and short-term LNG trading</div>

		</div>
	</div>
	</div>
</div>

<div id="whewedo">
	<h3 class="green_head">What we do</h3>

	<h2 class="hmain wow bounceInRight"><?=$cotent[2]->content?></h2>

	<div id="whewedo_img" class=" wow bounceInLeft"></div>

	<div class="wwdList  wow fadeIn">
		<div class="wwdRigth"><?=$cotent[3]->content?></div>
		<div class="wwdLeft"><?=$cotent[4]->content?></div>
	</div>
	<div class="wwdList  wow fadeIn">
		<div class="wwdRigth"><?=$cotent[5]->content?></div>
		<div class="wwdLeft"><?=$cotent[6]->content?>
			<div class="btn_block ">
				<a href="#tradingv"class="btn btn_blue  hvr-rectangle-in">Read More<span class="arr"></span></a>
			</div>
		</div>

	</div>
	<div class="wwdList  wow fadeIn">
		<div class="wwdRigth">
			<?=$cotent[7]->content?>
		</div>
		<div class="wwdLeft"><?=$cotent[8]->content?>
			<div class="btn_block  ">
				<a href="#marketplace" class="btn btn_blue  hvr-rectangle-in">Read More<span class="arr"></span></a>
			</div>
		</div>
	</div>
</div>

<div id="company">
	<h3 class="green_head bg_white wow bounceInRight">company <div  id="bg_tower" class="black_round right bg_white hide"></div>
		<div class="hr_black hide"></div>
	</h3>

	<div id="company_content">
		<div class="col_com w40 m_wa" style=" padding-right:6vw;">
		<h3 class="black_head  wow bounceInRight" >	<?=$cotent[9]->content?></h3>
		</div>
		<div class="hr_black desc_hide hide_mi"></div>

		<div  id="bg_tower" class="black_round right bg_white bg_tower_m desc_hide"></div>
		<div class="col_com w35 gray_text m_wa  wow bounceInLeft"><?=$cotent[10]->content?></div>
	</div>

</div>
<div id="since">
	<div class="since wow flipInX center">since</div>
	<div class="since_year span3 wow rollIn">2018</div>

</div>
<div id="marketplace" class="wow fadeIn">
	<h3 class="green_head bg_white  wow bounceInRight" >marketplace <div  id="bg_union" class="black_round right bg_white hide"></div>
		<div class="hr_black"></div>
	</h3>

	<h3 class="black_head w40   m_wa left wow bounceInLeft" style="padding-right: 6vw"><?=$cotent[11]->content?></h3>
	<div  id="bg_union" class="black_round right bg_white bg_union_m desc_hide"></div>
	<div class="col_com w35 gray_text m_wa left wow bounceInRight"><?=$cotent[12]->content?></div>
	<div id="mppos" class="wow bounceInLeft">
		<div id="mphead"><div class="w50 m_wa"><?=$list_head->list_name?></div></div>
	<div id="mpcontent">
		<div class="mplist">
			<ul>
				<?foreach ($col1 as $col1){?>
					<li><?=$col1->item_name?></li>
				<?}?>
			</ul>

			<ul>
				<?foreach ($col2 as $col2){?>
					<li><?=$col2->item_name?></li>
				<?}?>
			</ul>
		</div>

	</div>
	</div>
</div>
<div id="tradingv">
	<h3 class="green_head left_main  wow bounceInRight">trading venue <div  id="bg_trading" class="black_round right bg_gr hide"></div>
		<div class="hr_black hide" style="width: 63%; margin-left: 13vw;"></div>
	</h3>

	<h2 class="hmain font25 w35 wow bounceInLeft m_wa"><?=$cotent[13]->content?></h2>
	<div  id="bg_trading" class="black_round right bg_gr bg_trading_m desc_hide"></div>
	<div id="trblocks" class="wow bounceInRight ">
		<a href="<?=base_url()?>main/markets"  class="trblock hvr-curl-top-right"><span class="sub_blue">01.</span>markets</a>
		<a href="<?=base_url()?>main/products" class="trblock hvr-curl-top-right"><span class="sub_blue">02.</span>products</a>
		<div class="trblock hvr-curl-top-right"><span class="sub_blue">03.</span>clearing</div>
		<div class="trblock hvr-curl-top-right"><span class="sub_blue">04.</span>trade finance</div>
		<div class="trblock hvr-curl-top-right"><span class="sub_blue">05.</span>contracting</div>
		<div class="trblock hvr-curl-top-right"><span class="sub_blue">06.</span>reporting</div>
		<div class="trblock hvr-curl-top-right"><span class="sub_blue">07.</span>rulebook</div>
	</div>
	<div class="darkgreen w35 m_wa wow bounceInLeft "><?=$cotent[14]->content?> </div>
	<div class="stpd_list">
		<div class="stpd_left"></div>
		<div class="stpd_text">Real-time physical and financial trading,  matching, execution and confirmation</div>
		<div class="stpd_right"></div>

	</div>
	<div class="stpd_list" style="    margin-top: 9.5vh;">
		<div class="stpd_left"></div>
		<div class="stpd_text">Risk management</div>
		<div class="stpd_right"></div>

	</div>
	<div class="stpd_list" style="    margin-top: 13.5vh;">
		<div class="stpd_left"></div>
		<div class="stpd_text">Portfolio optimization</div>
		<div class="stpd_right"></div>

	</div>
	<div class="stpd_list" style="margin-top: 17.5vh;">
		<div class="stpd_left"></div>
		<div class="stpd_text">Price discovery and market analytics</div>
		<div class="stpd_right"></div>

	</div>

<!--	<ul id="trlist" class="wow bounceInLeft">-->
<!--		<li>Real-time physical and financial trading,  matching, execution and confirmation</li>-->
<!--		<li>Risk management</li>-->
<!--		<li>Portfolio optimization</li>-->
<!--		<li>Price discovery and market analytics</li>-->
<!---->
<!--	</ul>-->




</div>
<div id="contact">
	<h2 class="wow backInDown">Contact us</h2>
	<div class="cm_grey_txt">Please use the inquiry form below to receive more<br> information about octolng® project.</div>
	<div class="contact_form w50 m_wa wow fadeIn">
		<form action="<?=base_url()?>main/send_mail" method="post">
			<div class="input ">
			<label>Name*</label>
			<input name="name" type="text">
			</div>

			<div class="input ">
			<label>Email*</label>
			<input name="email" type="text">
			</div>
			<div class="input input-block w100">
			<label>Message</label>
			<textarea  name="text" col="3"></textarea>
			</div>
			<div class="btn btn_blue padd_btn send_mail" type="submit" >Contact Us</div>
		</form>
	</div>
	<script>

		$(function () {
			$('.send_mail').on('click', function () {
				$('form').submit();
				$('.thx_black').fadeIn();
			});
		});
	</script>

</div>
<div id="footer" class="hide">
	<div class="w25 left">
		<div class="footer_logo"></div>
		<div class="info"><div  class="sm_icon" id="bg_planet"></div>Pilatusstrasse 3, Zug, CH-6300 Switzerland</div>
		<div class="info green_footer"><div  class="sm_icon" id="bg_mail"></div><a href="maito:info@octolng.com">info@octolng.com</a></div>
		<div class="info blue_footer"><div  class="sm_icon" id="bg_phone"></div><a href="tel:+41 58 255 1 444">+41 58 255 1 444</a></div>

		<div class="btn_footer">
			<div class="btn btn_green w15"> Login </div>
			<div class="btn btn_blue w15  "> Apply</div>
		</div>
	</div>
	<div class="w70 right">
		<div class="footer_mm" >
			<a href="#" class="fmm">Who we are</a>
			<a href="#whewedo" class="sub_fmm">What we do</a>
			<a href="#company" class="sub_fmm">Company</a>
			<a href="#marketplace" class="sub_fmm">Marketplace</a>
			<a href="<?=base_url()?>main/management" class="sub_fmm ">Team & Governance</a>
			<a href="#" class="sub_fmm cs">News</a>
		</div>
		<div class="footer_mm">
			<a href="#tradingv" class="fmm">Trading Venue</a>
			<a href="<?=base_url()?>main/markets" class="sub_fmm ">Markets</a>
			<a href="<?=base_url()?>main/products" class="sub_fmm ">Products</a>
			<a href="#" class="sub_fmm cs">CLEARING</a>
			<a href="#" class="sub_fmm cs">TRADE FINANCE</a>
			<a href="#" class="sub_fmm cs">CONTRACTING</a>
			<a href="#" class="sub_fmm cs">REPORTING</a>
			<a href="#" class="sub_fmm cs">RULEBOOK</a>
		</div>
		<div class="footer_mm">
			<a href="#" class="fmm"> Market Data</a>
		</div>
		<div class="footer_mm">
			<a href="#" class="fmm"> scheduling & <br>
				operations</a>
		</div>
		<div class="footer_mm">
			<a href="#" class="fmm"> Investor area</a>
		</div>

		<div class="footer_mm" style="width: 6.6%; padding: 0;" >
			<a href="<?=base_url()?>main/contact" class="fmm"> Contact</a>
		</div>
	</div>

</div>
<div id="socfooter" class="hide">
	<div class="soc_bns">
	<a href="https://www.linkedin.com/company/octo-lng/" class="social_btn"  id="soc_in" ></a>
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
	<div class="info green_footer"><div  class="sm_icon" id="bg_mail"></div><a href="maito:info@octolng.com">info@octolng.com</a></div>	<div class="info blue_footer"><div  class="sm_icon" id="bg_phone"></div><a href="tel:+41 58 255 1 444">+41 58 255 1 444</a></div>

	<div class="btn_footer">
		<div class="btn btn_green ico_user"> Login </div>
		<div class="btn btn_blue ico_plus   "> Apply</div>
	</div>
	<div class="footer_mm" >
		<a href="#" class="fmm">Who we are</a>
		<a href="#whewedo" class="sub_fmm">What we do</a>
		<a href="#company" class="sub_fmm">Company</a>
		<a href="#marketplace" class="sub_fmm">Marketplace</a>
		<a href="<?=base_url()?>main/management" class="sub_fmm ">Team & Governance</a>
		<a href="#" class="sub_fmm cs">News</a>
	</div>
	<div class="footer_mm">
		<a href="#tradingv" class="fmm">Trading Venue</a>
		<a href="<?=base_url()?>main/markets" class="sub_fmm ">Markets</a>
		<a href="<?=base_url()?>main/products" class="sub_fmm">Products</a>
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
		<a href="<?=base_url()?>main/contact" class="fmm"> Contact</a>
	</div>

</div>
<div class="thx_black">
	<div class="thx_white">

		<div class="thx_round">✓</div>
		<h2>Thank you!</h2>
		<h3>We will contact you soon.</h3>
	</div>
</div>
<script>
	$(function () {
		$('.thx_black').on('click',function () {
				$(this).fadeOut();
		});
	})
</script>

</body>
</html>
