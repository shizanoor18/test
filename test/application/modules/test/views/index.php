<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-content">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							<i class="m-menu__link-icon flaticon-edit"></i> Clients
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<a href="<?=ADMIN_BASE_URL?>test/create" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
								<span>
									<i class="flaticon-file-1"></i>
									<span>
										Add New
									</span>
								</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="m-portlet__body">
				<!--begin: Datatable -->
				<table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
					<thead>
						<tr>
							<th>
								S.No
							</th>
							<th>
								Name
							</th>
							<th>
							   Email
							</th>
							<th>
								Password
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
                    	$i=0;
                        if (isset($clients)) {
                        	foreach ($clients as $row):
                        		$i++;   
                        		if (!isset($return_page))
									$return_page = 0;
                        		$edit_url = ADMIN_BASE_URL . 'test/create/' . $row->id;
                        		// $delete_url = ADMIN_BASE_URL.'client/delete/'.$row->id;
                        ?>
						<tr>
							<td>
								<?php echo $i;?>
							</td>
							<td>
								<?php echo $row->name; ?>
							</td>
							<td>
								<?php echo $row->email; ?>
							</td>
							<td>
								<?php echo $row->password; ?>
							</td>
							<td nowrap="">
								<span class="dropdown">
									<a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
										<i class="la la-ellipsis-h"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 28px, 0px);">
										<a class="dropdown-item view_details" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"
								    	 rel="<?=$row->id?>"><i class="flaticon-file"></i> Detail</a>
										<a class="dropdown-item" href="<?=$edit_url?>"><i class="la la-edit"></i> Edit Details</a>
										<a class="dropdown-item delete" href="javascript:void(0);" abc="<?=$row->id?>"><i class="fa fa-trash-o"></i> Delete</a>
									</div>
								</span>
							</td>
						</tr>
							<?php endforeach;
						} ?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>
</div>

<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 id="exampleModalLabel" class="modal-title" style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"><i class="fa fa-folder"></i> User Details</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="application/javascript">

$(document).on("click", ".view_details", function(event){
		event.preventDefault();
		var id = $(this).attr('rel');
		$.ajax({
			type: 'POST',
			url: "<?=ADMIN_BASE_URL?>test/detail",
			data: {'id': id},
			async: false,
			success: function(res_html) {
				$('#userModal').modal('show')
				$("#userModal .modal-body").html(res_html);
			}
		});
	});


$(document).on("click", ".delete", function(event){
		event.preventDefault();
		var id = $(this).attr('abc');
		$.ajax({
			type: 'POST',
			url: "<?=ADMIN_BASE_URL?>test/delete",
			data: {'id': id},
			async: false,
			success: function(res_html) {
				swal("Deleted!", "client has been deleted", "success");
				location.reload();
			}
		});
	});

</script>
