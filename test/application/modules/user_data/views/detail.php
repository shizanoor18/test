
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label col-md-4">
                <b>User Name:</b>
            </label>
            <div class="col-md-8">
                <p class="form-control-static">
                    <?php 
                        echo (isset($post['username']) && !empty($post['username']) ? $post['username'] : '');
                    ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label col-md-4">
                <b>User Email:</b>
            </label>
            <div class="col-md-8">
                <p class="form-control-static">
                    <?php 
                        echo (isset($post['usermail']) && !empty($post['usermail']) ? $post['usermail'] : '');
                    ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label col-md-4">
                <b>User Password:</b>
            </label>
            <div class="col-md-8">
                <p class="form-control-static">
                    <?php 
                        echo (isset($post['userpass']) && !empty($post['userpass']) ? $post['userpass'] : '');
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>