<div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url(); ?>assets/swal.js"></script>
    <!-- jquery
		============================================ -->
    <script src="<?= base_url(); ?>assets/dashboard/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/dashboard/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/dashboard/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/dashboard/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/dashboard/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/dashboard/js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/dashboard/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/dashboard/js/jquery.scrollUp.min.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/dashboard/js/counterup/jquery.counterup.min.js"></script>
    <script src="<?= base_url(); ?>assets/dashboard/js/counterup/waypoints.min.js"></script>
    <script src="<?= base_url(); ?>assets/dashboard/js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/dashboard/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?= base_url(); ?>assets/dashboard/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/dashboard/js/metisMenu/metisMenu.min.js"></script>
    <script src="<?= base_url(); ?>assets/dashboard/js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/dashboard/js/morrisjs/raphael-min.js"></script>
    <script src="<?= base_url(); ?>assets/dashboard/js/morrisjs/morris.js"></script>
    <script src="<?= base_url(); ?>assets/dashboard/js/morrisjs/morris-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/dashboard/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?= base_url(); ?>assets/dashboard/js/sparkline/jquery.charts-sparkline.js"></script>
    <script src="<?= base_url(); ?>assets/dashboard/js/sparkline/sparkline-active.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/dashboard/js/calendar/moment.min.js"></script>
    <script src="<?= base_url(); ?>assets/dashboard/js/calendar/fullcalendar.min.js"></script>
    <script src="<?= base_url(); ?>assets/dashboard/js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/dashboard/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/dashboard/js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
    <!-- <script src="<?= base_url(); ?>assets/dashboard/js/tawk-chat.js"></script> -->
    <script src="<?= base_url(); ?>assets/dashboard/js/metisMenu/metisMenu-active.js"></script>
    <!-- data table JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/dashboard/js/data-table/bootstrap-table.js"></script>
    <script src="<?= base_url(); ?>assets/dashboard/js/data-table/tableExport.js"></script>
    <script src="<?= base_url(); ?>assets/dashboard/js/data-table/data-table-active.js"></script>
    <script src="<?= base_url(); ?>assets/dashboard/js/data-table/bootstrap-table-editable.js"></script>
    <script src="<?= base_url(); ?>assets/dashboard/js/data-table/bootstrap-editable.js"></script>
    <script src="<?= base_url(); ?>assets/dashboard/js/data-table/bootstrap-table-resizable.js"></script>
    <script src="<?= base_url(); ?>assets/dashboard/js/data-table/colResizable-1.5.source.js"></script>
    <script src="<?= base_url(); ?>assets/dashboard/js/data-table/bootstrap-table-export.js"></script>
    <script>
    
    var alert = document.getElementById("alert"); 

      if(alert !=null){
        var status = document.getElementById("status").innerHTML;
        var message = document.getElementById("message").innerHTML;
        var mtitle = document.getElementById("title").innerHTML;
          swal({
            title: mtitle,
            text: message,
            icon: status,
          });
       }
    </script>
    <script>
      function insertMerk(){
          document.getElementById("form").action = "http://localhost/sisinfoperalatantambang/dashboard/insertMerk/";
          document.getElementById("id").readOnly = true;
          document.getElementById("header").innerHTML = "Tambah Data Merk";
          document.getElementById("nama").value = "";
          document.getElementById("nilai").value = "";
          document.getElementById("id").value = "KTG-" + <?= mt_rand(10000,99999); ?>;
      }

      function updateMerk(id,nama,nilai){
          document.getElementById("form").action = "http://localhost/sisinfoperalatantambang/dashboard/updateMerk/";
          document.getElementById("id").readOnly = true;
          document.getElementById("header").innerHTML = "Ubah Data Merk";
          document.getElementById("id").value = id;
          document.getElementById("nama").value= nama;
          document.getElementById("nilai").value= nilai;
      }

      function deleteMerk(id){
        document.getElementById("delete").href = "http://localhost/sisinfoperalatantambang/dashboard/deleteMerk/" + id;
      }

      //category

      function insertCategory(){
          document.getElementById("form").action = "http://localhost/sisinfoperalatantambang/dashboard/insertCategoryProduct/";
          document.getElementById("id").readOnly = true;
          document.getElementById("header").innerHTML = "Tambah Data Kategori";
          document.getElementById("nama").value = "";
          document.getElementById("nilai").value = "";
          document.getElementById("id").value = "KTG-" + <?= mt_rand(10000,99999); ?>;
      }

      function updateCategory(id,nama,nilai){
          document.getElementById("form").action = "http://localhost/sisinfoperalatantambang/dashboard/updateCategory/";
          document.getElementById("id").readOnly = true;
          document.getElementById("header").innerHTML = "Ubah Data Kategori";
          document.getElementById("id").value = id;
          document.getElementById("nama").value= nama;
          document.getElementById("nilai").value= nilai;
        
      }

      function deleteCategory(id){
        document.getElementById("delete").href = "http://localhost/sisinfoperalatantambang/dashboard/deleteCategory/" + id;
      }


      //tujuan

      function insertTujuan(){
        document.getElementById("form").action = "http://localhost/sisinfoperalatantambang/dashboard/insertTujuanProduct/";
        document.getElementById("id").readOnly = true;
        document.getElementById("header").innerHTML = "Tambah Data Tujuan";
        document.getElementById("nama").value = "";
        document.getElementById("nilai").value = "";
        document.getElementById("id").value = "TJ-" + <?= mt_rand(10000,99999); ?>;
      }

      function updateTujuan(id,nama,nilai){
        document.getElementById("form").action = "http://localhost/sisinfoperalatantambang/dashboard/updateTujuan/";
        document.getElementById("id").readOnly = true;
        document.getElementById("header").innerHTML = "Ubah Data Tujuan";
        document.getElementById("id").value = id;
        document.getElementById("nama").value= nama;
        document.getElementById("nilai").value= nilai;
      }

      function deleteTujuan(id){
        document.getElementById("delete").href = "http://localhost/sisinfoperalatantambang/dashboard/deleteTujuan/" + id;
      }

      //kualitas

      function insertKualitas(){
        document.getElementById("form").action = "http://localhost/sisinfoperalatantambang/dashboard/insertKualitasProduct/";
        document.getElementById("id").readOnly = true;
        document.getElementById("header").innerHTML = "Tambah Data Kualitas";
        document.getElementById("nama").value = "";
        document.getElementById("nilai").value = "";
        document.getElementById("id").value = "KLL-" + <?= mt_rand(10000,99999); ?>;
      }

      function updateKualitas(id,nama,nilai){
        document.getElementById("form").action = "http://localhost/sisinfoperalatantambang/dashboard/updateKualitas/";
        document.getElementById("id").readOnly = true;
        document.getElementById("header").innerHTML = "Ubah Data Kualitas";
        document.getElementById("id").value = id;
        document.getElementById("nama").value= nama;
        document.getElementById("nilai").value= nilai;
      }

      function deleteKualitas(id){
        document.getElementById("delete").href = "http://localhost/sisinfoperalatantambang/dashboard/deleteKualitas/" + id;
      }

      //product
      function insertProduct(){
        document.getElementById("form").action = "http://localhost/sisinfoperalatantambang/dashboard/insertProduct/";
        document.getElementById("id").readOnly = true;
        document.getElementById("header").innerHTML = "Tambah Data Product";
        document.getElementById("id").value = "PRO-" + <?= mt_rand(10000,99999); ?>;
      }

      function updateProduct(id){
        document.getElementById("form").action = "http://localhost/sisinfoperalatantambang/dashboard/updateProduct/";;
        document.getElementById("header").innerHTML = "Update Data Product";
        document.getElementById("id").value = id;
      }

      function deleteProduct(id){
        document.getElementById("delete").href = "http://localhost/sisinfoperalatantambang/dashboard/deleteProduct/" + id;
      }

      //Rental

      function confirmRental(id){
        document.getElementById("delete").href = "http://localhost/sisinfoperalatantambang/dashboard/confirmRental/" + id;
        document.getElementById("header").innerHTML = "KONFIRMASI PESANAN";
        document.getElementById("modal_message").innerHTML = "Anda yakin ingin Mengkonfirmasi Pesanan ?";
      }

      function deleteRental(id){
        document.getElementById("delete").href = "http://localhost/sisinfoperalatantambang/dashboard/deleteRental/" + id;
        document.getElementById("header").innerHTML = "HAPUS PESANAN";
        document.getElementById("modal_message").innerHTML = "Anda yakin ingin Menghapus Pesanan ?";
      }

      function insertPelunasan(id,biaya,dp){
        document.getElementById("form").action = "http://localhost/sisinfoperalatantambang/dashboard/insertPelunasan/";
        var total = biaya-dp;
        document.getElementById("tagihan").value = total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
        document.getElementById("JumlahTagihan").value = total;
        document.getElementById("idSewa").value = id;
        document.getElementById("header_message").innerHTML = "Pelunasan ";
       
        document.getElementById("labelTagihan").innerHTML = "Sisa Tagihan ";
    }
    function insertPembayaran(id,dp){
        document.getElementById("form").action = "http://localhost/sisinfoperalatantambang/dashboard/insertPembayaran/";
        document.getElementById("tagihan").value = dp.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
        document.getElementById("JumlahTagihan").value = dp;
        document.getElementById("idSewa").value = id;
        document.getElementById("header_message").innerHTML = "Pembayaran DP";
        document.getElementById("labelTagihan").innerHTML = "Jumlah DP";
        console.log(id);
    }
    </script>
 
    <script>
      var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

      Morris.Line({
        element: 'extra-area-chart',
        data: [
                { m: '01', a: 0, b: 270 },
                { m: '02', a: 54, b: 256 },
                { m: '03', a: 243, b: 334 },
                { m: '04', a: 206, b: 282 },
                { m: '05', a: 161, b: 58 },
                { m: '06', a: 187, b: 0 },
                { m: '07', a: 210, b: 0 },
                { m: '08', a: 204, b: 0 },
                { m: '09', a: 224, b: 0 },
                { m: '10', a: 301, b: 0 },
                { m: '11', a: 262, b: 0 },
                { m: '12', a: 199, b: 0 },
              ],
        xkey: 'm',
        ykeys: ['a', 'b'],
        lineColors: ['#8af542'],
        labels: ['2014', '2015'],
        xLabelFormat: function (x) { return months[x.getMonth()]; }
      });
    </script>
    <script>
      $("#datepicker").datepicker( {
        format: " yyyy", // Notice the Extra space at the beginning
        viewMode: "years", 
        minViewMode: "years"
    });
   
  </body>

</html>