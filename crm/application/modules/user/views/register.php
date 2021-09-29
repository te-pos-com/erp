
<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" type="image/png" href="<?= base_url()?>public/images/favicon.png" />
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="fonts/icomoon/style.css">
<link rel="stylesheet" href="<?= base_url()?>public/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?= base_url()?>public/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= base_url()?>public/css/style2.css">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo assets_url(); ?>crm-assets/images/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo assets_url(); ?>crm-assets/images/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo assets_url(); ?>crm-assets/images/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo assets_url(); ?>crm-assets/images/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo assets_url(); ?>crm-assets/images/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="<?php echo assets_url(); ?>crm-assets/images/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>crm-assets/css/bootstrap.css">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>crm-assets/fonts/icomoon.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo assets_url(); ?>crm-assets/fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>crm-assets/vendors/css/extensions/pace.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>crm-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>crm-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>crm-assets/css/colors.css">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/crm-assets/css/custom.css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="<?php echo assets_url(); ?>crm-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo assets_url(); ?>crm-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>crm-assets/css/pages/login-register.css">
    <script src="<?php echo assets_url(); ?>crm-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo assets_url(); ?>crm-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
    <script src="<?php echo assets_url(); ?>crm-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo assets_url(); ?>crm-assets/myjs/jquery.password-validation.js" type="text/javascript"></script>
<title>Register</title>
</head>
<body>
<div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('<?= base_url();?>crm-assets/images/bg_3.jpg');"></div>
        <div class="contents order-2 order-md-2">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <h3>Register to<img src="<?php echo substr_replace(base_url(), '', -4); ?>userfiles/company/<?php echo $this->config->item('logo'); ?>" width="150px" height="50px"></h3>
                    
                    <?php if ($this->session->flashdata("messagePr")) { ?>
                        <div class="alert alert-info">
                            <?php echo $this->session->flashdata("messagePr") ?>
                        </div>
                    <?php } ?>
                    
                    <div class="col-md-11">
                    <form action="<?php echo base_url() . 'user/registration'; ?>" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col mb-2">
                                    <input type="text" name="name" class="form-control" data-validation="required" placeholder="<?php echo $this->lang->line('Name') ?> ">
                                </div>
                                <div class="col mb-2">
                                    <input type="email" name="email" class="form-control"
                                                            data-validation="required"
                                                            placeholder="<?php echo $this->lang->line('Email') ?> ">
                                </div>
                                <div class="col mb-2">
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Password" data-validation="required" id="user-pass">
                                </div>

                                <div class="col mb-2">
                                    <input type="password" name="password"
                                                    class="form-control"
                                                    placeholder="Ulangi password"
                                                    data-validation="confirmation"
                                                    id="user-pass2">
                                </div>
                                <div class="col mb-2">
                                    <input type="text" name="phone" class="form-control"
                                    data-validation="required" placeholder="Phone">
                                </div>
                                <div class="col mb-2">
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span></div>
                                    <div class="col mb-2">
                                    <select class="form-control" name="lang"><?= $langs ?></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col  mb-2">
                                    <input type="text" name="address" class="form-control" data-validation="required" placeholder="Address">
                                </div>
                                <div class="col  mb-2">
                                    <input type="text" name="city" class="form-control" data-validation="required" placeholder="City">
                                </div>
                                <div class="col  mb-2">
                                        <input type="text" name="region" class="form-control"
                                            data-validation="required" placeholder="Region">
                                </div>
                                <div class="col  mb-2">
                                    <input type="text" name="country" class="form-control" data-validation="required" placeholder="Country">
                                </div>
                                <div class="col  mb-2">
                                    <input type="text" name="postbox" class="form-control"
                                    data-validation="required" placeholder="Postbox">
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>
                                <div class="col  mb-2">
                                <button type="submit" name="submit" class="btn btn-block btn-success">
                                    <?php echo $this->lang->line('Register') ?>
                                </button>
                            </div>    
                        </div>

                        <?php
                                    if ($custom_fields) {
                                        echo '<div class="form-group row">';
                                        $r = 0;
                                        foreach ($custom_fields as $row) {
                                            if ($row['f_type'] == 'text') { ?>


                                                <div class="col-sm-6">
                                                    <input type="text" placeholder="<?= $row['placeholder'] ?>"
                                                           class="form-control margin-bottom b_input <?= $row['other'] ?>"
                                                           name="custom[<?= $row['id'] ?>]">
                                                </div>


                                                <?php
                                                $r++;
                                                if ($r % 2 == 0) echo '</div><div class="form-group row">';
                                            }
                                        }
                                        echo '</div>';
                                    }
                                    ?>

                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                        value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div id="errors" class="well"></div>
                                        <input type="hidden" name="call_from" value="reg_page">

                                    </div>
                                </div>

                    </form>
                </div>
            </div>
            <p class="cl-grey text-center">
                <br/>
                <br/>
                Sudah Punya Akun? Silahkan <a href="<?php echo base_url('user/login'); ?>">Login</a>
            </p>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        <?php if($this->input->get('invited') && $this->input->get('invited') != ''){ ?>
        $burl = '<?php echo base_url() ?>';
        $.ajax({
            url: $burl + 'user/chekInvitation',
            method: 'post',
            data: {
                code: '<?php echo $this->input->get('invited'); ?>'
            },
            dataType: 'json'
        }).done(function (data) {
            console.log(data);
            if (data.result == 'success') {
                $('[name="email"]').val(data.email);
                $('form').attr('action', $burl + 'user/register_invited/' + data.users_id);
            } else {
                window.location.href = $burl + 'user/login';
            }
        });
        <?php } ?>
    });
</script>
<script>
    $(document).ready(function () {
        $("#user-pass").passwordValidation({"confirmField": "#user-pass2"}, function (element, valid, match, failedCases) {

            $("#errors").html("<div class='alert alert-warning mb-2' role='alert'><strong>Password Rules</strong> MaxChar: 12<br>" + failedCases.join("<br>") + "</div>");

            if (valid) $(element).css("border", "2px solid green");
            if (!valid) {
                $(element).css("border", "2px solid red");
                $('#submit-data').attr('disabled', 'disabled');
            }
            if (valid && match) {
                $("#user-pass2").css("border", "2px solid green");
                $('#errors').html('');
                $('#submit-data').removeAttr('disabled');
            }
            if (!valid || !match) {
                $("#user-pass2").css("border", "2px solid red");
                $('#submit-data').attr('disabled', 'disabled');
            }
        });
    });
</script>
</body>
</html>