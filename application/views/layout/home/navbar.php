<body class="goto-here">
    <div class="py-1 bg-primary">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                            <span class="text">+6289506277284</span>
                        </div>
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                            <span class="text">PTNESITOR@gmail.com</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url();?>home">PT NESITOR</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="<?= base_url(); ?>" class="nav-link">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Produk</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="<?= base_url(); ?>pages/listproduct">Alat Tambang</a>
                        </div>
                    </li>
                    <li class="nav-item active"><a href="<?=base_url()?>pages/about" class="nav-link">Tentang</a></li>
                    <li class="nav-item active"><a href="<?=base_url()?>pages/contact" class="nav-link">Kontak</a></li>
                    <?php if($this->session->userdata("users_id")!=null && !$this->session->userdata("admin")){?>
                    <li class="nav-item active"><a href="<?=base_url()?>pages/list_transaction" class="nav-link">Transaksi Saya</a></li>
                    <?php }?>
                    <?php if($this->session->userdata('admin')){ ?>
                        <li class="nav-item active"><a href="<?=base_url()?>pages/contact" class="nav-link">Dashboard</a></li>
                        <?php } ?>
                            <?php if($this->session->userdata('users_id') == null){ ?>
                                <li class="nav-item"><a href="" data-toggle="modal" data-target="#PrimaryModalhdbgcl" class="nav-link">Login</a></li>
                                <?php } ?>
                                    <?php if($this->session->userdata('users_id')){?>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-user"></span></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown04">
                                                <a class="dropdown-item" href="<?= base_url(); ?>pages/profile">Profile</a>
                                                <a class="dropdown-item" href="<?= base_url(); ?>pages/logout">Logout</a>
                                            </div>
                                        </li>
                                        <?php }?>
                </ul>
            </div>
        </div>
    </nav>