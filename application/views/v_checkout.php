<?php if($this->session->flashdata('message')){ ?>
    <p id="alert"></p>
    <p style="display:none;" id="icon"><?= $this->session->flashdata('icon');  ?></p>
    <p style="display:none;" id="title"><?= $this->session->flashdata('title');  ?></p>
    <p style="display:none;" id="message"><?= $this->session->flashdata('message');  ?></p>
<?php } ?>
<div class="hero-wrap hero-bread" style="background-image: url('https://news.detik.com/x/detail/intermeso/20180419/Kisah-Pipin-Jadi-Raja-Minyak-Indonesia/images/medco-rpnyu2.png');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
                <h1 class="mb-0 bread">Checkout</h1>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 ftco-animate">
                <form action="<?= base_url();?>pages/proses_checkout" class="billing-form" method="POST">
                    <input type="hidden" name="id_product" value="<?= $product_id?>">
                    <input type="hidden" id="price" name="price" value="<?= $price[0]['harga'];?>">
                    <input type="hidden" id="price_total" name="total">
                    <h3 class="mb-4 billing-heading">Data Diri</h3>
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">Nama Depan</label>
                                <input type="text" value="<?= $this->session->userdata('fname'); ?>" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname">Nama Belakang</label>
                                <input type="text" value="<?= $this->session->userdata('lname'); ?>" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <!-- <div class="col-md-12">
                            <div class="form-group">
                                <label for="country">Kualitas</label>
                                <div class="select-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="" id="" class="form-control">
                                        <option value="">Tidak Bersertifikat</option>
                                        <option value="">Sertifikat</option>
                                    </select>
                                </div>
                            </div>
                        </div> -->
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="streetaddress">Alamat</label>
                                <textarea type="text"  cols="40" rows="5" name="address" class="form-control" placeholder="Alamat Pengiriman"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea type="text" cols="40" rows="5" name="address_pt"class="form-control" placeholder="Alamat PT"></textarea>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="towncity">Dari</label>
                                <input type="date" onchange="getDayLength()" id="from" name="from" value="<?=  date('Y-m-d'); ?>" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="postcodezip">Sampai</label>
                                <input onchange="getDayLength()" id="to" type="date" name="to" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="towncity">Kota</label>
                                <input type="text" name="city" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="postcodezip">Kode Pos</label>
                                <input type="text" name="zipcode" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">No Telepon</label>
                                <input type="text" value="<?= $this->session->userdata('phone'); ?>" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emailaddress">Alamat Email</label>
                                <input type="text" value="<?= $this->session->userdata('email'); ?>" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="w-100"></div>
                       
                    </div>
                
                <!-- END -->
            </div>
            <div class="col-xl-5">
                <div class="row mt-5 pt-3">
                    <div class="col-md-12 d-flex mb-5">
                        <div class="cart-detail cart-total p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Harga Total</h3>
                            <p class="d-flex total-price">
                                <span>Total</span>
                                <label for="" name ="total" id="total">Rp. 0</label>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="cart-detail p-3 p-md-4">
                            <p><button name="checkout" type="submit" class="btn btn-primary py-3 px-4">Sewa</button></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .col-md-8 -->
        </div>
    </div>
    </form>
</section>



<!-- .section -->