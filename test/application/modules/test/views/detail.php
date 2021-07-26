<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label col-md-4">
                <b>Name:</b>
            </label>
            <div class="col-md-8">
                <p class="form-control-static">
                    <?php 
                        echo (isset($client['name']) && !empty($client['name']) ? $client['name'] : '');
                    ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label col-md-4">
                <b>Email:</b>
            </label>
            <div class="col-md-8">
                <p class="form-control-static">
                    <?php 
                        echo (isset($client['email']) && !empty($client['email']) ? $client['email'] : '');
                    ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label col-md-4">
                <b>Password:</b>
            </label>
            <div class="col-md-8">
                <p class="form-control-static">
                    <?php 
                        echo (isset($client['password']) && !empty($client['password']) ? $client['password'] : '');
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>