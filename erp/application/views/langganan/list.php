<script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="<CLIENT-KEY>"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<div class="content-body">
     <!-- ======= Pricing Section ======= -->
     <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title">
          <h2>Harga Langganan</h2>
          <p></p>
        </div>

        <div class="row no-gutters">

          <div class="col-lg-4 box">
            <h3><?= $langganan[0]['nama_langganan'] ?></h3>
            <h4>Rp. <?= number_format($langganan[0]['harga_langganan']) ?><span>Per Bulan</span></h4>
            <ul class="text-center">
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
            <a href="<?= base_url()?>langganan/checkout?i=<?= base64_encode($langganan[0]['id']) ?>" class="btn-buy">Langganan</a>
          </div>

          <div class="col-lg-4 box featured">
            <h3><?= $langganan[1]['nama_langganan'] ?></h3>
            <h4>Rp <?= number_format($langganan[1]['harga_langganan']) ?><span>Per Bulan</span></h4>
            <ul class="text-center">
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
            <a href="<?= base_url()?>langganan/checkout?i=<?= base64_encode($langganan[1]['id']) ?>" class="btn-buy">Langganan</a>
          </div>

          <div class="col-lg-4 box">
            <h3><?= $langganan[2]['nama_langganan'] ?></h3>
            <h4>Rp <?= number_format($langganan[2]['harga_langganan']) ?><span>Pembelian Sorce Code</span></h4>
            <ul class="text-center">
                <li><i class="bx bx-check"></i> Free Updatean Program</li>
                <li><i class="bx bx-check"></i> Semua Fitur Lengkap</li>
                <li><i class="bx bx-check"></i> Instalasi Di Server Pribadi</li>
                <li><i class="bx bx-check"></i> Tanpa Langganan Bulanan</li>
                <li><i class="bx bx-check"></i> Satu Pembayaran Untu Selamanya</li>
                <li><i class="bx bx-check"></i> Database Sendiri</li>
                <li><i class="bx bx-check"></i> Tidak ada batasan user</li>
                <li><i class="bx bx-check"></i> Support Tim</li>
                <li><i class="bx bx-check"></i> Free Konsultasi</li>
            </ul>
            <a href="<?= base_url()?>langganan/checkout?i=<?= base64_encode($langganan[2]['id']) ?>" class="btn-buy">Beli Program</a>
          </div>

        </div>

      </div>
    </section><!-- End Pricing Section -->