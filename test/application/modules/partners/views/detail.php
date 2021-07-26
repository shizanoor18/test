
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label col-md-4">
                <b>Title:</b>
            </label>
            <div class="col-md-8">
                <p class="form-control-static">
                    <?php 
                        echo (isset($result['title']) && !empty($result['title']) ? $result['title'] : '');
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label col-md-4">
                <b>Link:</b>
            </label>
            <div class="col-md-8">
                <p class="form-control-static">
                    <?php 
                        echo (isset($result['link']) && !empty($result['link']) ? $result['link'] : '');
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>
