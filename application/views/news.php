<link rel="stylesheet" href="<?=base_url()?>style/news.css?<?=rand(1,99999)?>">
<div class="page_news">
	<div class="f_news_header desc_hide">
		<div class="news_header">News</div>
		<div class="news_date"><?=date('l - d.m')?></div>
	</div>
	<?if($news){?>
	<div class="news_slider desc_hide">
		<?foreach ($news as  $new_s){?>
		<div style="background-image: url('<?=base_url()?>cover/<?=$new_s->cover_file?>') " class="slider_img" >
			<a href="<?=base_url()?>main/single_news/<?=$new_s->id?>" class="news_arr"></a>

			<a  href="<?=base_url()?>main/single_news/<?=$new_s->id?>" class="slider_title"><?=$new_s->title?></a>
			<div class="blue_hr_m"></div>
			<div class="slider_desc"><?=$new_s->content?></div>

		</div>
		<?}?>

		<div class="black_gr"></div>
	</div>



<div class="f_news_container hide">

	<div class="f_news">
		<div class="f_news_header">
			<div class="news_header">News</div>
			<div class="news_date"><?=date('l - d.m')?></div>
		</div>
		<div class="f_news_img" style="background-image: url('<?=base_url()?>cover/<?=$news[0]->cover_file?>') " >
			<a href="<?=base_url()?>main/single_news/<?=$news[0]->id?>" class="news_arr"></a>
		</div>
		<a  href="<?=base_url()?>main/single_news/<?=$news[0]->id?>" class="f_news_title" ><?=$news[0]->title?></a>
		<div class="f_news_desc" ><?=substr(strip_tags($news[0]->content), 0, 70)?></div>
	</div>


	<div class="s_news">
		<div class="s_news_img" style="background-image: url('<?=base_url()?>cover/<?=$news[1]->cover_file?>') " >
			<a href="<?=base_url()?>main/single_news/<?=$news[1]->id?>" class="news_arr"></a>
		</div>
		<a href="<?=base_url()?>main/single_news/<?=$news[1]->id?>"  class="f_news_title" ><?=$news[1]->title?></a>
		<div class="f_news_desc" ><?=substr(strip_tags($news[1]->content), 0, 70)?></div>
	</div>


</div>

	<div class="news_containers hide">
		<?foreach ($news as $k => $new){
			if($k == 4)break;
			?>
			<div class="n_container">
				<div class="news_img" style="background-image: url('<?=base_url()?>cover/<?=$new->cover_file?>') "></div>
				<a href="<?=base_url()?>main/single_news/<?=$new->id?>" class="news_title"><?=$new->title?></a>
				<div class="blue_hr"></div>
				<div class="news_desc"><?=str_replace('&nbsp;','', substr(strip_tags($new->content), 0, 70))?></div>
			</div>
		<?}?>
	</div>
	<div class="next_month">
		<?=date('F', strtotime('previous month')); ?>
	</div>


	<div class="news_containers hide">
		<?foreach ($news as $k => $new){
			if($k == 4)break;
			?>
			<div class="n_container">
				<div class="news_img" style="background-image: url('<?=base_url()?>cover/<?=$new->cover_file?>') "></div>
				<a href="<?=base_url()?>main/single_news/<?=$new->id?>" class="news_title"><?=$new->title?></a>
				<div class="blue_hr"></div>
				<div class="news_desc"><?=str_replace('&nbsp;','', substr(strip_tags($new->content), 0, 70))?></div>
			</div>
		<?}?>
	</div>


	<div class="news_containers hide">
		<?foreach ($news as $k => $new){
			if($k < 4)continue;
			?>
			<div class="n_container">
				<div class="news_img" style="background-image: url('<?=base_url()?>cover/<?=$new->cover_file?>') "></div>
				<a href="<?=base_url()?>main/single_news/<?=$new->id?>" class="news_title"><?=$new->title?></a>
				<div class="blue_hr"></div>
				<div class="news_desc"><?=str_replace('&nbsp;','', substr(strip_tags($new->content), 0, 70))?></div>
			</div>
		<?}?>
	</div>

	<div class="list_news_slider desc_hide">
		<?foreach ($news as  $new_l){

			?>
			<div class="n_container">
				<div class="news_img" style="background-image: url('<?=base_url()?>cover/<?=$new_l->cover_file?>') "></div>
				<a href="<?=base_url()?>main/single_news/<?=$new_l->id?>" class="news_title"><?=$new_l->title?></a>
				<div class="blue_hr"></div>
				<div class="news_desc"><?=str_replace('&nbsp;','', substr(strip_tags($new_l->content), 0, 70))?></div>
			</div>
		<?}?>
	</div>




<?}?>

</div>



</div>
<script>
	$(function () {
		$('.news_slider').slick({
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
