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
              <!--username-->
              <div class="md-form mb-5">
                <label for="email" class="">Username</label>
                <input type="text" id="username" class="form-control" value="<?= $this->aauth->get_user()->username?>" placeholder="youremail@example.com" disabled>
              </div>

              <!--email-->
              <div class="md-form mb-5">
                <label for="email" class="">Email</label>
                <input type="text" id="email" class="form-control" placeholder="youremail@example.com" value="<?=$this->aauth->get_user()->email?>" disabled>
              </div>

              
              <!--phone-->
              <div class="md-form mb-5">
                <label for="email" class="">Phone</label>
                <input type="text" id="phone" class="form-control" placeholder="+62xxxx" value="<?=$this->aauth->get_user()->phone?>" disabled>
              </div>

              <!--alamat-->
              <div class="md-form mb-5">
                <label for="email" class="">Alamat</label>
                <textarea id="alamat" class="form-control"></textarea>
              </div>
              <?php if ($langganan['id']!=4){
              ?>
              <div class="md-form mb-5">
                  <label for="state">Periode Langganan</label>
                  <select class="custom-select d-block w-100" id="durasi_langganan" required>
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
              <?php }?>
              <input type="hidden" value=<?= $langganan['harga_langganan'] ?> id="value_bayar">
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
             <?php if ($langganan['id']!=4){
             ?>  
                <div>
                  <h6 class="my-0"><?= $langganan['nama_langganan']?></h6>
                  <small class="text-muted">Paket <?= $langganan['nama_langganan']?> selama <span id="lama">6</span> Bulan</small>
                </div>
                <span class="text-muted"> <?= number_format($langganan['harga_langganan'])?></span>
              <?php 
                }
              else{?>
                <div>
                  <h6 class="my-0"><?= $langganan['nama_langganan']?></h6>
                  <small class="text-muted">Paket <?= $langganan['nama_langganan']?></small>
                </div>
                <span class="text-muted"><?= number_format($langganan['harga_langganan'])?></span>
              <?php }?>
            </li>
            
            <li class="list-group-item d-flex justify-content-between">
              <span>Total </span>
              <?php if ($langganan['id']!=4){
              ?>
                <strong id="total_langganan"> 0</strong>
              <?php 
                }
              else{?>
                <span class="text-muted"> <?= number_format($langganan['harga_langganan'])?></span>
              <?php }?>  
            </li>
          </ul>

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      </div>
    </section><!-- End Pricing Section -->

    <script type="text/javascript">
        $(document).ready(function() {
            <?php if ($langganan['id']!=4){
            ?>
            totallangganan()
            <?php }?>
            $('#durasi_langganan').change(function () {
                totallangganan();
            });

           
            function totallangganan() {
                var bulan  = $("#durasi_langganan").children("option:selected").val();
                var total_langganan = <?= $langganan['harga_langganan']?>*bulan;
                $('#lama').html(bulan);
                $('#total_langganan').html(number_format(total_langganan));
                $('#value_bayar').val(total_langganan)
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
      var datapaket = {
          nominal: $('#value_bayar').val(),
          paket:"<?=$langganan['nama_langganan']?> ",
          nama:$('#username').val(),
          email:$('#email').val(),
          phone:$('#phone').val(),
          alamat:$('#alamat').val(),
          durasi_langganan:$("#durasi_langganan").children("option:selected").val(),
          id_langganan:<?=$langganan['id']?>,
          id_pembayaran:"<?= $idpembayaran ?>"
    };
    
    $.ajax({
      type: "POST",
      url: '<?=site_url()?>/langganan/token',
      cache: false,
      data: datapaket,
      success: function(data) {
        //location = data;    
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