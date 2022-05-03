<style>
	#page {
		 display: block;
		min-height: 144vh;

	}
	.list_content a{
		color:#5193FF ;
	}

</style>
<br>
<br>
<br>

<div class="product_list" style="padding-left:25px ">
	<?=$category->category_name?>
</div>
	<div class="list_content">
		<ul>
			<?
			foreach($this->db->get_where('products_category',
				array('parent_id'=>$category->id)
			)->result() as $subcat){
				?>
				<li><a href="<?=base_url()?>main/products_category/<?=$subcat->id?>"><?=$subcat->category_name?></a></li>
			<?}?>

			<?
			foreach($products as $prod){
				?>
				<li><a href="<?=base_url()?>main/product/<?=$prod->content_id?>"><?=$prod->title?></a></li>
			<?}?>


		</ul>
	</div>


</div>

<div class="right_content hide">
	<div class="right_menu">
		<a href="<?=base_url()?>main/markets"><span class="sub_blue">01.</span> MARKETS</a>
		<a href="<?=base_url()?>main/products" class="active"><span class="sub_green"></span>  Products</a>
		<a href="<?=base_url()?>main/clearing" ><span class="sub_blue">03.</span>  Clearing</a>
		<a  href="<?=base_url()?>main/trade_finance" ><span class="sub_blue">04.</span>  TRADE FINANCE</a>
		<a href="<?=base_url()?>main/contracting" ><span class="sub_blue">05.</span>  CONTRACTING</a>
		<a  href="<?=base_url()?>main/reporting" class="lch"><span class="sub_blue">06.</span>  REPORTING</a>
		<a  href="<?=base_url()?>main/reporting" class="lch"><span class="sub_blue">07.</span>  RULEBOOK</a>
	</div>
</div>

<div id="trblocks" class="desc_hide  ">
	<a href="<?=base_url()?>main/markets"  class="trblock hvr-curl-top-right"><span class="sub_blue">01.</span>markets</a>
	<a href="<?=base_url()?>main/products" class="trblock hvr-curl-top-right" style="background-color: #e8e8e8;
    color: #0c0c0c;"><span class="sub_blue">02.</span>products</a>
	<div class="trblock hvr-curl-top-right"><span class="sub_blue">03.</span>clearing</div>
	<div class="trblock hvr-curl-top-right"><span class="sub_blue">04.</span>trade finance</div>
	<div class="trblock hvr-curl-top-right"><span class="sub_blue">05.</span>contracting</div>
	<div class="trblock hvr-curl-top-right"><span class="sub_blue">06.</span>reporting</div>
	<div class="trblock hvr-curl-top-right"><span class="sub_blue">06.</span>rulebook</div>
</div>
</div>

