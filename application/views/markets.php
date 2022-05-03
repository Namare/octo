

		<h1>Markets</h1>
		<p>
			OCTO LNG trading venue brings together within single multilateral execution system the following energy markets:
		</p>
		<?php foreach($this->db->get('markets')->result() as $ma){?>
		<div class="content_list" id="bg<?= ($ma->id ==1)?'4':$ma->id;?>">
			<?=$ma->title?>
		</div>
		<?}?>

	</div>
		<div class="right_content hide">
			<div class="right_menu">
				<a href="<?=base_url()?>main/markets" class="active"><span class="sub_green"></span> MARKETS</a>
				<a href="<?=base_url()?>main/products" > <span class="sub_blue">02.</span>Products</a>
				<a href="#" ><span class="sub_blue">03.</span>  Clearing</a>
				<a  href="#" ><span class="sub_blue">04.</span>  TRADE FINANCE</a>
				<a href="#" ><span class="sub_blue">05.</span>  CONTRACTING</a>
				<a  href="#" class="lch"><span class="sub_blue">06.</span>  REPORTING</a>
				<a  href="#" class="lch"><span class="sub_blue">07.</span>  RULEBOOK</a>
			</div>
		</div>

		<div id="trblocks" class="desc_hide  ">
			<a href="<?=base_url()?>main/markets"  class="trblock hvr-curl-top-right"  style="background-color: #e8e8e8;
    color: #0c0c0c;"><span class="sub_blue">01.</span>markets</a>
			<a href="<?=base_url()?>main/products" class="trblock hvr-curl-top-right"><span class="sub_blue">02.</span>products</a>
			<a href="#" class="trblock hvr-curl-top-right"><span class="sub_blue">03.</span>clearing</a>
			<a href="#" class="trblock hvr-curl-top-right"><span class="sub_blue">04.</span>trade finance</a>
			<a href="#" class="trblock hvr-curl-top-right"><span class="sub_blue">05.</span>contracting</a>
			<a href="#" class="trblock hvr-curl-top-right" ><span class="sub_blue">06.</span>reporting</a>
			<a href="#" class="trblock hvr-curl-top-right" ><span class="sub_blue">07.</span>rulebook</a>
		</div>
		</div>
