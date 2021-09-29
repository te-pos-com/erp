
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
<title>Register</title>
</head>
<body>
<div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('<?= base_url();?>assets/images/bg_1.jpg');"></div>
        <div class="contents order-2 order-md-1">
            <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7">
                                <h3>Register to<img src="https://www.te-pos.my.id/public/images/logo.png" width="150px" height="50px"></h3>
                                <div id="hasil"></div>
                                <form action="#" id="frmlogin" name="frmlogin" method="post">
                                    <div class="form-group first">
                                    <label for="username">Username *</label>
                                    <input type="text" class="form-control" placeholder="Your username" name="username" id="username">
                                    </div>
                                    <div class="form-group last mb-2">
                                    <label for="password">Password *</label>
                                    <input type="password" class="form-control" placeholder="Your Password" name="password" id="password">
                                    </div>
                                    <div class="form-group last mb-2">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" placeholder="youremail@mail.com" name="email" id="email">
                                    </div>
                                    <div class="form-group last mb-2">
                                    <label for="perusahaan">Perusahaan *</label>
                                    <input type="perusahaan" class="form-control" placeholder=" Nama Perusahaan" name="perusahaan" id="perusahaan">
                                    </div>
                                    <div class="form-group last mb-2">
                                    <label for="password">Alamat</label>
                                    <textarea class="form-control" placeholder="Alamat" name="alamat" id="alamat"> </textarea>
                                    </div>
                                    <div class="form-group last mb-2">
                                    <button class="btn btn-block btn-success" id="tombollogin">
                                        Register
                                    </button>
                                    </div>
                                    <p class="cl-grey text-center">
                                        <br/>
                                        <br/>
                                        Sudah Punya Akun? Silahkan <a href="<?= base_url()?>user">Login</a>
                                    </p>
                                </form>
                            </div>
                        </div>
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