

<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
<link rel="icon" type="image/png" href="<?= base_url()?>public/images/favicon.png" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="fonts/icomoon/style.css">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?= assets_url(); ?>app-assets/<?= LTR ?>/vendors.css">
    <link rel="stylesheet" type="text/css" href="<?= assets_url(); ?>app-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="<?= assets_url(); ?>app-assets/vendors/css/forms/icheck/custom.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="<?= assets_url(); ?>app-assets/<?= LTR ?>/app.css">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="<?= assets_url(); ?>app-assets/<?= LTR ?>/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css"
          href="<?= assets_url(); ?>app-assets/<?= LTR ?>/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?= assets_url(); ?>app-assets/<?= LTR ?>/pages/login-register.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= assets_url(); ?>assets/css/style.css">
    <!-- END Custom CSS-->
    <!-- END Custom CSS-->
    <script src="<?= assets_url(); ?>app-assets/vendors/js/vendors.min.js"></script>
    <script type="text/javascript" src="<?= assets_url(); ?>app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script type="text/javascript"
            src="<?= assets_url(); ?>app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
    <script src="<?= assets_url(); ?>app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="<?= assets_url(); ?>app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <script src="<?= assets_url(); ?>app-assets/js/core/app-menu.js"></script>
    <script src="<?= assets_url(); ?>app-assets/js/core/app.js"></script>
    <script src="<?php echo assets_url(); ?>assets/myjs/jquery.password-validation.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?= base_url()?>assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= base_url()?>assets/css/style2.css">
<title>Lupa password</title>
</head>
<body>
<div class="d-lg-flex half">
    <div class="bg order-1 order-md-1" style="background-image: url('<?= base_url();?>assets/images/bg_3.jpg');"></div>
        <div class="contents order-2 order-md-1">
            <div class="container">
                <div class="row align-items-center justify-content-center"  style="background-color:#fff">
                    <div class="col-md-7">
                    <div id="notify" class="alert alert-success" style="display:none;">
                        <div class="message"></div>
                    </div>
                    <form action="#" id="frmlogin" name="frmlogin" method="post">
                        <div class="form-group first">
                        <label for="username">Masukan E-mail Terdaftar</label>
                        <input type="email" class="form-control" style="border:1px solid #cd955c" placeholder="<?php echo $this->lang->line('Your Email') ?>" name="email" id="user-email">
                        <input type="hidden" id="action-url" value="user/send_reset">
                      
                        </div>
                        <button id="submit-data" class="btn btn-block btn-success">
                            <i
                            class="icon-lock4"
                            data-loading-text="Loading..."></i>
                            Kirim
                        </button>                        
                        <p class="cl-grey text-center" style="color:#000">
                            <br/>
                            <br/>
                            Kembali ke Halaman <a href="<?= base_url();?>user">Login</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    //universal create
    $("#submit-data").on("click", function (e) {
        e.preventDefault();
        $(this).text("Processing...");
        $(this).prop('disabled', true);
        var o_data = $("#data_form").serialize();
        var action_url = $('#action-url').val();
        addObject(o_data, action_url);
    });

    function addObject(action, action_url) {


        jQuery.ajax({

            url: '<?php echo base_url() ?>' + action_url,
            type: 'POST',
            data: action + '&<?=$this->security->get_csrf_token_name(); ?>=<?=$this->security->get_csrf_hash(); ?>',
            dataType: 'json',
            success: function (data) {
                if (data.status == "Success") {
                    $("#notify .message").html("<strong>" + data.status + "</strong>: " + data.message);
                    $("#notify").removeClass("alert-danger").addClass("alert-success").fadeIn();
                    $("html, body").scrollTop($("body").offset().top);
                    $("#data_form").remove();


                } else {
                    $("#notify .message").html("<strong>" + data.status + "</strong>: " + data.message);
                    $("#notify").removeClass("alert-success").addClass("alert-danger").fadeIn();
                    $("html, body").scrollTop($("body").offset().top);
                    $('#submit-data').prop('disabled', false);
                    $('#submit-data').text("Retry");

                }

            },
            error: function (data) {
                $("#notify .message").html("<strong>" + data.status + "</strong>: " + data.message);
                $("#notify").removeClass("alert-success").addClass("alert-warning").fadeIn();
                $("html, body").scrollTop($("body").offset().top);

            }
        });


    }
</script>
</body>
</html>