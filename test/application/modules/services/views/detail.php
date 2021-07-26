
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label col-md-4">
                <b>Company Name:</b>
            </label>
            <div class="col-md-8">
                <p class="form-control-static">
                    <?php 
                        echo (isset($post['c_name']) && !empty($post['c_name']) ? $post['c_name'] : '');
                    ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label col-md-4">
                <b>Description:</b>
            </label>
            <div class="col-md-8">
                <p class="form-control-static">
                    <?php 
                        echo (isset($post['description']) && !empty($post['description']) ? $post['description'] : '');
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>