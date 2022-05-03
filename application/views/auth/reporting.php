<div class="row">

	<div class="col-sm">
		<div class="form-group">
			<label>Select reporting:</label>
			<select class="form-control rep_id">
				<? foreach ($reports as $rep) {?>
					<option value="<?=$rep->id?>"><?=$rep->title?></option>
				<?}?>

			</select>
		</div>
	</div>

	<div class="col-sm">
		<div class="form-group">
			<label>Link name</label>
			<input name="link_name" class="form-control">
		</div>
	</div>
	<div class="col-sm">
		<div class="form-group">
			<label>Link url</label>
			<input name="link_url" class="form-control">
		</div>
	</div>

<div class="col-sm">
	<div class="form-group">
		<label>Add:</label>
		<button class="form-control add_link btn btn-primary">Add link</button>
	</div>
</div>

</div>

<div class="row">
	<div class="col-sm">
		<table class="table table-hover table-light">
			<tr>
				<th>Title reporting:</th>
				<th>Link name:</th>
				<th>Url:</th>
				<th>Delete</th>
			</tr>
			<?foreach($links as $link){

				?>
				<tr>
					<td><?=$this->db->get_where('content_data',array(
						'id'=>$link->rep_id,
						'lang_id'=>1,
						))->result()[0]->title?></td>
					<td><?=$link->link_name?></td>
					<td><?=$link->link?></td>
					<td><div class="btn btn-danger del_rep" data-id="<?=$link->id?>" ><i class="fas fa-trash-alt"></i> Delete</div></td>
				</tr>
			<?}?>
		</table>
	</div>

</div>
<script>
	$(function () {
		$('.add_link').on('click',function(){

			$.ajax({
				url: '<?=base_url()?>panel/add_rep',
				method: 'post',
				data: {
					i: $('.rep_id').val(),
					link:$('[name="link_url"]').val(),
					name:$('[name="link_name"]').val(),
				},
				success: function () {
					location.reload()
				}
			});
		});

		$('.del_rep').on('click',function(){

			$.ajax({
				url: '<?=base_url()?>panel/del_rep',
				method: 'post',
				data: {
					id: $(this).data('id')
				},
				success: function () {
					location.reload()
				}
			});
		});


	});
</script>
