
<style>

	.list_content a{
		color: #0248BB;
		margin: 15px 5px;
		float: right;
	}

</style>


		<h1>PRODUCTS</h1>
		<p>
			OCTO LNG is providing energy market participants with access to a wide range of physical and financial trading instruments generally falling into 3 product classes:
		</p>

		<?foreach ($category as $k => $cat) {?>
			<div class="product_list" id="bg<?=4-($k+1)?>">
				<?=$cat->category_name?>:
			</div>
			<div class="list_content">
				<ul>
					<?
					foreach($this->db->get_where('products_category',
						array('parent_id'=>$cat->id)
						)->result() as $subcat){
					?>
						<li><?=$subcat->category_name?></li>
					<?}?>

					<?
					$this->db->join('content_data','content_data.id = content.id');
					$this->db->join('product_to_category','product_to_category.content_id = content.id');
					foreach($this->db->get_where('content', array(
						'content.category_id'=>5,
						'product_to_category.category_id'=>$cat->id,
						'lang_id'=>1
					))->result() as $prod){
					?>
						<li><?=$prod->title?></li>
					<?}?>
<!--					<li class="see_all"><a href="--><?//=base_url()?><!--main/products_category/--><?//=$cat->id?><!--">See Product Specs →</a></li>-->


				</ul>
			</div>
		<?}?>


	</div>
<div class="right_content hide">
	<div class="right_menu">
		<a href="<?=base_url()?>main/markets"><span class="sub_blue">01.</span> MARKETS</a>
		<a href="<?=base_url()?>main/products" class="active"><span class="sub_green"></span>  Products</a>
		<a href="#" ><span class="sub_blue">03.</span>  Clearing</a>
		<a  href="#" ><span class="sub_blue">04.</span>  TRADE FINANCE</a>
		<a href="#" ><span class="sub_blue">05.</span>  CONTRACTING</a>
		<a  href="#" class="lch"><span class="sub_blue">06.</span>  REPORTING</a>
		<a  href="#" class="lch"><span class="sub_blue">07.</span>  RULEBOOK</a>
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
		<div class="trblock hvr-curl-top-right"><span class="sub_blue">07.</span>rulebook</div>
	</div>
</div>

