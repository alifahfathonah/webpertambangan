<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url(<?= base_url(); ?>assets/home/images/minyak.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                    <div class="col-md-12 ftco-animate text-center">
                        <h1 class="mb-2">PT Nesitor</h1>
                        <h2 class="subheading mb-4">Jasa Penyewaaan Alat Pertambangan Minyak</h2>
                        <p><a href="#" class="btn btn-primary">View Details</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if($this->session->flashdata('message')){ ?>
    <p id="alert"></p>
    <p style="display:none;" id="icon"><?= $this->session->flashdata('icon');  ?></p>
    <p style="display:none;" id="title"><?= $this->session->flashdata('title');  ?></p>
    <p style="display:none;" id="message"><?= $this->session->flashdata('message');  ?></p>
<?php } ?>
<div id="recommend"class="container-fluid bg-light">
    <div class="row">   
    <img src="https://dev.nabors.com/sites/default/files/rigs-offshore-platform-bigfoot_0.jpg" alt="">
            <div class="col py-5">
            <div class="container ftco-animate">
                <div class="row justify-content-center mb-3 pb-3">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <h3 class="mb-4">Cari Rekomendasi Produk</h3>
                    </div>
                </div>

				<form action="<?= base_url();?>pages/search_recommended" method="POST">
                    <label for="">Kualitas</label>
                	<div class="form-wrapper">
                        <div class="select-wrap">    
                             <select name="kualitas" id="" class="form-control">
                                <option value="">--Pilih Kualitas--</option>
                                <?php foreach($data_kualitas as $kualitas){?>
                                    <option value="<?= $kualitas['nilai'] ?>"><?= $kualitas['nama_kualitas'];?></option>
                                <?php  }?>
                            </select>
                        </div>
					</div>
                    <label for="">Merk</label>
                    
                	<div class="form-wrapper">
                        <div class="select-wrap">    
                             <select name="merk" id="" class="form-control">
                                <option value="">--Pilih Merk--</option>
                                <?php foreach($data_merk as $merk){?>
                                    <option value="<?= $merk['nilai'] ?>"><?= $merk['nama_merk'];?></option>
                                <?php  }?>
                            </select>
                        </div>
					</div>
                    <label for="">Tujuan</label>
                	<div class="form-wrapper">
                        <div class="select-wrap">    
                             <select name="tujuan" id="" class="form-control">
                                <option value="">--Pilih Tujuan--</option>
                                <?php foreach($data_tujuan as $tujuan){?>
                                    <option value="<?= $tujuan['nilai'] ?>"><?= $tujuan['nama_tujuan'];?></option>
                                <?php  }?>
                            </select>
                        </div>
					</div>
                    <label for="">Category</label>
                	<div class="form-wrapper">
                        <div class="select-wrap">    
                             <select name="category" id="" class="form-control">
                                <option value="">--Pilih Category--</option>
                                <?php foreach($data_category as $category){?>
                                    <option value="<?= $category['nilai'] ?>"><?= $category['nama_category'];?></option>
                                <?php  }?>
                            </select>
                        </div>
					</div>
                    <label for="">Harga</label>
                	<div class="form-wrapper">
                        <input name="harga" type="number" class="form-control"  placeholder="">
					</div>
                    <label for="">Berat(KG)</label>
                	<div class="form-wrapper">
                        <input name="berat" type="number" class="form-control"  placeholder="">
					</div>
                    <label for="">Kedalaman(KM)</label>
                	<div class="form-wrapper">
                        <input name="kedalaman" type="number" class="form-control"  placeholder="category : mesin bor">
					</div>
                    <label for="">Parameter K</label>
                	<div class="form-wrapper">
                        <input type="number" name="paramsk" class="form-control"  placeholder="">
					</div>
					<button type="submit" style="background:#f8a978;" name="register">Cari Rekomendasi</button>
				</form>
    </div>
    </div>
    </div>
</div>	
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">Produk</h2>
                <p>Beberapa Jenis Alat Tambang yang di sewakan</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php foreach($product as $row){ ?>
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="#" class="img-prod"><img  class="img-fluid" src="<?= base_url() ?>/assets/home/images/product/<?= $row['foto'] ?>" alt="Colorlib Template">
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center ">
                        <h3><a href="#"><?= $row['nama_product']; ?></a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                            <p >Rp.<?= number_format($row['harga']); ?></p>
                            </div>
                        </div>
                        <div class="bottom-area d-flex px-3">
                            <div class="m-auto d-flex" style="margin-bottom:100px;">
                                <a href="<?= base_url();?>pages/singleproduct/<?= $row['id_product'] ?>/" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                    <span><i class="ion-ios-menu"></i></span>
                                </a>
                                <a href="<?= base_url();?>pages/checkout/<?= $row['id_product'] ?>" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                    <span><i class="ion-ios-cart"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<hr>