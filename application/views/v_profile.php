<div class="hero-wrap hero-bread" style="background-image: url('https://petrotrainingasia.com/wp-content/uploads/2016/11/minyak-dan-gas-1024x576.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Profile</span></p>
            <h1 class="mb-0 bread">Profile</h1>
          </div>
        </div>
      </div>
    </div>
    <?php if($this->session->flashdata('message')){ ?>
        <p id="alert"></p>
        <p style="display:none;" id="icon"><?= $this->session->flashdata('icon');  ?></p>
        <p style="display:none;" id="title"><?= $this->session->flashdata('title');  ?></p>
        <p style="display:none;" id="message"><?= $this->session->flashdata('message');  ?></p>
    <?php } ?>
    <section class="ftco-section">
    	<div class="container">
        <?php foreach($profile as $row){ ?>
    		<div class="row">
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="#" class="img-prod"><img class="img-fluid" src="<?= base_url() ?>/assets/home/images/product/a42d7ab6fba35bc6d1470d650de44e6c.jpg" alt="Colorlib Template">
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center ">
                            <h6><a href="#"><?= $row['nama_depan'] ?> <?= $row['nama_belakang']; ?></a></h6>
                            <h3><a href="#"><?= $row['email'] ?></a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-9 ftco-animate">
                    <div class="product">
                       
                        <div class="text py-3 pb-4 px-3 text-center ">
                            <h2><a href="#">Ubah Profile</a></h2>
                        </div>
                        <form id="form" action="<?= base_url() ?>pages/changeProfile/"  method="post">
                        <div class="row align-items-end" style="margin:15px;">  
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label for="firstname">Username</label>
                                    <input type="text" id="username" name="username" readonly class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label for="firstname">Nama Depan</label>
                                    <input type="text" id="fname" name="fname" class="form-control" placeholder="">
                                </div>
                            </div>
                           
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label for="firstname">Nama Belakang</label>
                                    <input type="text" id="lname" name="lname" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label for="firstname">Email</label>
                                    <input type="text" id="email" name="email" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label for="firstname">No Telpon</label>
                                    <input type="text" id="telp" name="telp" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label for="firstname">Password</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label for="firstname">Konfirmasi Password</label>
                                    <input type="password" id="confirm" name="confirmPassword" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                           
                            <div class="text py-3 pb-4 px-3 text-center ">
                                <button type="button" id="ubah" onclick="updateProfile('<?= $row['username']; ?>','<?= $row['nama_depan']; ?>','<?= $row['nama_belakang']; ?>','<?= $row['email']; ?>','<?= $row['nomor_telp']; ?>')" data-toggle="modal"  data-target="#Modal"   class="btn" style="background:#f8a978;color:white">Ubah</button>
                                <button data-toggle="modal" type="submit" id="submit"  data-target="#Modal"   class="btn" style="background:#f8a978;color:white">Submit</button>
                                <button type="button" onclick="cancelUpdate()"class="btn" id="cancel" style="background:#FF000000;color:black; border: 2px solid #f8a978;">Cancel</button>
                            </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
    		</div>
	    </div>
    </section>
   