 <!-- Static Table Start -->
 <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
<!--                            
                                <a href="" onClick="insertCategory()" data-toggle="modal" data-target="#PrimaryModalhdbgcl"><span style="float:right;font-size:20px; color:#078171;"><i class="fa fa-plus"  aria-hidden="true"></i></span>
                                </a> -->
                           
                                <div class="main-sparkline13-hd">
                                    <h1>Data  <span class="table-project-n">Transaction</span></h1>
                                </div>
                                    <?php if($this->session->flashdata('message')){ ?>
                                    <p id="alert"></p>
                                    <p style="display:none;" id="status"><?= $this->session->flashdata('icon');  ?></p>
                                    <p style="display:none;" id="title"><?= $this->session->flashdata('title');  ?></p>
                                    <p style="display:none;" id="message"><?= $this->session->flashdata('message');  ?></p>
                                    <?php } ?>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <!-- <select class="form-control dt-tb">
											<option value="">Export Basic</option>
											<option value="all">Export All</option>
											<option value="selected">Export Selected</option>
										</select> -->
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="" data-resizable="true" data-cookie=""
                                        data-cookie-id-table="saveId" data-show-export="" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Penyewa</th>
                                                <th>Nama Barang</th>
                                                <th>Tanggal Sewa</th>
                                                <th>Tanggal Kembali</th>
                                                <th>Sisa Tagihan</th>
                                                <th>Jumlah DP</th>
                                                <th>Pelunasan</th>
                                                <th>Bukti</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; foreach($transaksi as $row){$i++; ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $row['nama_depan']; ?> <?= $row['nama_belakang']; ?></td>
                                                <td><?= $row['nama_product']; ?></td>
                                                <td><?= $row['tgl_sewa']; ?></td>
                                                <td><?= $row['tgl_pengembalian']; ?></td>
                                                <td >Rp <?= number_format($row['biaya']-$row['pembayaran_awal']-$row['pembayaran_akhir'],2,",","."); ?> &nbsp; &nbsp; &nbsp;</td>
                                                <td>Rp <?= number_format($row['pembayaran_awal'],2,",",".") ;?> &nbsp; &nbsp; &nbsp;</td>
                                                <td>Rp <?= number_format($row['pembayaran_akhir'],2,",",".") ;?> &nbsp; &nbsp; &nbsp;</td>
                                                <?php if($row['bukti'] != null){ ?>
                                                <td> <img src="<?= base_url() ?>assets/dashboard/img/bukti/<?= $row['bukti']; ?>" alt="" width="50" height="50" > </td>
                                                <?php }else{ ?>
                                                <td></td>
                                                <?php } ?>
                                                <?php if($row['status_pembayaran'] == 2){ ?>
                                                    <td>SELESAI</td>
                                                <?php }else if($row['status_pembayaran'] == 1) { ?>
                                                    <td>Menunggu Pelunasan</td>
                                                <?php }else{ ?>
                                                    <td>Menunggu Pembayran DP</td>
                                                <?php } ?>
                                                <?php if($row['status_pembayaran'] == 1) { ?>
                                                    <td><button data-toggle="modal" onclick="insertPelunasan('<?= $row['id_sewa']; ?>',<?= $row['biaya']; ?>,<?= $row['pembayaran_awal']; ?>)" data-target="#ModalInsert" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></button></td>
                                                <?php }else if($row['status_pembayaran'] == 0){ ?>
                                                    <td><button data-toggle="modal" onclick="insertPembayaran('<?= $row['id_sewa']; ?>',<?= $row['biaya_dp']; ?>)" data-target="#ModalInsert" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></button></td>
                                                <?php }else{ ?>
                                                    <td></td>
                                                <?php } ?>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->
 <!-- Modal -->
 <div id="ModalInsert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 id="header_message" class="modal-title">Tambah Data Siswa</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form" action="<?= base_url() ?>home/insertdonatur/" enctype="multipart/form-data" method="post">
                                         
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label id="labelTagihan" class="login2 pull-right pull-right-pro"></label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-5">
                                                    <div class="input-group date">
                                                        <span class="input-group-addon">Rp.</span>
                                                        <input type="text" id="tagihan" name="tagihan" readonly  class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="idSewa" id="idSewa">
                                        <input type="hidden" name="JumlahTagihan" id="JumlahTagihan">
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label id="labelMessage" class="login2 pull-right pull-right-pro">Nominal</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-5">
                                                    <div class="input-group date">
                                                        <span class="input-group-addon">Rp.</span>
                                                        <input type="text" id="nominal" name="nominal" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label id="labelMessage" class="login2 pull-right pull-right-pro">Bukti</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-5">
                                                        <input type="file" id="foto" name="foto" class="form-control">
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
        <div id="ModalDelete" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                       <center> <h4 id="header" class="modal-title">Hapus Data Kategori</h4></center>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <h2>Information!</h2>
                                        <p>Anda yakin ingin menghapus data tersebut ?</p>
                                    </div>
                                            <div class="modal-footer">
                                                <a class="default"data-dismiss="modal" href="#">Batal</a>
                                                <a id="delete" href="">Proses</button>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>