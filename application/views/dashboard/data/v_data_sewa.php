 <!-- Static Table Start -->
 <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                          
                                <!-- <a href="" onClick="insertDonatur()" data-toggle="modal" data-target="#PrimaryModalhdbgcl"><span style="float:right;font-size:20px; color:#078171;"><i class="fa fa-plus"  aria-hidden="true"></i></span>
                                </a> -->
                          
                                <div class="main-sparkline13-hd">
                                    <h1>Data  <span class="table-project-n">Sewa</span></h1>
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
                                        <select class="form-control dt-tb">
											<option value="">Export Basic</option>
											<option value="all">Export All</option>
											<option value="selected">Export Selected</option>
										</select>
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th >No</th>
                                                <th >ID Sewa</th>
                                                <th >Nama Customer</th>
                                                <th >Nama Product</th>
                                                <th >Tanggal Sewa</th>
                                                <th >Tanggal Pengembalian</th>
                                                <th >Biaya</th>
                                                <th >Status</th>
                                                <th data-field="action">Settings</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $i = 0; foreach($sewa as $row){ $i++; ?>
                                            <tr>
                                                <td ><?= $i; ?></td>
                                                <td ><?= $row['id_sewa']; ?></td>
                                                <td ><?= $row['nama_depan']; ?> <?= $row['nama_belakang']; ?></td>
                                                <td ><?= $row['nama_product']; ?></td>
                                                <td ><?= $row['tgl_sewa']; ?></td>
                                                <td ><?= $row['tgl_pengembalian']; ?></td>
                                                <td >Rp <?= number_format($row['biaya'],2,",","."); ?></td>
                                                <?php if($row['status_penyewaan'] == 0){ ?>
                                                <td><center><i class="fa fa-close"></i></center></td>
                                                <?php }else{ ?>
                                                    <td><center><i class="fa fa-check"></i></center></td>
                                                <?php } ?>
                                                <?php if($row['status_penyewaan'] == 0){ ?>
                                                <td class="datatable-ct">
                                                    <center>
                                                    <button data-toggle="modal" onclick="confirmRental('<?= $row['id_sewa']; ?>')" data-target="#Modal" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-share" aria-hidden="true"></i></button>
                                                    <button onclick="deleteRental('<?= $row['id_sewa']; ?>')" data-toggle="modal"  data-target="#Modal" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                    </center>
                                                </td>
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
        <div id="Modal" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <center><h4 id="header" class="modal-title">Konfirmasi Pesanan</h4></center>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <h2>Information!</h2>
                                        <p id="modal_message">Anda yakin ingin Mengkonfirmasi Pesanan ?</p>
                                    </div>
                                    <div class="modal-footer">
                                                <a data-dismiss="modal" href="#">Batal</a>
                                                <a id="delete" href="">Proses</button>
                                    </div>
                                </div>
                            </div>
                        </div>
  
       
     
       