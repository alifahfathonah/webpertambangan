 <!-- Static Table Start -->
 <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                            
                                <a href="" onClick="insertProduct()" data-toggle="modal" data-target="#PrimaryModalhdbgcl"><span style="float:right;font-size:20px; color:#078171;"><i class="fa fa-plus"  aria-hidden="true"></i></span>
                                </a>
                            
                                <div class="main-sparkline13-hd">
                                    <h1>Data  <span class="table-project-n">Alat</span></h1>
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
                                                <th >ID Alat</th>
                                                <th >Nama Alat</th>
                                                <th >Kualitas</th>
                                                <th >Merk</th>
                                                <th >Tujuan</th>
                                                <th >Kategori</th>
                                                <th >Harga/Hari</th>
                                                <th >Berat</th>
                                                <th >Kedalaman</th>
                                                <th >Foto</th>
                                                <th data-field="action">Settings</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; foreach($product as $row){ $i++; ?>
                                            <tr>
                                                <td ><?= $i; ?></td>
                                                <td ><?= $row['id_product']; ?></td>
                                                <td ><?= $row['nama_product']; ?></td>
                                                <td ><?= $row['nama_kualitas']; ?></td>
                                                <td ><?= $row['nama_merk']; ?></td>
                                                <td ><?= $row['nama_tujuan']; ?></td>
                                                <td ><?= $row['nama_category']; ?></td>
                                                <td >Rp <?= number_format($row['harga'],2,",","."); ?></td>
                                                <td ><?= $row['berat']; ?> kg</td>
                                                <td ><?= $row['kedalaman']; ?> m</td>
                                                <td ><a href="<?= base_url() ?>assets/home/images/product/<?= $row['foto'] ?>" target="_blank">lihat foto</a></td>
                                                <td class="datatable-ct">
                                                    <center>
                                                    <button onclick="updateProduct('<?= $row['id_product']; ?>')"  data-toggle="modal" data-target="#PrimaryModalhdbgcl" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                    <button onclick="deleteProduct('<?= $row['id_product']; ?>')" data-toggle="modal"  data-target="#ModalDelete" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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
        <div id="PrimaryModalhdbgcl" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 id="header" class="modal-title">Tambah Data Siswa</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form" action="<?= base_url() ?>home/insertdonatur/" enctype="multipart/form-data" method="post">
                                            <!-- <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">ID Alat </label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <input id="id" type="text" name="id" class="form-control" />
                                                    </div>
                                                </div>
                                            </div> -->
                                            <input type="hidden" id="id" name="id">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Nama Alat</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="nama" name="nama" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Kualitas </label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <select id="kualitas" name="kualitas" class="form-control" >
                                                            <option value="">-- Pilih Kualitas -- </option>
                                                            <?php foreach($kualitas as $row){ ?>
                                                                <option value="<?= $row['id_kualitas'];?>"><?= $row['nama_kualitas'];?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Merk</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <select id="merk" name="merk" class="form-control" >
                                                        <option value="">-- Pilih Merk -- </option>
                                                            <?php foreach($merk as $row){ ?>
                                                                <option value="<?= $row['id_merk'];?>"><?= $row['nama_merk'];?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Tujuan </label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <select id="tujuan" name="tujuan" class="form-control" >
                                                            <option value="">-- Pilih tujuan -- </option>
                                                            <?php foreach($tujuan as $row){ ?>
                                                                <option value="<?= $row['id_tujuan'];?>"><?= $row['nama_tujuan'];?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Kategori </label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <select id="category" name="category" class="form-control" >
                                                            <option value="">-- Pilih category -- </option>
                                                            <?php foreach($category as $row){ ?>
                                                                <option value="<?= $row['id_category'];?>"><?= $row['nama_category'];?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Harga</label>
                                                    </div>
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                                        <div class="input-group date">
                                                            <span class="input-group-addon">Rp.</span>
                                                            <input type="text" id="harga" name="harga" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Kedalaman</label>
                                                    </div>
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                    <div class="input-group date">
                                                            <input type="text" id="kedalaman" name="kedalaman" class="form-control">
                                                            <span class="input-group-addon">Meter</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Berat</label>
                                                    </div>
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                    <div class="input-group date">
                                                            <input type="text" id="berat" name="berat" class="form-control">
                                                            <span class="input-group-addon">KG</span>
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
        <div id="ModalDelete" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 id="header" class="modal-title">Hapus Data Product</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <h2>Information!</h2>
                                        <p>Anda yakin ingin menghapus data tersebut ?</p>
                                    </div>
                                            <div class="modal-footer">
                                                <a data-dismiss="modal" href="#">Batal</a>
                                                <a id="delete" href="">Proses</button>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>