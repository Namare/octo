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
	<link rel="stylesheet" href="<?=base_url()?>style/page.css?<?=rand(10,1000000)?>">
	<link rel="stylesheet" href="<?=base_url()?>style/animate.css">
	<link rel="stylesheet" href="<?=base_url()?>style/mobile.css?<?=rand(10,1000000)?>">
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



