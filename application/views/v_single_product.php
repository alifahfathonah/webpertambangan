
<div class="hero-wrap hero-bread" style="background-image: url('https://news.detik.com/x/detail/intermeso/20180419/Kisah-Pipin-Jadi-Raja-Minyak-Indonesia/images/medco-rpnyu2.png');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="index.html">Product</a></span> <span>Product Single</span></p>
                <h1 class="mb-0 bread">Product Single</h1>
            </div>
        </div>
    </div>
</div>

<?php foreach($detail as $row){ ?>
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <a href="<?= base_url() ?>/assets/home/images/product/<?= $row['foto'] ?>" class="image-popup"><img src="<?= base_url() ?>/assets/home/images/product/<?= $row['foto'] ?>" class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3><?= $row['nama_product']; ?></h3>
                <div class="rating d-flex">
                    <p class="text-left mr-4">
                        <?= $row['nama_category']; ?>
                    </p>
                    <!-- <p class="text-left mr-4">
                        <a href="#" class="mr-2">5.0</a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                    </p> -->
                    <!-- <p class="text-left mr-4">
                        <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
                    </p>
                    <p class="text-left">
                        <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
                    </p> -->
                </div>
                <p class="price"><span>Rp <?= number_format($row['harga'],2,",","."); ?>/hari</span></p>
                <h5>Tujuan</h5>
                <p><?= $row['nama_tujuan']; ?>
                </p>
                <h5>Kualitas</h5>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <p><?= $row['nama_kualitas']; ?></p>
                        <!-- <div class="form-group d-flex">
                            <div class="select-wrap">
                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                <select name="" id="" class="form-control">
                                    <option value="">Bagus</option>
                                    <option value="">Standart</option>
                                </select>
                            </div>
                        </div> -->
                        <h5>Merk</h5>
                        <p><?= $row['nama_merk']; ?></p>
                        <!-- <div class="form-group d-flex">
                            <div class="select-wrap">
                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                <select name="" id="" class="form-control">
                                    <option value="">Bagus</option>
                                    <option value="">Standart</option>
                                </select>
                            </div>
                        </div> -->
                    </div>
                    <div class="w-100"></div>
                    
                    <div class="w-100"></div>
                    <div class="col-md-12">
                        <h5>Berat</h5>
                        <p style="color: #000;"><?= $row['berat'];?> kg</p>
                    </div>
                </div>
                <?php if($this->session->userdata('customer') != null){ ?>
                <p><a href="<?= base_url() ?>pages/checkout/<?= $row['id_product']; ?>" class="btn btn-primary py-3 px-4">Sewa Product</a></p>
                <?php }else{ ?>
                    <p><a href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl" class="btn btn-primary py-3 px-4">Sewa Product</a></p>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php  } ?>

