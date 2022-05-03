<script src="//rawcdn.githack.com/RickStrahl/jquery-resizable/master/dist/jquery-resizable.min.js"></script>

	<div class="col-md">
		<div class="form-group">
			<label>Board of Directors:</label>
			<textarea rows="2" id="editor1" data-id="1" class="form-control " ><?=$mc[0]->content?></textarea>
		</div>

		<div class="form-group">
			<div class="form-control btn btn-success" id="editor1">Save</div>
		</div>
		<div class="form-group">
			<label> Executive Managment</label>
			<textarea rows="2" id="editor2" data-id="2" class="form-control " ><?=$mc[1]->content?></textarea>
		</div>
		<div class="form-group">
		<div class="form-control btn btn-success" id="editor2">Save</div>
		</div>
		<div class="form-group">
			<label>Corporate Govermance:</label>
			<textarea rows="2" id="editor3"  data-id="3" class="form-control " ><?=$mc[2]->content?></textarea>
		</div>

		<div class="form-group">
			<div class="form-control btn btn-success" id="editor3">Save</div>
		</div>		<br>

		<h5><i class="fas fa-user"></i> People list:</h5>
<form id="users">
		<div class="form-group">
			<label>User name:</label>
			<input name="name" class="form-control">
		</div>
		<div class="form-group">
			<label>User photo:</label>
			<input name="photo" class="form-control" type="file">
		</div>
		<div class="form-group">
			<label>User position:</label>
			<input name="pos" class="form-control">
		</div>
		<div class="form-group">
			<label>Category:</label>
			<select name="category_id" class="form-control">
				<option value="1">Board of Directors</option>
				<option value="2">Executive Managment:</option>
			</select>
		</div>
		<div class="form-group">
			<label>Description:</label>
			<textarea  name="description" rows="2" class="form-control  " ></textarea>
		</div>
		<div class="form-group">
			<label>Submit</label>
			<div class="form-control btn btn-success send_user">Send</div>
		</div>
</form>
		<br>
		<br>
		<br>


		<div class="row">
			<table class="table">
				<? foreach ($users as $user) {?>
				<tr>
					<td><img style="width: 90px" src="<?=base_url()?>photo/<?=$user->photo?>"></td>
					<td data-up="name<?=$user->id?>"><?=$user->name?></td>
					<td data-up="text<?=$user->id?>" ><?=$user->description?></td>
					<td data-up="position<?=$user->id?>"><?=$user->pos?></td>
					<td><?=$user->category_id?></td>
					<td style="width:8%"><input data-id="<?=$user->id?>" class='form-control sort_user' value="<?=$user->sort?>"></td>
					<td><div class="btn btn-primary edit_user" data-toggle="modal" data-target="#useredit" data-id="<?=$user->id?>"><i class="fas fa-pen"></i></td>
					<td><div class="btn btn-danger del_user" data-id="<?=$user->id?>"><i class="fas fa-trash"></i></td>
				</tr>
				<?}?>
			</table>
		</div>

		<h5><i class="fas fa-user"></i> Committee:</h5>

		<form id="comm">
			<div class="form-group">
				<label>Committee name</label>
				<input name="name" class="form-control">
			</div>
			<div class="form-group">
				<label>Description:</label>
				<textarea  name="description" rows="2" class="form-control" ></textarea>
			</div>
			<div class="form-group">
				<label>Submit</label>
				<div class="form-control btn btn-success send_comm">Send</div>
			</div>
		</form>

	<div class="row">
		<table class="table">
			<? foreach ($comm as $comm) {?>
				<tr>
					<td><?=$comm->name?></td>
					<td><?=$comm->description?></td>
					<td><div class="btn btn-danger del_comm" data-id="<?=$comm->id?>"><i class="fas fa-trash"></i></td>
				</tr>
			<?}?>
		</table>
	</div>
		<h5><i class="fas fa-file"></i> Files:</h5>

		<form id="addfile">
			<div class="form-group">
				<label>File name</label>
				<input name="name" class="form-control">
			</div>
			<div class="form-group">
				<label>File url</label>
				<input name="url" class="form-control">
			</div>
			<div class="form-group">
				<label>File group</label>
				<select class="form-control" name="file_group">
					<option value="0">None</option>
					<?foreach ($file_groups as $fg ) {?>
						<option value="<?=$fg->id?>"><?=$fg->name?></option>>
					<?}?>
				</select>
			</div>
			<div class="form-group">
				<label>Submit</label>
				<div class="form-control btn btn-success add_file">Send</div>
			</div>
		</form>
		<h5><i class="fas fa-file"></i> Files groups:</h5>
		<form id="file_group">
			<div class="form-group">
				<label>Group Name</label>
				<input name="group_name" class="form-control">
			</div>
			<div class="form-group">
				<label>Submit</label>
				<div class="form-control btn btn-success add_group">Send</div>
			</div>
		</form>

		<div class="row">
			<table class="table">
					<tr>
						<td>Name</td>
						<td>Url</td>
						<td>Order</td>
					</tr>
				<? foreach ($files as $file) {?>
					<tr>
						<td><?=$file->name?></td>
						<td><input class="form-control file_url" data-id="<?=$file->id?>" value="<?=$file->url?>"></td>
						<td><input  data-id="<?=$file->id?>"  class="form-control order_file" value="<?=$file->order?>"></td>
						<td><div class="btn btn-danger del_file" data-id="<?=$file->id?>"><i class="fas fa-trash"></i></td>
					</tr>
				<?}?>
			</table>
		</div>
		<h5>File Groups</h5>
		<div class="row">
			<table class="table">

				<? foreach ($file_groups as $file_groups) {?>
					<tr>
						<td><input class="form-control edit_gr" value="<?=$file_groups->name?>" data-id="<?=$file_groups->id?>"></td>

					</tr>
				<?}?>
			</table>
		</div>

	</div>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#useredit">
	Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="useredit" tabindex="-1" role="dialog" aria-labelledby="useredit" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="useredit">Edit</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Name:</label>
					<input class="form-control" name="uname">
				</div>
				<div class="form-group">
					<label>Position:</label>
					<input class="form-control" name="uposition">
				</div>
				<div class="form-group">
					<label>Text:</label>
					<textarea class="form-control" rows="5" name="utext"></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary update_user">Save changes</button>
			</div>
		</div>
	</div>
</div>

<script>


	$(function () {

		$('.del_comm').on('click',function () {
				$.ajax({
					url: '<?=base_url()?>panel/del_comm/'+$(this).data('id'),
					method: 'POST',
					success:function () {
						window.location.reload();
					}
				})
		});

		$('.del_file').on('click',function () {
			$.ajax({
				url: '<?=base_url()?>panel/del_url/',
				method: 'POST',
				data:{
					i:$(this).data('id')
				},
				success:function () {
					window.location.reload()
				}
			})
		});
		$('.file_url').on('change',function () {
			$.ajax({
				url: '<?=base_url()?>panel/file_url/',
				method: 'POST',
				data:{
					i:$(this).data('id'),
					o:$(this).val()
				},
				success:function () {

				}
			})
		});
		$('.sort_user').on('change',function () {
			$.ajax({
				url: '<?=base_url()?>panel/sort_order/',
				method: 'POST',
				data:{
					i:$(this).data('id'),
					s:$(this).val()
				},
				success:function () {

				}
			})
		});

		$('.order_file').on('change',function () {
			$.ajax({
				url: '<?=base_url()?>panel/up_order/',
				method: 'POST',
				data:{
					i:$(this).data('id'),
					o:$(this).val()
				},
				success:function () {

				}
			})
		});
		$('.edit_gr').on('change',function () {
			$.ajax({
				url: '<?=base_url()?>panel/edit_gr/',
				method: 'POST',
				data:{
					i:$(this).data('id'),
					o:$(this).val()
				},
				success:function () {

				}
			})
		});
		$('.del_user').on('click',function () {
				$.ajax({
					url: '<?=base_url()?>panel/del_user/'+$(this).data('id'),
					method: 'POST',
					success:function () {
						window.location.reload();
					}
				})
		});

		$( ".send_user" ).click(function(  ) {
			var form = document.getElementById('users');
			var data = new FormData(form);
			$.ajax({
				url: '<?=base_url()?>panel/manag_users/',
				type:'post',
				cache:'false',
				processData: false,
				contentType: false,
				data:data,
				success:function (){
					window.location.reload();
				}
			});
		});

		$( ".add_file" ).click(function(  ) {
			var form = document.getElementById('addfile');
			var data = new FormData(form);
			$.ajax({
				url: '<?=base_url()?>panel/add_file/',
				type:'post',
				cache:'false',
				processData: false,
				contentType: false,
				data:data,
				success:function (){
					window.location.reload();
				}
			});
		});

		$( ".add_group" ).click(function(  ) {
			var form = document.getElementById('file_group');
			var data = new FormData(form);
			$.ajax({
				url: '<?=base_url()?>panel/file_group/',
				type:'post',
				cache:'false',
				processData: false,
				contentType: false,
				data:data,
				success:function (){
					window.location.reload();
				}
			});
		});

		$( ".send_comm" ).click(function(  ) {
			var form = document.getElementById('comm');
			var data = new FormData(form);
			$.ajax({
				url: '<?=base_url()?>panel/manag_comm/',
				type:'post',
				cache:'false',
				processData: false,
				contentType: false,
				data:data,
				success:function (){
					window.location.reload();
				}
			});
		});

		$('.edit_user').on('click', function () {
			$("[name='uname']").val($('[data-up="name'+$(this).data('id')+'"]').text())
			$("[name='utext']").val($('[data-up="text'+$(this).data('id')+'"]').text())
			$("[name='uposition']").val($('[data-up="position'+$(this).data('id')+'"]').text())
			id = $(this).data('id');
			$('.update_user').on('click',function () {

				$.ajax({
					url: '<?=base_url()?>panel/udpate_user/'+id,
					method:'post',
					data:{
						name:$("[name='uname']").val(),
						text:$("[name='utext']").val(),
						pos:$("[name='uposition']").val(),
					},
					success:function () {
						location.reload();
					}
				})

			});


		})

		$('#editor1, #editor2, #editor3').on('click',function () {
			var i = $(this).attr('id');
			var id = $('textarea#'+i).data('id');
			var c = $('textarea#'+i).val();

			$.ajax({
				url: '<?=base_url()?>panel/manage_content/'+id,
				method:'post',
				data:{
					c:c
				},
				success:function () {
					alert('Done')
				}
			})
		});


		$('#editor1').trumbowyg();
		$('#editor2').trumbowyg();
		$('#editor3').trumbowyg();







	});


</script>
