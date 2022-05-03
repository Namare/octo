
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-comments"></i>
                            </div>
                            <div class="mr-5">Add Content</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="<?=base_url()?>panel/add_content">
                            <span class="float-left">Go to content editor</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>


            </div>



            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
					<div class="btn-group btn-group-sm">
						<a href="<?=base_url()?>panel" class="btn btn-primary">All</a>
						<a href="<?=base_url()?>panel/news" class="btn btn-primary">News</a>
						<a href="<?=base_url()?>panel/prod" class="btn btn-primary">Products</a>
						<a href="<?=base_url()?>panel/rep" class="btn btn-primary">Reporting</a>
					</div></div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
								<th>Name</th>
								<th>Type</th>
								<th>Action</th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Name</th>

                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
							<?foreach ($content as $con){?>
                            <tr>

                                <td><?=$con->title?></td>
                                <td><?=$con->category_name?></td>
								<td class="text-center" style="max-width: 150px">

										<a href="<?=base_url()?>panel/edit_content/<?=$con->id?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>  </a>
										<a href="<?=base_url()?>panel/delete_content/<?=$con->id?>" class="btn btn-danger btn-sm" data-content-id="<?=$con->id?>"><i class="fa fa-trash"></i> </a>

								</td>

                            </tr>
								<?}?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

			<script>
				$(function(){

					$('.paginate_button a').on('click', function () {
						$(document).find('.delete_content');
					})

					$('.delete_content').on('click',function () {

						if(confirm('Вы действительно хотите удалить материал?') == true) {
							$.ajax({
								type: 'POST',
								url: '<?=base_url()?>panel/delete_content/' + $(this).data('content-id'),
								cache: false,
								contentType: false,
								processData: false,
								success: function () {
									window.location.reload();
								}
							});
						}

                    });

				})
			</script>

