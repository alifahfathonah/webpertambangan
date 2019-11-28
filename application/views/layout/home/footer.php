<footer class="ftco-footer ftco-section" style="background:#f8a978">
    <div class="container">
        <div class="row">
            <div class="mouse">
                <a href="#" class="mouse-icon">
                    <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="" style="color:#fff " target="_blank">PT NESITOR INDONESIA</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- Modal Login-->
<div id="PrimaryModalhdbgcl" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1" style="background-color:#f8a978;">
                <h4 id="header" class="modal-title" style="color:#fff;font-size:18px">Form Login</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#" style="background-color:#f8a978;"><i class="fa fa-close" style="position:relative;right:7px;bottom:13px;">X</i></a>
                </div>
            </div>
            <div class="modal-body">
                <form action="<?= base_url(); ?>home/login/" method="post">
                    <div class="form-group-inner">
                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Username</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <input id="id" type="text" name="username" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Password</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <input type="password" id="nama" name="password" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url(); ?>register">
                        <p style="margin-top:10px;text-align:right;">tidak punya akun?</p>
                    </a>

            </div>
            <div class="modal-footer">
                <a data-dismiss="modal" href="#" style="color:gray; background-color:#fff;">Batal</a>
                <button class="btn btn-primary" style="background:#f8a978;width:90px;height=50px" id="btnSubmit" name="submit" type="submit" href="#">Proses</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg>
</div>

<script src="<?=base_url(); ?>assets/home/js/jquery.min.js"></script>
<script src="<?=base_url(); ?>assets/home/js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?=base_url(); ?>assets/home/js/popper.min.js"></script>
<script src="<?=base_url(); ?>assets/home/js/bootstrap.min.js"></script>
<script src="<?=base_url(); ?>assets/home/js/jquery.easing.1.3.js"></script>
<script src="<?=base_url(); ?>assets/home/js/jquery.waypoints.min.js"></script>
<script src="<?=base_url(); ?>assets/home/js/jquery.stellar.min.js"></script>
<script src="<?=base_url(); ?>assets/home/js/owl.carousel.min.js"></script>
<script src="<?=base_url(); ?>assets/home/js/jquery.magnific-popup.min.js"></script>
<script src="<?=base_url(); ?>assets/home/js/aos.js"></script>
<script src="<?=base_url(); ?>assets/home/js/jquery.animateNumber.min.js"></script>
<script src="<?=base_url(); ?>assets/home/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url(); ?>assets/home/js/scrollax.min.js"></script>
<script src="<?=base_url(); ?>assets/home/js/main.js"></script>
<script src="<?=base_url(); ?>assets/home/js/modal.js"></script>
<script src="<?= base_url(); ?>assets/swal.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/date-fns/1.29.0/date_fns.min.js"></script>

<script>
    var alert = document.getElementById("alert");
    if (alert != null) {
        var message = document.getElementById("message").innerHTML;
        var icon = document.getElementById("icon").innerHTML;
        var title = document.getElementById("title").innerHTML;
        swal({
            title: title,
            text: message,
            icon: icon,
        });
    }

    function getDayLength(){
        var from = document.getElementById("from").value;
        var to = document.getElementById("to").value;
        var price = document.getElementById("price").value;
        var txtTotal = document.getElementById("total");
        var txtPriceTotal = document.getElementById("price_total");
        var getLengthDay =dateFns.eachDay(new Date(from), new Date(to));
        var total = price * (getLengthDay['length']-1);
        if(total<0){
            txtTotal.textContent = "Rp. 0";
           txtPriceTotal.value = total;
        }else{
        txtTotal.textContent = "Rp. "+total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
       txtPriceTotal.value = total;
        }
    }

    function getRangeDate(from,to){
        var length = dateFns.eachDay(new Date(from), new Date(to));
        document.getElementById("range").innerHTML = length-1;
        console.log(length-1);
    }

    function deleteRental(id){
        document.getElementById("cancel").href = "http://localhost/sisinfoperalatantambang/pages/deleteRental/" + id;
        document.getElementById("header_message").innerHTML = "Batalkan Pesanan";
        document.getElementById("modal_message").innerHTML = "Anda yakin ingin Membatalkan Pesanan ?";
      }

    function insertPembayaran(id,dp){
        document.getElementById("form").action = "http://localhost/sisinfoperalatantambang/pages/insertPembayaran/";
        document.getElementById("dp").value = dp.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
        document.getElementById("jumlahDP").value = dp;
        document.getElementById("idSewa").value = id;
        document.getElementById("header").innerHTML = "Pembayaran DP";
        document.getElementById("labelTagihan").innerHTML = "Jumlah DP";
    }
    function insertPelunasan(id,biaya,dp){
        document.getElementById("form").action = "http://localhost/sisinfoperalatantambang/pages/insertPelunasan/";
        var total = biaya-dp;
        document.getElementById("dp").value = total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
        document.getElementById("jumlahDP").value = total;
        document.getElementById("idSewa").value = id;
        document.getElementById("header").innerHTML = "Pelunasan ";
        document.getElementById("labelTagihan").innerHTML = "Sisa Tagihan ";
    }

    function deletePenyewaan(id){
        document.getElementById("cancel").href = "http://localhost/sisinfoperalatantambang/pages/deletePenyewaan/" + id;
        document.getElementById("header_message").innerHTML = "Hapu Data Pesanan";
        document.getElementById("modal_message").innerHTML = "Anda yakin ingin Menghapus data tersebut ?";
    }

    function updateProfile(username,fname,lname,email,phone){
        $("#submit").show();
        $("#cancel").show();
        $("#ubah").hide();
        document.getElementById("username").value= username;
        document.getElementById("fname").value= fname;
        document.getElementById("lname").value= lname;
        document.getElementById("email").value= email;
        document.getElementById("telp").value= phone;
    }

    $("#submit").hide();
    $("#cancel").hide();

    function cancelUpdate(){
        $("#submit").hide();
        $("#cancel").hide();
        $("#ubah").show();
        document.getElementById("username").value= "";
        document.getElementById("fname").value= "";
        document.getElementById("lname").value= "";
        document.getElementById("email").value= "";
        document.getElementById("telp").value= "";
        document.getElementById("password").value= "";
        document.getElementById("confirm").value= "";
    }
    
</script>



</body>

</html>