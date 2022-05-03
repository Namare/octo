</div>

<link rel="stylesheet" href="<?=base_url()?>style/news.css?<?=rand(1,99999)?>">
<div class="page_news">
		<div class="news_content">
		<div class="news_h1"><h1><?=$news->title?></h1></div>
			<div class="single_cover"  style="background-image: url('<?=base_url()?>cover/<?=$news->cover_file?>') "></div>
			<?=$news->content?>







		</div>
	<h3>Related news</h3>
	<div class="news_containers hide">
		<?foreach ($news_l as $k => $new){
			if($k == 4)break;
			?>
			<div class="n_container">
				<div class="news_img" style="background-image: url('<?=base_url()?>cover/<?=$new->cover_file?>') "></div>
				<a href="<?=base_url()?>" class="news_title"><?=$new->title?></a>
				<div class="blue_hr"></div>
				<div class="news_desc"><?=str_replace('&nbsp;','', substr(strip_tags($new->content), 0, 70))?></div>
			</div>
		<?}?>
	</div>


	<div class="list_news_slider desc_hide">
		<?foreach ($news_l as  $new_l){

			?>
			<div class="n_container">
				<div class="news_img" style="background-image: url('<?=base_url()?>cover/<?=$new_l->cover_file?>') "></div>
				<a href="<?=base_url()?>main/single_news/<?=$new_l->id?>"  class="news_title"><?=$new_l->title?></a>
				<div class="blue_hr"></div>
				<div class="news_desc"><?=str_replace('&nbsp;','', substr(strip_tags($new_l->content), 0, 70))?></div>
			</div>
		<?}?>
	</div>


</div>
<script>
	$(function () {

	$('.list_news_slider').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: false,
		prevArrow:'',
		nextArrow:'',
		autoplay: true,
		autoplaySpeed:5500,
		speed:1000
	});
	})

</script>
