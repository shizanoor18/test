
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label col-md-4">
                <b>Feature:</b>
            </label>
            <div class="col-md-8">
                <p class="form-control-static">
                    <?php 
                        echo (isset($post['feature']) && !empty($post['feature']) ? $post['feature'] : '');
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