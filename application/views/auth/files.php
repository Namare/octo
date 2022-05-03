<form id="add_files">
<div class="row">

<div class="col-md">
	<div class="form-group">
		<input class="form-control"  name="name">
	</div>
</div>
<div class="col-md">
	<div class="form-group">
		<input class="form-control" type="file" name="file">
	</div>
</div>
<div class="col-md">
	<div class="form-group">
		<button class="btn btn-primary ">Upload</button>
	</div>
</div>

</div>
</form>
<div class="form-group text-center">
	<div class="container-fluid text-info d-none info-loading "  style="font-size: 18px">
		<br>
		<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
		<span class="text">Loading...</span>
	</div>
	<div class="container-fluid text-success d-none info-done "  style="font-size: 18px">
		<br>
		<span class="fa fa-check" role="status" aria-hidden="true"></span>
		<span class="text">Done!</span><br><br>
		<div class="btn-group">
			<a class="btn btn-primary" href="<?=base_url()?>/panel"><i class="fa fa-arrow-alt-circle-left"></i> Go to admin panel</a>
			<a  class="btn btn-primary" href="<?=base_url()?>">Go to site <i class="fa fa-arrow-alt-circle-right"></i></a>
		</div>
	</div>
</div>

<table class="table">
	<?foreach ( $files as $file){?>
	<tr>
		<td><a target="_blank" href="<?=base_url()?>files/<?=$file->file_url?>"><?=$file->file_name?></a></td>
		<td><div class="btn btn-danger del_file" data-id="<?=$file->id?>"><i class="fas fa-trash"></i></td>

	</tr>
	<?}?>
</table>
<script>
	$('#add_files').on('submit', function(event){
		event.preventDefault();
		$(this).slideUp(350);
		$('.save_btn').hide();
		$('.info-loading').removeClass('d-none');

		var data = new FormData(this) ;
		$.ajax({
			url:'<?=base_url()?>panel/files',
			method:'post',
			cache: false,
			contentType: false,
			processData: false,
			data:data,
			success:function () {
			window.location.reload();
			}
		});
	});

	$('.del_file').on('click',function () {
		$.ajax({
			url: '<?=base_url()?>panel/del_file/',
			method: 'POST',
			data:{
				i:$(this).data('id')
			},
			success:function () {
				window.location.reload()
			}
		})
	});
</script>
