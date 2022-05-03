
<div class="row">

	<table class="table table-hover">
		<tr>
		<th>Section name</th>
		<th style="width: 80%">Content</th>
		<th>Action</th>
		</tr>

		<?foreach($content as $con){?>
		<tr>
			<td style="color: #6d6d6d; font-size: 14px"><?=$con->name?></td>
			<td><textarea rows="4" data-id="<?=$con->id?>" class="form-control cont"><?=$con->content?></textarea></td>
			<td><div class="btn btn-primary"><i class="fas fa-save"></i></div></td>
		</tr>
		<?}?>

	</table>

</div>
<script>
	$(function () {
		$('.cont').on('change',function () {
			$.ajax({
				url:'<?=base_url()?>panel/update_main',
				method:'post',
				data:{
					c:$(this).val(),
					i:$(this).data('id')

				},
				success:function () {
					alert('Done!');
				}
			});
		});

	});
</script>
