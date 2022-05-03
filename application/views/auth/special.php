<script src="//rawcdn.githack.com/RickStrahl/jquery-resizable/master/dist/jquery-resizable.min.js"></script>

<div class="col-md">


	<div class="form-group">
		<label>Content:</label>
		<textarea rows="5" id="my-editor" class="form-control content" ><?=$content->content?></textarea>
	</div>

	<div class="form-group">

		<div class="btn btn-primary save">Save</div>
	</div>

</div>
<script>
	$(function () {
		$('#my-editor').trumbowyg();

		$('.save').on('click',function () {
				$.ajax({
					url:'<?=base_url()?>panel/special/<?=$content->id?>',
					method:"post",
					data:{
						c:$('.content').val()
					}
				});
		});
	});
</script>
