<script src="//rawcdn.githack.com/RickStrahl/jquery-resizable/master/dist/jquery-resizable.min.js"></script>

<form action="#" method="post" id="add_content">
	<div class="form-group">
		<label>Select language</label>
		<select name="lang" class="form-control form-control-sm">
		<? foreach ($lang as $lg) {?>
			<option value="<?=$lg->lang_id?>"><?=$lg->lang_name?></option>

		<?}?>
		</select>
	</div>
	<div class="form-group">
		<label>Content title</label>
		<input name="title" value="<?=$content->title?>" class="form-control form-control-sm">
		<input name="id" type="hidden" value="<?=$content->id?>" class="form-control form-control-sm">
	</div>


	<div class="form-group">
		<label class="d-block">Prewiew:</label>
		<img style="max-width: 150px" src="<?=base_url()?>cover/<?=@$content->cover_file?>" class="cover_prew img-thumbnail">
	</div>

	<div class="form-group">
		<label>Cover (for news)</label>
		<input name="cover" type="file" class="form-control form-control-sm">
	</div>


	<div class="form-group" >
		<label>Move to: (Select content section)</label>
		<select name="category" class="form-control form-control-sm">
			<?foreach ($category as $cat){
				$selected = ($content->category_id == $cat->category_id)?'selected':'';
				?>

				<option <?=$selected?> data-pub="<?=$cat->is_public?>" value="<?=$cat->category_id?>"><?=$cat->category_name?></option>
			<?}?>
		</select>
	</div>

	<div class="form-group">
		<label>Content</label>
		<textarea id="my-editor" name="content"><?=$content->content?></textarea>
	</div>



	<div class="form-group">
		<label>Save content:</label>
		<button type="submit" class="btn btn-primary d-block save_content">Submit</button>
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

<script>
	$(function(){
		$('#my-editor').trumbowyg();

		$('#add_content').on('submit', function(event){
			event.preventDefault();
			$(this).slideUp(350);
			$('.save_btn').hide();
			$('.info-loading').removeClass('d-none');

			var data = new FormData(this) ;
			$.ajax({
				url:'<?=base_url()?>panel/update_content',
				method:'post',
				cache: false,
				contentType: false,
				processData: false,
				data:data,
				success:function () {
					$('.info-loading').hide();
					$('.info-done').removeClass('d-none');
				}
			});
		});

		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$('.cover_prew').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$("[name='cover']").change(function() {
			readURL(this);
		});

		$('[name="type"]').on('change',function () {
			$('.hide_cats').slideDown(400);
			if($(this).val()=='public'){
				$('[data-pub="0"]').attr('disabled','disabled');
				$('[data-pub="1"]').prop('disabled',false);

			}else {
				$('[data-pub="1"]').attr('disabled', 'disabled');
				$('[data-pub="0"]').prop('disabled', false)
				$('[name="category"]').prop('selectedIndex',1);
			}
		})

	});

</script>
