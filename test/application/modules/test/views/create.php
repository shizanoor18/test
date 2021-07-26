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
									if (!isset($client['id']) ||empty($client['id']))
										{
											$update_id = 0;
										}
										else{
											$update_id = $client['id'];
										}
								?>
								<h3 class="m-portlet__head-text">
                                    <i class="fa fa-list"></i>
									<?php if(!empty($update_id)) echo "Update"; else echo "Add"; ?>
									 Users
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->
          			<?php
						$attributes = array('autocomplete' => 'off','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed form-horizontal','method'=>'post','id'=>'m_form_1');
						$hidden = array('update_id' => $update_id);
						echo form_open_multipart(ADMIN_BASE_URL . 'test/insert/'.$update_id, $attributes, $hidden);
					?> 
					<div class="m-portlet__body">
						<div class="form-group m-form__group  append">

						<div class="row">
							<div class="col-lg-5">
								<label>
								Clients Details <span style="color:red">*</span>
								</label>
							</div>
</div>
					
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
										if(!isset($client['name']))
											$client['name'] = '';
									?>
									<input type="text" class="form-control m-input txt" id="name" name="name" value="<?=$client['name']?>" required="required" > 
								</div>
							</div>
							<div class="col-lg-5">
								<label>
								Email <span style="color:red">*</span>
								</label>
							
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<?php
										if(!isset($client['email']))
											$client['email'] = '';
									?>
									<input type="text" class="form-control m-input txt" id="email" name="email" value="<?=$client['email']?>" required="required" > 
								</div>
							</div>
							<div class="col-lg-5">
								<label>
								Password <span style="color:red">*</span>
								</label>
									
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<?php
										if(!isset($client['password']))
											$client['password'] = '';
									?>
									<input type="text" class="form-control m-input txt" id="password" name="password" value="<?=$client['password']?>" required="required">
								</div>

							</div>
							

					</div>
					<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions--solid">
							<div class="row">
								<div class="col-lg-4"></div>
								<div class="col-lg-8">
									<button type="submit" class="btn btn-primary create">
										Submit
									</button>
									<a href="<?php echo ADMIN_BASE_URL . 'create'; ?>">
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
