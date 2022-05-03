
<div class="row">

	<div class="col-sm">
	<table class="table">
		<?foreach($markets as $ma){?>
		<tr>
			<td><input name="market_u" value="<?=$ma->title?>" data-id="<?=$ma->id?>" class="form-control form-control-sm market_u"></td>

		</tr>
		<?}?>
	</table>
	</div>
</div>
<!---->
<!--<div class="row">-->
<!--	<div class="col-sm">-->
<!--		<div class="form-group">-->
<!--			<label>Market title</label>-->
<!--			<input name="market_title" class="form-control market_title">-->
<!--		</div>-->
<!--	</div>-->
<!--	<div class="col-sm">-->
<!--		<div class="form-group">-->
<!--			<label>Add:</label>-->
<!--			<button class="form-control add_mr btn btn-primary">Add market</button>-->
<!--		</div>-->
<!--	</div>-->
<!---->
<!--</div>-->



<script>
	$(function () {
		$(".market_u").on('change',function () {
			$.ajax({
				url:"<?=base_url()?>panel/markets",
				method:"post",
				data:{u:$(this).val(),i:$(this).data('id')},
				success:function () {
					alert('Done!');
				}

			});
		});
		$('.add_mr').on('click',function () {
			$.ajax({
				url:"<?=base_url()?>panel/markets",
				method:"post",
				data:{t:$('.market_title').val()},
				success:location.reload()

			})
		})
	});
</script>
