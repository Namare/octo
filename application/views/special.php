<h1><?=$content->name?></h1>
<?=$content->content?>
</div>

<div class="right_content hide">
	<div class="right_menu">

		<a href="<?=base_url()?>main/markets"><span class="sub_blue">01.</span> MARKETS</a>
		<a href="<?=base_url()?>main/products"><span class="sub_blue">02.</span> products</a>
		<a href="<?=base_url()?>main/clearing" <?=($content->id==1)?' class="active"><span class="sub_green"></span>':'"><span class="sub_blue">02.</span>'?>  Clearing</a>
		<a  href="<?=base_url()?>main/trade_finance" <?=($content->id==2)?' class="active"><span class="sub_green"></span>':'"><span class="sub_blue">03.</span>'?>  TRADE FINANCE</a>
		<a href="<?=base_url()?>main/contracting" <?=($content->id==3)?' class="active"><span class="sub_green"></span>':'"><span class="sub_blue">04.</span>'?>CONTRACTING</a>
		<a  href="<?=base_url()?>main/reporting" class="lch"><span class="sub_blue">06.</span>  REPORTING</a>
		<a  href="<?=base_url()?>main/reporting" class="lch"><span class="sub_blue">07.</span>  RULEBOOK</a>
	</div>
</div>

<div id="trblocks" class="desc_hide  ">
	<a href="<?=base_url()?>main/markets"  class="trblock hvr-curl-top-right"><span class="sub_blue">01.</span>markets</a>
	<a href="<?=base_url()?>main/products" class="trblock hvr-curl-top-right"><span class="sub_blue">02.</span>products</a>
	<a  href="<?=base_url()?>main/clearing" class="trblock hvr-curl-top-right" <?=($content->id==1)?'style="background-color: #e8e8e8;
    color: #0c0c0c;':''?>><span class="sub_blue">03.</span>clearing</a>
	<a  href="<?=base_url()?>main/trade_finance" class="trblock hvr-curl-top-right" <?=($content->id==2)?'style="background-color: #e8e8e8;
    color: #0c0c0c;':''?>><span class="sub_blue">04.</span>trade finance</a>
	<a  href="<?=base_url()?>main/contracting" class="trblock hvr-curl-top-right"  <?=($content->id==3)?'style="background-color: #e8e8e8;
    color: #0c0c0c;':''?>><span class="sub_blue">05.</span>contracting</a>
	<a  href="<?=base_url()?>main/reporting" class="trblock hvr-curl-top-right"><span class="sub_blue">06.</span>reporting</a>
	<a  href="<?=base_url()?>main/reporting" class="trblock hvr-curl-top-right"><span class="sub_blue">07.</span>rulebook</a>
</div>
</div>
