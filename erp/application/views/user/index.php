
<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
<link rel="icon" type="image/png" href="<?= base_url()?>assets/images/favicon.png" />
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
<title>Login</title>
</head>
<body>
<div class="d-lg-flex half">
    <div class="bg order-1 order-md-1" style="background-image: url('<?= base_url();?>assets/images/bg_1.jpg');"></div>
        <div class="contents order-2 order-md-1">
            <div class="container">
                <div class="row align-items-center justify-content-center" style="background-color:#fff">
                    <div class="col-md-7">
                    <h3 class="text-center">Login to<img src="<?= base_url()?>assets/images/logo.png" width="150px" height="50px"></h3>
                    <?php if ($response) {
                                echo '<div id="notify" class="alert alert-danger" >
                    <a href="#" class="close" data-dismiss="alert">&times;</a> <div class="message">' . $response . '</div>
                </div>';
                            } ?>
                    <?php
                        $attributes = array('class' => 'form-horizontal form-simple', 'id' => 'login_form');
                        echo form_open('user/checklogin', $attributes);
                                ?>

                        <div class="form-group first">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" style="border:1px solid #cd955c" placeholder="<?php echo $this->lang->line('Your Email') ?>" name="username" id="username">
                        </div>
                        <div class="form-group last mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" style="border:1px solid #cd955c" placeholder="<?php echo $this->lang->line('Your Password') ?>" name="password" id="password">
                            
                        </div>

                        <?php if ($this->aauth->get_login_attempts() > 1 && $captcha_on) {
                            echo '<script src="https://www.google.com/recaptcha/api.js"></script>
                        <fieldset class="form-group position-relative has-icon-left">
                            <div class="g-recaptcha" data-sitekey="' . $captcha . '"></div>
                        </fieldset>';
                        } ?>
                        <div class="form-group row">
                            <div class="col-md-6 col-12 text-center text-sm-left">
                                <fieldset>
                                    <input type="checkbox" id="remember-me" class="chk-remember"
                                            name="remember_me">
                                    <label for="remember-me">  <?php echo $this->lang->line('remember_me') ?></label>
                                </fieldset>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-block btn-success" id="tombollogin">
                            Masuk
                        </button>
                        <p class="cl-grey text-center" style="color:#000">
                            <br/>
                            <br/>
                            Lupa akun te-pos ? <a href="<?php echo base_url('user/forgot'); ?>">Klik Disini</a>
                            <br/>
                            Belum Punya Akun te-pos ? <a href="<?php echo base_url('user/register'); ?>">Daftar Disini</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= assets_url(); ?>app-assets/vendors/js/vendors.min.js"></script>
<script type="text/javascript" src="<?= assets_url(); ?>app-assets/vendors/js/ui/jquery.sticky.js"></script>
<script type="text/javascript" src="<?= assets_url(); ?>app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
<script src="<?= assets_url(); ?>app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
<script src="<?= assets_url(); ?>app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
<script src="<?= assets_url(); ?>app-assets/js/core/app-menu.js"></script>
<script src="<?= assets_url(); ?>app-assets/js/core/app.js"></script>
<script type="text/javascript" src="<?= assets_url(); ?>app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
<script src="<?= assets_url(); ?>app-assets/js/scripts/forms/form-login-register.js"></script>

</body>
</html>