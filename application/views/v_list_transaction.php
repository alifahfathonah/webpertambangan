
<?php 
if($this->session->flashdata('message')){?>
    <p id="alert"></p>
    <p style="display:none;" id="icon"><?= $this->session->flashdata('icon');  ?></p>
    <p style="display:none;" id="title"><?= $this->session->flashdata('title');  ?></p>
    <p style="display:none;" id="message"><?= $this->session->flashdata('message');  ?></p>
<?php } ?>
<div class="hero-wrap hero-bread" style="background-image: url('https://news.detik.com/x/detail/intermeso/20180419/Kisah-Pipin-Jadi-Raja-Minyak-Indonesia/images/medco-rpnyu2.png');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Transaction</span></p>
                <h1 class="mb-0 bread">My Transaction</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">                              
                                <th>Nama Product</th>
                                <th>Jumlah Hari</th>
                                <th>Tanggal Sewa</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Biaya DP</th>
                                <th>Total Harga</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($transaction2 as $row){ ?>
                            <tr class="text-center">
                                <td><?= $row['nama_product']; ?></td>
                                <td id="range"><?= $row['range']; ?></td>
                                <td id="from"><?= $row['tgl_sewa']; ?></td>
                                <td id="to"><?= $row['tgl_pengembalian']; ?></td>
                                <td>Rp. <?= number_format($row['biaya_dp'],2,",","."); ?></td>
                                <td>Rp. <?= number_format($row['biaya'],2,",","."); ?></td>
                                <td><img src="<?= base_url() ?>assets/home/images/product/<?= $row['foto']; ?>" alt="" width="60px"></td>
                                <?php if($row['status_penyewaan'] == 1){ ?>
                                    <td><a  class="btn" style="background:#FF000000;color:black; border: 2px solid #f8a978;">Diproses</a></td>
                                <?php }else if($row['status_penyewaan'] == 0){ ?>
                                    <td><a  class="btn" style="background:#FF000000;color:black; border: 2px solid #f8a978;">X</a></td>
                                <?php }else if($row['status_penyewaan'] == 3){?>
                                    <td><a  class="btn" style="background:#FF000000;color:black; border: 2px solid #f8a978;">Diterima</a></td>
                                <?php }else{ ?>
                                    <td><a  class="btn" style="background:#FF000000;color:black; border: 2px solid #f8a978;">Selesai</a></td>
                                <?php } ?>
                                <?php if($row['status_penyewaan'] == 0){ ?>
                                <td><a onclick="deleteRental('<?= $row['id_sewa']; ?>')" data-toggle="modal"  data-target="#Modal"   class="btn" style="background:#f8a978;color:white">Batal</a></td>
                                <?php }else if($row['status_penyewaan'] == 1){ ?>
                                    <td><a onclick="insertPembayaran('<?= $row['id_sewa']; ?>',<?= $row['biaya_dp'];?>)" data-toggle="modal"  data-target="#ModalInsert"  class="btn" style="background:#f8a978;color:white"> + DP</a></td>
                                <?php }else if($row['status_penyewaan'] == 3){ ?>
                                    <td><a onclick="insertPelunasan('<?= $row['id_sewa']; ?>',<?= $row['biaya'];?>,<?= $row['biaya_dp'];?>)" data-toggle="modal"  data-target="#ModalInsert"  class="btn" style="background:#f8a978;color:white"> Pelunasan</a></td>
                                <?php }else{ ?>
                                    <td><a onclick="deletePenyewaan('<?= $row['id_sewa']; ?>')"  data-toggle="modal"  data-target="#Modal"  class="btn" style="background:#f8a978;color:white"> Hapus</a></td>
                                <?php } ?>
                            </tr>                            
                            <!-- END TR-->
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- Modal -->
<div id="ModalInsert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                    <div class="modal-dialog" style="width:800px;">
                        <div class="modal-content" style="width:600px;position:relative;right:50px;">
                            <div class="modal-header header-color-modal bg-color-1">
                                <h4 id="header" style="color:#fff;" class="modal-title">Pembayaran DP</h4>
                                <div class="modal-close-area modal-close-df">
                                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                </div>
                            </div>
                            <div class="modal-body">
                                <form id="form" action="<?= base_url() ?>pages/insertPembayaran/" enctype="multipart/form-data" method="post">
                                   
                               
                                    <div class="form-group-inner" style="margin-bottom:10px;">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label id="labelTagihan" class="login2 pull-right pull-right-pro">Jumlah DP</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                <div class="input-group date">
                                                    <span style="background-color: #fff; border: 1px solid #E5E6E7;border-radius: 1px;color: inherit;font-size: 14px;font-weight: 400;line-height: 1;padding: 6px 12px;text-align: center;" class="group">Rp.</span>
                                                    <input type="text" readonly id="dp" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="jumlahDP" name="jumlahDP">
                                    <input type="hidden" id="idSewa" name="idSewa">
                                    <div class="form-group-inner" style="margin-bottom:20px;">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">Nominal</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                <div class="input-group date">
                                                    <span style="background-color: #fff; border: 1px solid #E5E6E7;border-radius: 1px;color: inherit;font-size: 14px;font-weight: 400;line-height: 1;padding: 6px 12px;text-align: center;" class="group">Rp.</span>
                                                    <input type="text" id="nominal" name="nominal" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                 
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">Foto</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                <input type="file" id="foto" name="foto" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                
                            </div>
                                    <div class="modal-footer">
                                        <a class="default" data-dismiss="modal" href="#">Batal</a>
                                        <button class="btn-submit" type="submit" href="#">Proses</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>

  <!-- Modal -->
  <div id="Modal" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <center><h4 id="header_message" style="color:#fff;" class="modal-title">Cacad</h4></center>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i style="position:relative;bottom:12px;right:7px;" class="fa fa-close">X</i></a>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <h2>Information!</h2>
                                        <p id="modal_message">Anda yakin ingin Mengkonfirmasi Pesanan ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a data-dismiss="modal" href="#">Batal</a>
                                        <a id="cancel" href="xcxzcxz">Proses</button>
                                    </div>
                                </div>
                            </div>
                        </div>
  
       
     
       