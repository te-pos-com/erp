<div class="content-body">
    <div class="card card-block">
        <div id="notify" class="alert alert-success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>

            <div class="message"></div>
        </div>
        <div class="card">
            <form method="post" id="data_form_new" class="card-body">
                
                    <h5>Edit Product warehouse</h5>
                    <hr>
                    <input type="hidden" name="catid" value="<?php echo $warehouse['id'] ?>">
                    <div class="form-group row">

                        <label class="col-sm-2 col-form-label" for="product_cat_name">Warehouse Name</label>

                        <div class="col-sm-8">
                            <input type="text"
                                class="form-control margin-bottom  required" name="product_cat_name"
                                value="<?php echo $warehouse['title'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-8">
                            <input type="text" name="product_cat_desc" class="form-control required"
                                aria-describedby="sizing-addon1" value="<?php echo $warehouse['extra'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"
                            for="lid"><?php echo $this->lang->line('Business Locations') ?></label>
                        <div class="col-sm-6">
                            <select name="lid" class="form-control">
                                <option value='<?php echo $warehouse['loc'] ?>'><?php echo $this->lang->line('Do not change') ?></option>
                                <option value='0'><?php echo $this->lang->line('All') ?></option>
                                <?php
                                foreach ($locations as $row) {
                                    $cid = $row['id'];
                                    $acn = $row['cname'];
                                    $holder = $row['address'];
                                    echo "<option value='$cid'>$acn - $holder</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">

                        <label class="col-sm-2 col-form-label"></label>

                        <div class="col-sm-4">
                            <input type="submit" id="submit-data_new" class="btn btn-success margin-bottom"
                                value="Update" data-loading-text="Updating...">
                            <input type="hidden" value="productcategory/editwarehouse" id="action-url_new">
                        </div>
                    </div>
            </form>
        </div>
    </div>

</div>


<script>
$("#submit-data2").on("click", function(e) {
    e.preventDefault();
    var o_data =  $("#data_form_new").serialize();
    var action_url= $('#action-url_new').val();
    addObject(o_data,action_url);
});

function addObject(action,action_url) {


    var errorNum = farmCheck();
    var $btn;
    if (errorNum > 0) {
        $("#notify").removeClass("alert-success").addClass("alert-warning").fadeIn();
        $("#notify .message").html("<strong>Error</strong>: It appears you have forgotten to complete something!");
        $("html, body").scrollTop($("body").offset().top);
    } else {

        jQuery.ajax({

            url: baseurl + action_url,
            type: 'POST',
            data: action,
            dataType: 'json',
            success: function (data) {
                if (data.status == "Success") {
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                    })
                    $("#notify .message").html("<strong>" + data.status + "</strong>: " + data.message);
                    $("#notify").removeClass("alert-danger").addClass("alert-success").fadeIn();
                    $("html, body").scrollTop($("body").offset().top);
                    //$("#data_form").remove();

                } else {
                    $("#notify .message").html("<strong>" + data.status + "</strong>: " + data.message);
                    $("#notify").removeClass("alert-success").addClass("alert-danger").fadeIn();
                    $("html, body").scrollTop($("body").offset().top);

                }

            },
            error: function (data) {
                $("#notify .message").html("<strong>" + data.status + "</strong>: " + data.message);
                $("#notify").removeClass("alert-success").addClass("alert-warning").fadeIn();
                $("html, body").scrollTop($("body").offset().top);

            }
        });
    }
}
</script>
