<script src="//rawcdn.githack.com/RickStrahl/jquery-resizable/master/dist/jquery-resizable.min.js"></script>

<form action="#" enctype="multipart/form-data" method="post" id="add_content" >
	<div class="form-group">
		<label>Content title</label>
		<input name="title" class="form-control form-control-sm">
	</div>
	<div class="form-group">
		<label class="d-block">Prewiew:</label>
		<img style="max-width: 150px" src="<?=base_url()?>cover/<?=@$cover[0]->cover_file?>" class="cover_prew img-thumbnail">
	</div>

	<div class="form-group">
		<label>Cover (for news)</label>
		<input name="cover" type="file" class="form-control form-control-sm">
	</div>

	<div class="form-group">
		<label>Content is:</label>
		<select name="type" class="form-control">
			<option value="">Select</option>
			<option value="public">Public area</option>
			<option class="private">Private area</option>
		</select>
	</div>

	<div class="form-group hide_cats" style="display: none">
		<label>Move to: (Select content section)</label>
		<select name="category" class="form-control">
			<?foreach ($category as $cat){?>
				<option data-pub="<?=$cat->is_public?>" value="<?=$cat->category_id?>"><?=$cat->category_name?></option>
			<?}?>
		</select>
	</div>

	<div class="form-group rep" style="display: none">
		<label>Link name</label>
		<input name="ln" class="form-control form-control-sm">
	</div>

	<div class="form-group rep" style="display: none">
		<label>link url</label>
		<input name="ll"  class="form-control form-control-sm">
	</div>


	<div class="form-group prod_cats" style="display: none">
		<label>Select product category:</label>
		<select name="category_product" class="form-control">
			<?foreach ($prod_cat as $cat_p){?>
				<option  value="<?=$cat_p->id?>"><?=$cat_p->category_name?></option>
			<?}?>
		</select>
	</div>

	<div class="form-group">
		<label>Content</label>
		<textarea id="my-editor" name="content"></textarea>
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
				url:'<?=base_url()?>panel/save_content',
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


		$('[name="category"]').on('change',function () {
			if($(this).val()==5) {
				$('.prod_cats').slideDown(400);
			}else {
				$('.prod_cats').slideUp(400);
			}
		})

		$('[name="category"]').on('change',function () {
			if($(this).val()==6) {
				$('.rep').slideDown(400);
			}else {
				$('.rep').slideUp(400);
			}


		})

	});

</script>
