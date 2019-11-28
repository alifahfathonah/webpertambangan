<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
            <!-- <a href="index.html"><img class="main-logo" src="<?= $base_url; ?>assets/dashboard/img/logo/logo2.png" alt="" /></a>
                <strong><a href="index.html"><img src="<?= $base_url; ?>assets/dashboard/img/logo/logo1.png" alt="" /></a></strong> -->
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar" style="margin-top:50px;">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                         <li >
                            <a class="<?php if(!empty($active_home)){echo "active";} ?>" href="<?= base_url(); ?>dashboard/">
                                <i class="fa big-icon fa-home icon-wrap" aria-hidden="true"></i><span class="mini-click-non"> Dashboard</span>
							</a>
                        </li>
                        <li class="removable">
                            <a class="has-arrow <?php if(!empty($active_product) || !empty($active_sewa)){echo "active";} ?>" href="index.html">
								   <span class="fa fa-database icon-wrap"></span>
								   <span class="mini-click-non">Data Master</span>
								</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a class="<?php if(!empty($active_product)) {echo "active";} ?>" title="Dashboard v.1" href="<?= base_url(); ?>dashboard/list_product"><span class="mini-sub-pro">Data Alat</span></a></li>
                            </ul>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a class="<?php if(!empty($active_sewa)) {echo "active";} ?>" title="Dashboard v.1" href="<?= base_url(); ?>dashboard/list_sewa"><span class="mini-sub-pro">Data Sewa</span></a></li>
                            </ul>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a class="" title="Dashboard v.1" href="<?= base_url(); ?>dashboard/list_transaction"><span class="mini-sub-pro">Data Transaksi</span></a></li>
                            </ul>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a class="<?php if(!empty($active_merk)){echo "active";} ?>" title="Dashboard v.1" href="<?= base_url(); ?>dashboard/list_merk"><span class="mini-sub-pro">Data Merk</span></a></li>
                            </ul>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a class="<?php if(!empty($active_kategori)){echo "active";} ?>" title="Dashboard v.1" href="<?= base_url(); ?>dashboard/list_category"><span class="mini-sub-pro">Data Category</span></a></li>
                            </ul>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a class="<?php if(!empty($active_tujuan)){echo "active";} ?>" title="Dashboard v.1" href="<?= base_url(); ?>dashboard/list_tujuan"><span class="mini-sub-pro">Data Tujuan</span></a></li>
                            </ul>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a class="<?php if(!empty($active_kualitas)){echo "active";} ?>" title="Dashboard v.1" href="<?= base_url(); ?>dashboard/list_kualitas"><span class="mini-sub-pro">Data Kualitas</span></a></li>
                            </ul>        
                           
                        </li>
                    
                        <li>
                            <a class="<?php if(!empty($active_laporan)){echo "active";} ?>" href="<?= base_url() ?>dashboard/laporan/" aria-expanded="false"><span class="fa fa-shopping-bag icon-wrap" style="color:grey;" ></span> <span class="mini-click-non">Laporan</span></a>
                            
                        </li>
                        <li>
                            <a class="" href="<?= base_url(); ?>" aria-expanded="false"><span class="fa fa-share icon-wrap" style="color:grey;" ></span> <span class="mini-click-non">Halaman Utama</span></a>
                            
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->