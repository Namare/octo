
<style>

	.list_content a{
		color: #0248BB;
		margin: 15px 5px;
		float: right;
	}
	.content{
		width: 63%;
	}
	p{
		font-size: 1vh;
	}

</style>


<h1>Reporting</h1>
<p style="width: 86%; margin-bottom: 30px">
	Comprehensive trade logs: history of bidding, trade negotiations and trade execution and confirmation is recorder with the use of blockchain that structurally excludes any backdated or retroactive munipulation and records everything.
</p>
<?foreach ($contents as $cont){?>
<div class="list_reporting">
	<div class="rep_title"><?=$cont->title?></div>
	<div class="rep_content"><?=strip_tags($cont->content)?></div>
	<div class="rep_links">

		<?foreach ($this->db->get_where('reporting',array('rep_id'=>$cont->id))->result() as $link){?>
			<a target="_blank" href="<?=$link->link?>"><?=$link->link_name?></a>
		<?}?>

	</div>
</div>
<?}?>

</div>
<div class="right_content hide">
	<div class="right_menu">
		<a href="<?=base_url()?>main/markets"><span class="sub_blue">01.</span> MARKETS</a>
		<a href="<?=base_url()?>main/products" ><span class="sub_blue">02.</span>    Products</a>
		<a href="<?=base_url()?>main/clearing" ><span class="sub_blue">03.</span>  Clearing</a>
		<a href="<?=base_url()?>main/trade_finance"><span class="sub_blue">04.</span>  TRADE FINANCE</a>
		<a href="<?=base_url()?>main/contracting"> <span class="sub_blue">05.</span> CONTRACTING</a>
		<a class="lch" class="active"><span class="sub_green"></span> REPORTING</a>
		<a class="lch" class="active"><span class="sub_green"></span> RULEBOOK</a>
	</div>
</div>

<div id="trblocks" class="desc_hide  ">
	<a href="<?=base_url()?>main/markets"  class="trblock hvr-curl-top-right"><span class="sub_blue">01.</span>markets</a>
	<a href="<?=base_url()?>main/products" class="trblock hvr-curl-top-right"><span class="sub_blue">02.</span>products</a>
	<a href="<?=base_url()?>main/clearing" class="trblock hvr-curl-top-right"><span class="sub_blue">03.</span>clearing</a>
	<a href="<?=base_url()?>main/trade_finance" class="trblock hvr-curl-top-right"><span class="sub_blue">04.</span>trade finance</a>
	<a href="<?=base_url()?>main/contracting" class="trblock hvr-curl-top-right"><span class="sub_blue">05.</span>contracting</a>
	<a href="<?=base_url()?>main/reporting" class="trblock hvr-curl-top-right"  style="background-color: #e8e8e8;
    color: #0c0c0c;"><span class="sub_blue">06.</span>reporting</a>
</div>
</div>

