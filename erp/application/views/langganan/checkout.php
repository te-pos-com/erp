<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-NYSdONI-h1O0yRMK"></script>
    <div class="content-body">
     <!-- ======= Pricing Section ======= -->
     <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title">
          <h2>Checkout Langganan</h2>
          <p></p>
        </div>

      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="col-md-8 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <form class="card-body" action="<?=site_url()?>/snap/finish">

              <!--Username-->
              <div class="md-form input-group pl-0 mb-5">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="text" class="form-control py-0" placeholder="Username" aria-describedby="basic-addon1">
              </div>

              <!--email-->
              <div class="md-form mb-5">
                <label for="email" class="">Email</label>
                <input type="text" id="email" class="form-control" placeholder="youremail@example.com">
              </div>

              <!--address-->
              <div class="md-form mb-5">
                <label for="address" class="">Alamat</label>  
                <input type="text" id="address" class="form-control" placeholder="1234 Main St">
              </div>
               
              <div class="md-form mb-5">
                  <label for="state">Periode Langganan</label>
                  <select class="custom-select d-block w-100" id="state" required>
                    <option value="">Pilih...</option>
                    <option value="6" selected >6 Bulan</option>
                    <option value="12">12 Bulan (1 Tahun)</option>
                    <option value="24">24 Bulan (2 Tahun)</option>
                    <option value="36">36 Bulan (3 Tahun)</option>
                  </select>
                  <div class="invalid-feedback">
                    Please provide a valid state.
                  </div>
              </div>

              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" id="pay-button">Bayar</button>

            </form>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 mb-4">
          <!-- Cart -->
          <ul class="list-group mb-3 z-depth-1">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"><?= $langganan['nama_langganan']?></h6>
                <small class="text-muted">Paket <?= $langganan['nama_langganan']?> selama <span id="lama">6</span> Bulan</small>
              </div>
              <?php if ($langganan['id']!=4){
              ?>
                <span class="text-muted">Rp <?= number_format(6*$langganan['harga_langganan'])?></span>
              <?php 
                }
              else{?>
                <span class="text-muted"><?= number_format($langganan['harga_langganan'])?></span>
              <?php }?>
            </li>
            
            <li class="list-group-item d-flex justify-content-between">
              <span>Total </span>
              <?php if ($langganan['id']!=4){
              ?>
                <strong>Rp <?= number_format(6*$langganan['harga_langganan'])?></strong>
              <?php 
                }
              else{?>
                <span class="text-muted">Rp <?= number_format($langganan['harga_langganan'])?></span>
              <?php }?>  
            </li>
          </ul>
          <!-- Cart -->

          <!-- Promo code -->
          <!--
          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-secondary btn-md waves-effect m-0" type="button">Redeem</button>
              </div>
            </div>
          </form>
          -->
          <!-- Promo code -->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      </div>
    </section><!-- End Pricing Section -->

    <script type="text/javascript">
        $(document).ready(function() {
            load();
            totallangganan();
            $('#langganan').change(function () {
                load();
            });
            $('#durasi_langganan').change(function () {
                totallangganan();
            });

            function load() {
                var pilihan = $("#langganan").children("option:selected").val();
                if(pilihan=="MEDIUM"){
                    $("#keterangan").html('1. Transaksi Pembelian & Penjualan<br/>2. Laporan Persediaan Barang<br/>3. Laporan Laba/Rugi<br/>4. Laporan Penjualan Harian Ke E-mail<br/>5. Notifikasi Minimal Stok Ke E-mail<br/><br/><h2><b>Rp 150.000 /Bulan</b></h2>');
                }
                else if(pilihan=="BUSINESS"){
                    $('#keterangan').html('1. Transaksi Pembelian & Penjualan<br/>2. Laporan Persediaan Barang<br/>3. Laporan Laba/Rugi<br/>4. Laporan Penjualan Harian Ke E-mail<br/>5. Notifikasi Minimal Stok Ke E-mail<br/>6. Laporan GL<br/>7. Laporan Buku Besar<br/>8. Laporan Kas Harian<br/>9. Laporan Neraca<br/><br/><h2><b>Rp 300.000 /Bulan</b></h2>');
                }
                totallangganan();
            }

            function totallangganan() {
                var pilihan = $("#langganan").children("option:selected").val();
                var bulan  = $("#durasi_langganan").children("option:selected").val();
                if(pilihan=="MEDIUM"){
                    var total = 150000*bulan;
                    $("#totallangganan").html('<h2><b>TOTAL : Rp '+ number_format(total) +' /Bulan</b></h2>');
                }
                else if(pilihan=="BUSINESS"){
                    console.log(bulan);
                    var total = 300000*bulan;
                    $('#totallangganan').html('<h2><b>TOTAL : Rp '+ number_format(total) +' /Bulan</b></h2>');
                }
                console.log(pilihan);
            }

            function number_format (number, decimals, dec_point, thousands_sep) {
                // Strip all characters but numerical ones.
                number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
                var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    s = '',
                    toFixedFix = function (n, prec) {
                        var k = Math.pow(10, prec);
                        return '' + Math.round(n * k) / k;
                    };
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }
                return s.join(dec);
            }

        });
    </script>
    
    <script type="text/javascript">
                    
    $('#pay-button').click(function (event) {
      event.preventDefault();
      //$(this).attr("disabled", "disabled");

    var pilihan = $("#langganan").children("option:selected").val();
    var bulan  = $("#durasi_langganan").children("option:selected").val();
    if(pilihan=="MEDIUM"){
        var total = 150000*bulan;
    }
    else if(pilihan=="BUSINESS"){
        var total = 300000*bulan;
    }

    var datapaket = {
        nominal: total,
        paket: pilihan,
    };
    
    console.log(datapaket);
    $.ajax({
      type: "POST",
      url: '<?=site_url()?>/langganan/token',
      cache: false,
      data: datapaket,
      success: function(data) {
        //location = data;
        console.log('token = '+data);
        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
        }

        snap.pay(data, {
          
          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });

  </script>