 <!-- Static Table Start -->
 <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <a href="<?= base_url() ?>dashboard/cetak_laporan/" ><span style="float:right;font-size:20px; color:#078171;"><i class="fa fa-print"  aria-hidden="true"></i></span>
                                    </a>
                                <div class="main-sparkline13-hd">
                                    <h1>Laporan  <span class="table-project-n">Transaksi</span></h1>
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
                                                <th>Total Biaya</th>
                                                <th>Bukti</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; foreach($laporan as $row){ $i++;?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $row['nama_depan']; ?> <?= $row['nama_belakang']; ?></td>
                                                <td><?= $row['nama_product']; ?></td>
                                                <td><?= $row['tgl_sewa']; ?></td>
                                                <td><?= $row['tgl_pengembalian']; ?></td>
                                                <td><?= number_format($row['biaya'],2,",","."); ?></td>
                                                <td>
                                                    <center>
                                                    <img src="<?= base_url() ?>assets/dashboard/img/bukti/<?= $row['bukti'] ?>" alt="" width="80" height="80">
                                                    </center>
                                                </td>
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