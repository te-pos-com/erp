<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Selamat Datang | <?= $setting['nama_website']?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url() ?>assets/img/<?= $setting['favicon']?>" rel="icon">
  <link href="<?= base_url() ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
</head>

<body>

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
          <li><a class="nav-link scrollto" href="#services">Layanan</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Fitur</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#pricing">Harga</a></li>
          <li><a class="nav-link scrollto" href="<?= base_url()?>patner">Patner</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
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
          <h1>Program Penjualan Untuk Bisnis Kamu</h1>
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
              <li data-filter=".filter-card">HRM</li>
              <li data-filter=".filter-web">CRM</li>
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

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Master Karyawan</h4>
                <p>Master Karyawan</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Master Karyawan"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Master Dukungan</h4>
                <p>Master Dukungan</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Master Dukungan"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Transaksi Penjualan</h4>
                <p>Transaksi Penjualan</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Transaksi Penjualan"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Master Departemen</h4>
                <p>Master Departemen</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Master Departemen"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Master Gaji</h4>
                <p>Master Gaji</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Master Gaji"><i class="bx bx-plus"></i></a>
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

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Team</h2>
        </div>

        <div class="row" style="margin-left:33%">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/team-1.jpeg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Priyo Subarkah</h4>
                <span>Founder</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Fredi S.Kom.</h4>
                <span>Co-Founder</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

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
              <li><i class="bx bx-check"></i> CRM</li>
              <li><i class="bx bx-check"></i> HRM</li>
              <li><i class="bx bx-check"></i> Manajement Project</li>
              <li><i class="bx bx-check"></i> Accounting</li>
            </ul>
            <a href="<?= $setting['link_cloud']?>/user/register" class="btn-buy">Get Started</a>
          </div>

          <div class="col-lg-4 box featured">
            <h3>Personal</h3>
            <h4>Rp 250.000<span>per bulan</span></h4>
            <ul>
                <li><i class="bx bx-check"></i> Penjualan</li>
                <li><i class="bx bx-check"></i> Pembelian</li>
                <li><i class="bx bx-check"></i> Transfer Gudang</li>
                <li><i class="bx bx-check"></i> Retur Pembelian</li>
                <li><i class="bx bx-check"></i> POS</li>
                <li><i class="bx bx-check"></i> HRM</li>
                <li class="na"><i class="bx bx-x"></i> <span> CRM</span></li>
                <li class="na"><i class="bx bx-x"></i> <span> Manajement Project</span></li>
                <li class="na"><i class="bx bx-x"></i> <span> Accounting</span></li>
            </ul>
            <a href="<?= $setting['link_cloud']?>/langganan" class="btn-buy">Get Started</a>
          </div>

          <div class="col-lg-4 box">
            <h3>Business</h3>
            <h4>Rp 350.000<span>per bulan</span></h4>
            <ul>
                <li><i class="bx bx-check"></i> Penjualan</li>
                <li><i class="bx bx-check"></i> Pembelian</li>
                <li><i class="bx bx-check"></i> Transfer Gudang</li>
                <li><i class="bx bx-check"></i> Retur Pembelian</li>
                <li><i class="bx bx-check"></i> POS</li>
                <li><i class="bx bx-check"></i> HRM</li>
                <li><i class="bx bx-check"></i> CRM</li>
                <li><i class="bx bx-check"></i> Manajement Project</li>
                <li><i class="bx bx-check"></i> Accounting</li>
            </ul>
            <a href="<?= $setting['link_cloud']?>/langganan" class="btn-buy">Get Started</a>
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

</body>

</html>