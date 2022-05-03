<div class="row">

	<div class="col-md form-group">
		<label>Marketplace list header:</label>
		<select class="form-control" name="new_list">
			<option value="1">Marketplace 1rst colum</option>
			<option value="2">Marketplace 2nd colum</option>
			<option value="3">TRADING VENUE</option>
		</select>
	</div>
	<div class="col-md form-group">
		<label>List name:</label>
		<input class="form-control" name="new_item">
	</div>
	<div class="col-md form-group">
		<label>Add list:</label>
		<div class="btn btn-primary d-block add_news">Add list</div>
	</div>
</div>

<div class="row">
	<div class="col-md form-group">
		<label>Marketplace list header:</label>
		<div class="form-group"><input class="form-control" value="<?=$list_head->list_name?>" name="list_head"></div>
	</div>
</div>

<div class="row">
	<table class="table">
		<tr><th  colspan="2">Marketplace colum 1:</th></tr>
		<?foreach ($col1 as $col){?>
		<tr>
			<td><input name="list_item" data-id="<?=$col->id?>" value="<?=$col->item_name?>" class="form-control"></td>
			<td><div data-id="<?=$col->id?>"  class="btn btn-danger item_del"><i class="fas fa-trash"></i></div></td>
		</tr>
		<?}?>
	</table>
</div>

<div class="row">
	<table class="table">
		<tr><th  colspan="2">Marketplace colum 2:</th></tr>
		<?foreach ($col2 as $col2){?>
		<tr>
			<td><input name="list_item" data-id="<?=$col2->id?>" value="<?=$col2->item_name?>" class="form-control"></td>
			<td><div data-id="<?=$col2->id?>"  class="btn btn-danger item_del"><i class="fas fa-trash"></i></div></td>
		</tr>
		<?}?>
	</table>
</div>
<script>
	$(function () {

		$('[name="list_item"]').on('change',function () {
			$.ajax({
				url:'<?=base_url()?>panel/main_list',
				method:'post',
				data:{
					list_item:$(this).val(),
					i:$(this).data('id')

				},
				success:function () {
					alert('Done!');
				}
			});
		});

		$('[name="list_head"]').on('change',function () {
			$.ajax({
				url:'<?=base_url()?>panel/main_list',
				method:'post',
				data:{
					h:$(this).val()

				},
				success:function () {
					alert('Done!');
				}
			});
		});

		$('.add_news').on('click',function () {
			$.ajax({
				url:'<?=base_url()?>panel/main_list',
				method:'post',
				data:{
					n:$('[name="new_item"]').val(),
					i:$('[name="new_list"]').val()

				},
				success:function () {
				location.reload()
				}
			});
		});


		$('.item_del').on('click',function () {
			$.ajax({
				url:'<?=base_url()?>panel/main_list',
				method:'post',
				data:{
					del_id:$(this).data('id'),
				},
				success:function () {
				location.reload()
				}
			});
		});



	});
</script>
