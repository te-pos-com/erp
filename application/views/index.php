<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Selamat Datang | <?= $setting['nama_website']?></title>
  <meta content="Program ERP,Accounting,CRM,HRM yang lengkap, murah dan mudah digunakan" name="description">
  <meta content="Program Kasir, Program ERP, cloud program, penjualan program, POS program" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url() ?>assets/img/<?= $setting['favicon']?>" rel="icon">

  <style type="text/css">
        .formWaBox{font-size:14px;line-height:1.6;display:flex;position:fixed;z-index:99998;top:0;left:0;width:100%;height:100%;overflow-y:auto;padding:5px 0;visibility:hidden;opacity:0;background:rgba(0,0,0,.6)}.formWaBox.open{visibility:visible;opacity:1;transition:.2s}.formWa{display:block;margin:auto auto;width:calc(100% - 10px);box-shadow:0 20px 50px rgba(0,0,0,.2);max-width:500px;background:#fff;height:100%;border-radius:2px;padding-top:60px;position:relative}.formWa .formWaBody{width:100%;height:auto;max-height:100%;overflow:auto}.formWa .formWaBody .heading{position:absolute;top:0;left:0;width:100%;margin:0;height:60px;line-height:60px;border-bottom:1px solid rgba(0,0,0,.06);font-size:14px;background:#fff;font-weight:400;border-radius:2px 2px 0 0;padding:15px 20px}.formWa .formWaBody .heading svg{height:30px;width:30px;float:left}.formWa .formWaBody .heading i{font-size:35px;float:left;line-height:35px;margin-right:10px;margin-top:-2.5px}.formWa .formWaBody .heading h3{padding:0 5px;float:left;height:30px;line-height:30px;margin:0;color:#444;font-weight:400;font-size:18px;border:none}.formWa .formWaBody .heading .close{position:absolute;width:30px;height:30px;top:15px;right:20px;color:#aaa;text-align:center;padding:0;cursor:pointer;font-size:30px;line-height:20px;font-weight:300;transition:.2s}.formWa .formWaBody .items{position:relative;height:100%;height:auto;position:relative}.formWa .formWaBody .items .item{background:rgba(0,0,0,.02);border-bottom:1px solid rgba(0,0,0,.08)}.formWa .formWaBody .items .item .thumb{width:65px;height:90px;text-align:center;float:left;border-right:1px solid rgba(0,0,0,.08);padding:15px 10px}.formWa .formWaBody .items .item .thumb img{height:100%;width:auto}.formWa .formWaBody .items .item .detailbox{width:calc(100% - 65px);float:left;height:90px;display:flex;align-items:center;justify-content:center;flex-wrap:wrap;flex-direction:row}.formWa .formWaBody .items .item .detailbox .detail{max-width:100%;min-width:100%;text-align:left;flex:1}.formWa .formWaBody .items .item .detailbox .detail h3{margin:0;font-size:14px;line-height:20px;padding:0 20px 0 10px;font-weight:700;height:20px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.formWa .formWaBody .items .item .detailbox .varian{width:100%;padding:0 20px 0 10px;flex:1;margin-top:-25px}.formWa .formWaBody .items .item .detailbox .detail table tr{position:relative}.formWa .formWaBody .items .item .detailbox .detail table tr td{line-height:13px;position:relative;font-size:13px}.formWa .formWaBody .items .item .detailbox .optione{max-width:100%;min-width:100%;text-align:left;flex:1;margin-top:-15px;padding:0 20px 0 10px;position:relative;height:30px}.formWa .formWaBody .items .item .detailbox .optione-price{width:45%;float:left;height:100%;font-weight:700;color:#ff5050;line-height:25px}.formWa .formWaBody .items .item .detailbox .optione-qty{width:55%;float:right;height:100%;height:25px;position:relative}.formWa .formWaBody .items .item .detailbox .optione-qty .optione-qty-changer{width:87px;float:left}.formWa .formWaBody .items .item .detailbox .optione-qty .optione-qty-changer input{width:35px;text-align:center;border:1px solid rgba(0,0,0,.1);border-left:none;border-right:none;border-radius:0;margin:0;float:left;color:#000;height:25px;padding:0}.formWa .formWaBody .items .item .detailbox .optione-qty .optione-qty-changer button{background:rgba(0,0,0,.04);width:25px;height:25px;border:1px solid rgba(0,0,0,.1);cursor:pointer;margin:0;float:left;font-size:16px;line-height:20px;text-align:center;padding:0}.formWa .formWaBody .items .item .detailbox .optione-qty .optione-qty-changer button:hover{background:rgba(0,0,0,.09)}.formWa .formWaBody .items .item .detailbox .optione-qty i{line-height:25px;font-size:20px;float:right;cursor:pointer}.formWa .formWaBody .items .item .detailbox .order-note{margin-top:-15px;min-width:100%;max-width:100%;padding:0 20px 0 10px;height:30px}.formWa .formWaBody .items .item .detailbox .order-note textarea{border-top:none;border-left:none;border-right:none;width:100%;overflow:hidden;line-height:15px;font-size:14px;height:30px}.formWa .formWaBody .subtotal{background:rgba(0,0,0,.02);height:auto;position:relative}.formWa .formWaBody .subtotal table{width:100%;background:#fff;border-color:#fff}.formWa .formWaBody .subtotal table tr td.labelo{line-height:16px;width:100px}.formWa .formWaBody .subtotal table tr td.valueo{line-height:16px;width:calc(100% - 100px)}.formWa .formWaBody .subtotal .subtotalrp{height:40px;width:160px;position:absolute;top:3px;right:20px;text-align:right;font-size:16px;font-weight:700;line-height:16px}.formWa .formWaBody .form{position:relative;padding:10px 20px}.formWa .formWaBody .form table{width:100%;margin-bottom:5px}.formWa .formWaBody .form .input{position:relative}.formWa .formWaBody .form .input input{width:100%;height:40px;line-height:40px;padding-left:25px}.formWa .formWaBody .form .input input[type=search]{width:100%;height:35px;line-height:35px;padding-left:10px}.formWa .formWaBody .form .input .ss-main{width:100%;height:40px;line-height:40px}.formWa .formWaBody .form .input select{width:100%;height:40px;line-height:40px;padding-left:30px}.formWa .formWaBody .form .input textarea{width:100%;height:60px;line-height:30px}.formWa .formWaBody .form .input svg{position:absolute;top:13px;left:5px}.formWa .formWaBody .form .input i{position:absolute;top:5px;left:7px;width:20px;height:20px;font-size:20px;color:rgba(0,0,0,.2)}.formWa .formWaBody .form .dropdown:after{content:'\f3d0';font-family:IonIcons;display:inline-block;float:right;vertical-align:middle;color:#666;margin:0 5px;position:absolute;top:12px;right:7px;font-weight:700}.formWa .formWaBody .form button[type=submit]{width:100%;color:#fff;font-weight:700;text-transform:uppercase;font-family:inherit;font-size:16px;line-height:45px;height:45px;letter-spacing:1px}.formWa .formWaBody .form button[type=submit] i{vertical-align:middle;font-size:25px}.formWa .formWaBody .form .loader{position:absolute;width:calc(100% - 40px);height:143px;bottom:18px;left:20px;background:rgba(0,0,0,.5);text-align:center;vertical-align:middle;line-height:143px;color:#fff;font-size:20px;border-radius:3px;z-index:1}.formWa .formWaBody .cart-empty{height:200px;display:none;align-items:center;justify-content:center;flex-wrap:wrap;flex-direction:row;padding-bottom:50px}.formWa .formWaBody .cart-empty .cart-empty-inner{flex:1;max-width:100%;min-width:100%;text-align:center}.formWa .formWaBody .cart-empty .cart-empty-inner p{font-size:16px}.formWa .formWaBody .cart-empty .cart-empty-inner p a{color:#fff;font-weight:700;padding:10px 20px;border-radius:5px}.formWa .formWaBody .cart-empty .cart-empty-inner p a:hover{text-decoration:none}.formWa .formWaBody .cart-add{height:auto;display:block;padding:10px 0}.formWa .formWaBody .cart-add .cart-add-inner{width:100%;text-align:center}.formWa .formWaBody .cart-add .cart-add-inner p{font-size:16px}.formWa .formWaBody .cart-add .cart-add-inner p a{color:#fff;font-weight:700;padding:10px 20px;border-radius:5px;display:inline-block;width:calc(50% - 10px);cursor:pointer}.formWa .formWaBody .cart-add .cart-add-inner p a.order-again-background{background:#fa591d radial-gradient(circle,transparent 1%,#fa591d 1%) center/15000%}.formWa .formWaBody .cart-add .cart-add-inner p a:hover{text-decoration:none}.footer{height:auto}.footer .copyright{height:50px;line-height:50px;font-size:14px;font-weight:700;color:#fff}.contactwa{position:fixed;height:35px;border-radius:25px;width:200px;bottom:10px;right:10px;cursor:pointer;z-index:99990}.contactwa .inner{position:relative;width:100%;height:100%;color:#fff;line-height:35px;font-weight:700;font-size:16px;padding-left:20px;border-radius:25px}.contactwa .inner .iconwa{position:absolute;top:0;right:0;width:40px;height:35px;border-radius:0 25px 25px 0;text-align:center;padding-top:5px}.contactwa .inner .iconwa i{color:#fff;font-size:25px;line-height:23px}::selection{background:#04a4cc;color:#fff;text-shadow:none}::-webkit-selection{background:#04a4cc;color:#fff;text-shadow:none}::-moz-selection{background:#04a4cc;color:#fff;text-shadow:none}
  </style>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-M7TSXT8');</script>
  <!-- End Google Tag Manager -->
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M7TSXT8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo">
        <a href="<?= base_url()?>"><img src="<?= base_url()?>assets/img/<?= $setting['logo']?>"> <?= $setting['nama_website']?></a>
      </h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
          <li><a class="nav-link scrollto" href="#pricing">Harga</a></li>
          <li><a class="nav-link scrollto" href="<?= base_url()?>patner">Patner</a></li>
          <li><a class="getstarted scrollto" href="<?= $setting['link_cloud']?>/user/register">Coba Gratis <?= $setting['gratis_langganan']?> Hari</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-2 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Program Kasir Untuk Bisnis Kamu</h1>
          <ul>
            <li><i class="ri-check-line"></i> Mudah digunakan</li>
            <li><i class="ri-check-line"></i> Mengelola Penjualan Pembelian kamu menjadi lebih mudah</li>
            <li><i class="ri-check-line"></i> Manajemen Gudang</li>
            <li><i class="ri-check-line"></i> Manajemen Proyek</li>
            <li><i class="ri-check-line"></i> Manajemen Karyawan</li>
            <li><i class="ri-check-line"></i> Laporan Yang Lengkap</li>
          </ul>
          <div class="mt-3">
            <a href="<?= $setting['link_cloud']?>" class="btn-get-started scrollto">Mulai</a>
            <a href="<?= $setting['link_cloud']?>/user/register" class="btn-get-quote">Coba Gratis <?= $setting['gratis_langganan']?> Hari</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="assets/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row content">
          <div class="col-lg-6">
            <h2>Hi !, Perkenalkan Tentang <?= $setting['nama_website']?></h2>
            <h3><?= $setting['nama_website']?> adalah Aplikasi yang digunakan untuk penjualan, dengan program yang lengkap untuk membantu mempermudah menjalankan proses bisnis  </h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
            <?= $setting['nama_website']?> menawarkan pengalaman menarik untuk anda, <br/>
              dengan harga yang terjangkau dan fitur program yang lengkap anda akan merasakan pengalaman yang luar biasa,
              Service yang kami tawarkan dan layanan yang tersedia di dalamnya diantaranya :
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Menu yang terus update memenuhi kebutuhan bisnis anda</li>
              <li><i class="ri-check-double-line"></i> Support yang bersedia membantu pertanyaan anda</li>
              <li><i class="ri-check-double-line"></i> Tanpa ada batasan input produk</li>
            </ul>
            <p class="fst-italic">
              Berkembang bersama bersama adalah tujuan yang ingin <?= $setting['nama_website']?> capai bersama anda, segera bergabung bersama <?= $setting['nama_website']?> dan rasakan pengalaman yang luar biasa !
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">

          <div class="col-lg-4">
            <div class="box">
              <span>01</span>
              <h4>Daftar Gratis <?= $setting['gratis_langganan']?> hari</h4>
              <p>Segera gabung dan langsung mendapatkan gratis <?= $setting['gratis_langganan']?> hari akses program</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>02</span>
              <h4>Menu yang lengkap</h4>
              <p>Segera Menikmati Kemudahan pencatatan dan akses data dimanapun dan kapanpun</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>03</span>
              <h4> Laporan yang lengkap</h4>
              <p>Laporan Transaksi yang lengkap dan bisa di export excel</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?= count($pelanggan)?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Total Pelanggan</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="bi bi-journal-richtext"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?= count($pelanggan_baru)?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Pelanggan Baru Bulan Ini</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-headset"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?= count($suport)?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Support yang membantu</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?= count($patner)?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Patner</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Layanan</h2>
          <p>Berikut fitur yang tersedia <br/>
          </p>
        </div>

        <div class="row">
          <div class="content col-xl-5 d-flex flex-column justify-content-center">
            <img src="assets/img/services.png" class="img-fluid" alt="">
          </div>
          <div class="col-xl-7">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-lg-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon-box iconbox-blue">
                    <div class="icon">
                      <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                      </svg>
                      <i class="bx bxl-dribbble"></i>
                    </div>
                    <h4><a href="">Produk</a></h4>
                    <p>Produk yang di input tidak ada batasan</p>
                  </div>
                </div>

                <div class="col-lg-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="200">
                  <div class="icon-box iconbox-orange ">
                    <div class="icon">
                      <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
                      </svg>
                      <i class="bx bx-file"></i>
                    </div>
                    <h4><a href="">Stok Pergudang</a></h4>
                    <p>Stok pergudang dan bisa transfer stok antar gudang</p>
                  </div>
                </div>

                <div class="col-lg-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                  <div class="icon-box iconbox-pink">
                    <div class="icon">
                      <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781"></path>
                      </svg>
                      <i class="bx bx-tachometer"></i>
                    </div>
                    <h4><a href="">Kecepatan Diakses</a></h4>
                    <p>Program yang cepat untuk diakses dimanapun dan kapanpun</p>
                  </div>
                </div>

                <div class="col-lg-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon-box iconbox-teal">
                    <div class="icon">
                      <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,503.46388370962813C374.79870501325706,506.71871716319447,464.8034551963731,527.1746412648533,510.4981551193396,467.86667711651364C555.9287308511215,408.9015244558933,512.6030010748507,327.5744911775523,490.211057578863,256.5855673507754C471.097692560561,195.9906835881958,447.69079081568157,138.11976852964426,395.19560036434837,102.3242989838813C329.3053358748298,57.3949838291264,248.02791733380457,8.279543830951368,175.87071277845988,42.242879143198664C103.41431057327972,76.34704239035025,93.79494320519305,170.9812938413882,81.28167332365135,250.07896920659033C70.17666984294237,320.27484674793965,64.84698225790005,396.69656628748305,111.28512138212992,450.4950937839243C156.20124167950087,502.5303643271138,231.32542653798444,500.4755392045468,300,503.46388370962813"></path>
                      </svg>
                      <i class="bx bx-layer"></i>
                    </div>
                    <h4><a href="">Laporan yang lengkap</a></h4>
                    <p>Laporan yang lengkap persediaan, laporan pergudang sampai dengan laporan accounting</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container">

        <div class="row">
          <div class="col-lg-3 col-md-4">
            <div class="icon-box">
              <i class="ri-store-line" style="color: #ffbb2c;"></i>
              <h3><a href="">Multi Cabang</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
              <h3><a href="">Grafik Penjualan</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
              <h3><a href="">Jadwal Karyawan</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
            <div class="icon-box">
              <i class="ri-paint-brush-line" style="color: #e361ff;"></i>
              <h3><a href="">Gambar Produk</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-database-2-line" style="color: #47aeff;"></i>
              <h3><a href="">Manajemen Project</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
              <h3><a href="">Setting COA</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
              <h3><a href="">Laporan Persediaan</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-price-tag-2-line" style="color: #4233ff;"></i>
              <h3><a href="">Multi Gudang</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-anchor-line" style="color: #b2904f;"></i>
              <h3><a href="">Transfer Gudang</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-disc-line" style="color: #b20969;"></i>
              <h3><a href="">Retur Barang</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-base-station-line" style="color: #ff5828;"></i>
              <h3><a href="">HRM</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-fingerprint-line" style="color: #29cc61;"></i>
              <h3><a href="">Presensi Karyawan</a></h3>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">Transaksi</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Dashboard</h4>
                <p>Dashboard</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Dashboard"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Master Klien</h4>
                <p>Master Klien</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Master Klien"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Transaksi Pembelian</h4>
                <p>Transaksi Pembelian</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Transaksi Pembelian"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Tiket Dukungan</h4>
                <p>Tiket Dukungan</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Tiket Dukungan"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title">
          <h2>Harga</h2>
          <p></p>
        </div>

        <div class="row no-gutters">

          <div class="col-lg-4 box">
            <h3>Free</h3>
            <h4>Rp. 0<span>Selama <?= $setting['gratis_langganan']?> Hari</span></h4>
            <ul>
              <li><i class="bx bx-check"></i> Penjualan</li>
              <li><i class="bx bx-check"></i> Pembelian</li>
              <li><i class="bx bx-check"></i> Transfer Gudang</li>
              <li><i class="bx bx-check"></i> Retur Pembelian</li>
              <li><i class="bx bx-check"></i> POS</li>
              <li><i class="bx bx-check"></i> HRM</li>
              <li><i class="bx bx-check"></i> Accounting</li>
            </ul>
            <a href="<?= $setting['link_cloud']?>/user/register" class="btn-buy">Mulai</a>
          </div>

          <div class="col-lg-4 box featured">
            <h3><?= $langgananadmin[1]['nama_langganan'] ?></h3>
            <h4>Rp <?= number_format($langgananadmin[1]['harga_langganan']) ?><span>per bulan</span></h4>
            <ul>
                <li><i class="bx bx-check"></i> Penjualan</li>
                <li><i class="bx bx-check"></i> Pembelian</li>
                <li><i class="bx bx-check"></i> Transfer Gudang</li>
                <li><i class="bx bx-check"></i> Retur Pembelian</li>
                <li><i class="bx bx-check"></i> POS</li>
                <li><i class="bx bx-check"></i> HRM</li>
                <li class="na"><i class="bx bx-x"></i> <span> Accounting</span></li>
            </ul>
            <a href="<?= $setting['link_cloud']?>/langganan" class="btn-buy">Mulai</a>
          </div>

          <div class="col-lg-4 box">
            <h3><?= $langgananadmin[2]['nama_langganan'] ?></h3>
            <h4><?= number_format($langgananadmin[2]['harga_langganan']) ?><span>per bulan</span></h4>
            <ul>
                <li><i class="bx bx-check"></i> Penjualan</li>
                <li><i class="bx bx-check"></i> Pembelian</li>
                <li><i class="bx bx-check"></i> Transfer Gudang</li>
                <li><i class="bx bx-check"></i> Retur Pembelian</li>
                <li><i class="bx bx-check"></i> POS</li>
                <li><i class="bx bx-check"></i> HRM</li>
                <li><i class="bx bx-check"></i> Accounting</li>
            </ul>
            <a href="<?= $setting['link_cloud']?>/langganan" class="btn-buy">Mulai</a>
          </div>

        </div>

      </div>
    </section>
    <!-- End Pricing Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p></p>
        </div>

        <div class="row">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Alamat</h3>
                  <p><?= $setting['alamat']?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p><?= $setting['email']?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p><?= $setting['no_telp']?></p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Te-Pos</h3>
            <p>
              <?= $setting['alamat']?><br>
              <strong>Phone:</strong> <?= $setting['no_telp']?><br>
              <strong>Email:</strong> <?= $setting['email']?><br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Subscrabe untuk mendapat notifikasi terbaru</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="contactwa" onclick="openHelpWA();">
            <div class="inner color-scheme-background" style="background:#ff9800;border-color:#ff9800;margin-top:-60px;">
                Butuh Bantuan ?
                <div class="iconwa color-scheme-background" style="background:#ff9800;border-color:#ff9800;" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"  fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16" style="margin-top:-15px">
                    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="formWaBox" id="helpViaWa">
        <div class="formWa" id="formHelpWA">
            <div class="formWaBody" id="formHelpWABody">
                <div class="heading clear">
                    <i class="icon ion-logo-whatsapp" style="color: #61ddbb"></i>
                    <h3><b>Form</b> Bantuan Whatsapp!</h3>
                    <div class="close" onclick="closeHelpWA();">Ã—</div>
                </div>
                <form class="form" method="post" enctype="multipart/form-data" onsubmit="helpWA(this); return false;">
                    <table>
                        <tr>
                            <td>
                                <div class="input">
                                    <input type="text" name="full_name" placeholder="Nama Lengkap" required oninvalid="this.setCustomValidity('Input Nama Lengkap Anda')" oninput="this.setCustomValidity('')">
                                </div>
                            </td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>
                                <div class="input">
                                    <textarea name="message" placeholder="Pesan Anda"></textarea>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>
                                <button class="btn btn-primary" type="submit">
                                    Kirim
                                </button>
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" name="destination" value="<?= $setting['no_telp']?>">
                    <input type="hidden" name="gretings" value="Halo <?= $setting['nama_website'] ?> Saya Mau Tanya">
                </form>
            </div>
        </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span><?= $setting['nama_website']?></span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="<?= $setting['link_website']?>"><?= $setting['domain_website']?></a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
     function openHelpWA(tujuan = false){
            let form = document.getElementById('helpViaWa');

            if( tujuan ){
                form.querySelector('[name=destination]').value = tujuan;
            }
            form.classList.add('open');

            let formwa = form.querySelector('#formHelpWA');
            let formwabody = form.querySelector('#formHelpWABody');
            let formbodyheight = formwa.offsetHeight - 60;

            if( formwabody.offsetHeight < formbodyheight ){
                formwa.style.height = 'auto';
            }
        }

        function closeHelpWA(){
            let form = document.getElementById('helpViaWa');
            form.classList.remove('open');
        }

        function helpWA(ini){
            let formData = ini.elements,
            inputs = {},
            wa = 'https://web.whatsapp.com/send',
            ajax = new XMLHttpRequest();

            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                wa = 'whatsapp://send';
            }

            for (let i = 0; i < formData.length; i++) {
                let key = formData[i].name;
                if( key !== '' ){
                    inputs[key] = formData[i].value;
                }
            }

            let message = inputs.message.replace(/\n/g, '%0A');

            let url = wa + '?phone=' + inputs.destination + '&text=' + inputs.gretings + '.%0A' + 'Saya *' + inputs.full_name + '*%0A%0A ' + 'ðŸ’¬ ' + message + '%0A%0A ' + 'Via ' + location.href;


            let w = 960,h = 540,left = Number((screen.width / 2) - (w / 2)),top = Number((screen.height / 2) - (h / 2)),popupWindow = window.open(url, '', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=1, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

            popupWindow.focus();
            let form = document.getElementById('helpViaWa');
            form.classList.remove('open');
            return false;
        }
  </script>
</body>

</html>