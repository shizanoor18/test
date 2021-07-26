<style>
	input.larger { 
	transform: scale(1.4); 
	margin-top: 5px;
	margin-left: 20px;
    margin-right: 20px;
	} 
</style>
<input type="hidden" name="old_image_name" value="<?=(isset($record['image']) && !empty($record['image']) ?$record['image'] : '');?>" >
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-content">
		<div class="row">
			<div class="col-lg-12">
				<!--begin::Portlet-->
				<div class="m-portlet">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<?php
									if (!isset($update_id) ||empty($update_id))
										$update_id = 0;
								?>
								<h3 class="m-portlet__head-text">
                                    <i class="fa fa-list"></i>
									<?php if(!empty($update_id)) echo "Update"; else echo "Add"; ?>
									 Service
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->
          			<?php
						$attributes = array('autocomplete' => 'off','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed form-horizontal','method'=>'post','id'=>'m_form_1');
						$hidden = array('update_id' => $update_id);
						echo form_open_multipart(ADMIN_BASE_URL . 'services/submit/', $attributes, $hidden);
					?> 
					<div class="m-portlet__body">
						<div class="form-group m-form__group  append">

						<div class="row">
							<div class="col-lg-5">
								<label>
								Company Name <span style="color:red">*</span>
								</label>
							
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<?php
										if(!isset($record['c_name']))
											$record['c_name'] = '';
									?>
									<input type="text" class="form-control m-input txt" id="c_name" name="c_name" value="<?=$record['c_name']?>" required="required" > 
								</div>
							</div>
							<div class="col-lg-5">
								<label>
								Company Ower Name <span style="color:red">*</span>
								</label>
									
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<?php
										if(!isset($record['o_name']))
											$record['o_name'] = '';
									?>
									<input type="text" class="form-control m-input txt" id="o_name" name="o_name" value="<?=$record['o_name']?>" required="required">
								</div>

							</div>
</div>
						<h3>Sub Services</h3>
				<?php if(isset($sub_data) && !empty($sub_data)){
					foreach($sub_data as $key =>$value):
					?>
						<div class="row">
							<div class="col-lg-5">
								<label>
								Name <span style="color:red">*</span>
								</label>
							
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<?php
										if(!isset($value['name']))
											$value['name'] = '';
									?>
									<input type="text" class="form-control m-input txt" id="name" name="name" value="<?=$value['name']?>" required="required" > 
								</div>
							</div>
							<div class="col-lg-5">
								<label>
								Description <span style="color:red">*</span>
								</label>
									
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<?php
										if(!isset($value['description']))
											$value['description'] = '';
									?>
									<input type="text" class="form-control m-input txt" id="description" name="description" value="<?=$value['description']?>" required="required">
								</div>

							</div>
							<div class="col-lg-2"  ><i rel="<?=$value['id']?>" class="fa fa-close delete_record pd"></i></div>
						</div>
					<?php endforeach; } else{?>
						<div class="row">
							<div class="col-lg-5">
								<label>
								Name <span style="color:red">*</span>
								</label>
							
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input txt" id="name" name="name[]" value="" required="required" > 
								</div>
							</div>
							<div class="col-lg-5">
								<label>
								Description <span style="color:red">*</span>
								</label>
									
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<input type="text" class="form-control m-input txt" id="description[]" name="description" value="" required="required">
								</div>

							</div>
						</div>
					<?php }?>
						</div>
					
						<div class="col-lg-12">
							<div class="mybutton">
								<i class="fa fa-plus"> </i>
							</div>
						</div>
							

					</div>
					<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions--solid">
							<div class="row">
								<div class="col-lg-4"></div>
								<div class="col-lg-8">
									<button type="submit" class="btn btn-primary submit_button">
										Submit
									</button>
									<a href="<?php echo ADMIN_BASE_URL . 'record'; ?>">
										<button  class="btn btn-secondary">
											Cancel
										</button>
									</a>
								</div>
							</div>
						</div>
					</div>
					<?php echo form_close(); ?> 
					<!--end::Form-->
				</div>
				<!--end::Portlet-->
			</div>
		</div>
	</div>
</div>
</div>





<script>


$(document).ready(function(){

$('.mybutton').click(function(){


	html='<div class="row"><div class="col-lg-5"><label>Service Name <span style="color:red">*</span></label><div class="input-group m-input-group m-input-group--square"><div class="input-group-prepend"><span class="input-group-text"><i class="flaticon-edit-1"></i></span></div><input type="text" class="form-control m-input txt" id="name" name="name[]" value="" required="required" > </div></div><div class="col-lg-5"><label>Description <span style="color:red">*</span></label><div class="input-group m-input-group m-input-group--square"><div class="input-group-prepend"><span class="input-group-text"><i class="flaticon-edit-1"></i></span></div><input type="text" class="form-control m-input txt" id="description" name="description[]" value="" required="required"></div></div><div class="col-lg-2"  ><i class="fa fa-close remove pd"></i></div></div>';
$('.append').append(html)

$('.remove').click(function(){
	 $(this).parent().parent().remove()
 });
 });



});
 
</script>

<script type="application/javascript">
$(document).ready(function(){
	$(document).on('click', '.delete_record', function(e){
        var id = $(this).attr('rel');
        e.preventDefault();
		swal({
			title : "Are you sure to delete the selected service?",
			text : "You will not be able to recover this service!",
			type : "warning",
			showCancelButton : true,
			confirmButtonColor : "#DD6B55",
			confirmButtonText : "Yes, delete it!",
			cancelButtonText: "No, cancel!",
			reverseButtons: !0,
			closeOnConfirm : false
		}).then(function(e) {
			if(e.value) {
				$.ajax({
					type: 'POST',
					url: "<?= ADMIN_BASE_URL?>services/delete_record",
					data: {'id': id},
					async: false,
					success: function() {
						swal("Deleted!", "Service has been deleted.", "success");
						location.reload();
					}
				});
				swal("Deleted!", "Webpage has been deleted.", "success");
			}
			if("cancel" === e.dismiss)
				swal("Cancelled", "Record is safe :)", "error");
		});
    });
});
</script>