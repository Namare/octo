<div class="row">

<div class="col-sm">
	<div class="form-group">
		<label>Add product category</label>
		<input name="add_cat" class="form-control">
	</div>
</div>
<div class="col-sm">
	<div class="form-group">
		<label>Parent category:</label>
		<select name="p_cat" class="form-control">

			<option value="0">None</option>
			<?foreach ($category as $cat){?>
				<option value="<?=$cat->id?>"><?=$cat->category_name?></option>
			<?}?>
		</select>
	</div>
</div>
<div class="col-sm">
	<div class="form-group">
		<label>Add:</label>
		<button class="form-control add_category btn btn-primary">Add category</button>
	</div>
</div>

</div>

<div class="row">
	<div class="col-sm">
		<table class="table table-hover">
			<tr>
				<th>Product name</th>
				<th>Selected category</th>
			</tr>
			<?foreach($products as $prod){
				$select = $this->db->get_where('product_to_category',array('content_id'=>$prod->id))->result();
				?>
			<tr>
				<td><?=$prod->title?></td>
				<td>
					<select name="p_cat" data-prod-id="<?=$prod->id?>" class="form-control">
						<option value="0">None</option>
						<?foreach ($category as $cat){
							$sl = '';
							if($select[0]->category_id == $cat->id){
								$sl = 'selected';
							}
							?>
							<option <?=$sl?> value="<?=$cat->id?>"><?=$cat->category_name?></option>
						<?}?>
					</select>
				</td>
			</tr>
			<?}?>
		</table>
	</div>

</div>


<div class="row">
	<div class="col-sm">
		<table class="table table-hover table-light">
			<tr>
				<th>Category name</th>
			</tr>
			<?foreach($category as $cat){

				?>
			<tr>
				<td><input class="form-control" value="<?=$cat->category_name?>" name="up_cat" data-id="<?=$cat->id?>"></td>
				<td><div class="btn btn-primary">Save</div>
					<div data-id="<?=$cat->id?>" class="btn btn-danger del_cat">Delete</div></td>

			</tr>
			<?}?>
		</table>
	</div>

</div>
<script>
	$(function () {
		$('.del_cat').on('click',function () {
			$.ajax({
				url: '<?=base_url()?>panel/del_product_cat',
				method: 'post',
				data: {
					i: $(this).data('id')
				},
				success: function () {
					location.reload();
				}
			});
		});

		$('.add_category').on('click', function () {
			$.ajax({
				url: '<?=base_url()?>panel/add_product_cat',
				method: 'post',
				data: {
					c: $('[name="add_cat"]').val(),
					p: $('[name="p_cat"]').val(),
				},
				success: function () {
					location.reload();
				}
			});
		})

		$('[name="p_cat"]').on('change',function () {
			$.ajax({
				url: '<?=base_url()?>panel/update_prod',
				method: 'post',
				data: {
					c: $(this).val(),
					p:$(this).data('prod-id'),
				},
				success: function () {
					alert("Done!");
				}
			});
		});

		$('[name="up_cat"]').on('change',function () {
			$.ajax({
				url: '<?=base_url()?>panel/update_cat',
				method: 'post',
				data: {
					v: $(this).val(),
					p:$(this).data('id'),
				},
				success: function () {
					alert("Done!");
				}
			});
		});

	});
</script>
