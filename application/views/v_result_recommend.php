
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

<section class="ftco-section">
    <div class="container">
        <!-- <div class="row justify-content-center mb-3 pb-3">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <h3 class="mb-4">Classification Report</h3>
                    </div>
                </div>
        <div class="row mb-3 pb-2">
            <div class="col heading-section  ftco-animate">
                <p>Accuracy</p>
                <p><?= $accuracy."%";?></p>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style= "width:<?= $accuracy."%";?>" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="col heading-section  ftco-animate">
                <p>Recall</p>
                <p><?= ($average['recall']*100)."%";?></p>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width:<?= ($average['recall']*100)."%";?>" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="col heading-section  ftco-animate">
                <p>Precision</p>
                <p><?= ($average['precision']*100)."%";?></p>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width:<?= ($average['precision']*100)."%";?>" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div> -->
    <br>
    <div class="container">
    <div class="row justify-content-center mb-3 pb-3">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <h3 class="mb-4">Rekomendasi Produk</h3>
                    </div>
                </div>
        <div class="row">  
            <?php foreach($recommend as $index){?>
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="#" class="img-prod"><img  class="img-fluid" src="<?= base_url() ?>/assets/home/images/product/<?= $index['data']['foto']?>" alt="Colorlib Template">
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center ">
                        <h3><a href="#"></a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                            <p ><?= "Rp. ".number_format($index['data']['harga']);?></p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="pricing">
                            <p ><?= "Distance : ".$index['distance'];?></p>
                            </div>
                        </div>
                        <div class="bottom-area d-flex px-3">
                            <div class="m-auto d-flex" style="margin-bottom:100px;">
                                <a href="<?= base_url();?>pages/singleproduct/<?= $index['data']['id_product'];?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                    <span><i class="ion-ios-menu"></i></span>
                                </a>
                                <a href="<?= base_url();?>pages/checkout/<?= $index['data']['id_product'];?>" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                    <span><i class="ion-ios-cart"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</section>