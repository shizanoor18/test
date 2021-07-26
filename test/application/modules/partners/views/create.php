<style>
	input.larger { 
	transform: scale(1.4); 
	margin-top: 5px;
	margin-left: 20px;
    margin-right: 20px;
	} 
</style>
<input type="hidden" name="old_image_name" value="<?=(isset($partners['image']) && !empty($partners['image']) ?$partners['image'] : '');?>" >
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
									 Partners
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->
          			<?php
						$attributes = array('autocomplete' => 'off','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed form-horizontal','method'=>'post','id'=>'m_form_1');
						$hidden = array('update_id' => $update_id);
						echo form_open_multipart(ADMIN_BASE_URL . 'partners/submit/', $attributes, $hidden);
					?> 
					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<label>
								Title <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<?php
										if(!isset($partners['title']))
											$partners['title'] = '';
									?>
									<input type="text" class="form-control m-input" id="title" name="title" value="<?=$partners['title']?>" required="required">
								</div>
							</div>
							<div class="col-lg-6">
								<label>
								Link <span style="color:red">*</span>
								</label>
								<div class="input-group m-input-group m-input-group--square">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="flaticon-edit-1"></i>
										</span>
									</div>
									<?php
										if(!isset($partners['link']))
											$partners['link'] = '';
									?>
									<input type="text" class="form-control m-input" id="link" name="link" value="<?=$partners['link']?>" required="required">
								</div>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-md-5 col-lg-6 col-md-offset-6">
                                <div class="col-md-12">
                                    <div class="form-group last">
                                        <label class="control-label col-md-4">Image Upload </label>
                                        <div class="col-md-8">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;background-color: #f3f3f3;">
                                                    <?
                                                    if(!isset( $partners['image']))
                                                     $partners['image']='';
                                                    $filename =ACTUAL_PARTNERS_IMAGE_PATH.$partners['image'];
                                                    if (isset($partners['image']) && !empty($partners['image']) && file_exists($filename)) {
                                                    ?>
                                                    <img src = "<?php echo BASE_URL.ACTUAL_PARTNERS_IMAGE_PATH.$partners['image'] ?>" />
                                                    <?php
                                                	} else {
                                                    ?>
                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                                                    <?php
                                               		 }
                                                	?>
                                            	</div>
	                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
	                                            </div>
	                                            <div>
	                                                <span class="btn default btn-file">
	                                                    <span class="fileupload-new">
	                                                        <i class="fa fa-paper-clip"></i> Select image
	                                                    </span>
	                                                    <span class="fileupload-exists">
	                                                        <i class="fa fa-undo"></i> Change
	                                                    </span>
	                                                    <input type="file" name="news_file" id="news_file" class="default" />
	                                                    <input type="hidden" id="hdn_image" value="<?php if(isset($partners['image'])) echo  $partners['image'] ?>" name="hdn_image"/>
	                                                </span>
	                                                <a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
	                                            </div>
                                        	</div>
                                    	</div>
                                	</div>
                            	</div>
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
									<a href="<?php echo ADMIN_BASE_URL . 'partners'; ?>">
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