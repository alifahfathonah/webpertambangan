<?php 
    
    class Dashboard extends CI_Controller
    {

        public function __construct(){
            parent::__construct();
            $this->load->model('PaymentModel');
            $this->load->model('ProductModel');
            $this->load->model('RentalModel');
            $checklogin = $this->session->userdata('admin');
            if(!$checklogin){
                redirect(base_url());
            }
        }

        public function list_transaction(){
            $data['transaksi'] = $this->PaymentModel->getDataTransaksi();
            $this->load->view("layout/dashboard/header");
            $this->load->view("layout/dashboard/sidebar",);
            $this->load->view("layout/dashboard/navbar");
            $this->load->view("layout/dashboard/mobile-menu");
            $this->load->view("dashboard/data/v_data_transaction",$data);
            $this->load->view("layout/dashboard/footer");
        }

        public function index(){
            $data['countUsers'] = count($this->db->get_where('tb_users', array('type' => 0))->result_array());
            $sum = $this->PaymentModel->getsumSalary();
            foreach($sum as $salary){
                $data['sumPendapatan'] = number_format($salary,2,",",".");
            }
            $data['active_home'] = "active";
            $data['countSewa'] = count($this->db->get('tb_penyewaaan')->result_array());
            $data['countProduct'] = count($this->db->get('tb_product')->result_array());
            $this->load->view("layout/dashboard/header");
            $this->load->view("layout/dashboard/sidebar",$data);
            $this->load->view("layout/dashboard/navbar");
            $this->load->view("layout/dashboard/mobile-menu");
            $this->load->view("dashboard/index",$data);
            $this->load->view("layout/dashboard/footer");
        }


 

        public function list_product(){
            $data['product'] = $this->ProductModel->getAllDataProduct();
            $data['kualitas'] = $this->db->get('tb_kualitas')->result_array();
            $data['merk'] = $this->db->get('tb_merk')->result_array();
            $data['tujuan'] = $this->db->get('tb_tujuan')->result_array();
            $data['category'] = $this->db->get('tb_category')->result_array();
            $data['active_product'] = "active";
            $this->load->view("layout/dashboard/header");
            $this->load->view("layout/dashboard/sidebar",$data);
            $this->load->view("layout/dashboard/navbar");
            $this->load->view("layout/dashboard/mobile-menu");
            $this->load->view("dashboard/data/v_data_alat",$data);
            $this->load->view("layout/dashboard/footer");
        }

        public function list_sewa(){
            $data['sewa'] = $this->RentalModel->getAllDataRental();
            $data['active_sewa'] = "active";
            $this->load->view("layout/dashboard/header");
            $this->load->view("layout/dashboard/sidebar",$data);
            $this->load->view("layout/dashboard/navbar");
            $this->load->view("layout/dashboard/mobile-menu");
            $this->load->view("dashboard/data/v_data_sewa",$data);
            $this->load->view("layout/dashboard/footer");
        }

        public function list_category(){
            $data['active_kategori'] = "active";
            $data['data_category'] = $this->db->get('tb_category')->result_array();
            $this->load->view("layout/dashboard/header");
            $this->load->view("layout/dashboard/sidebar",$data);
            $this->load->view("layout/dashboard/navbar");
            $this->load->view("layout/dashboard/mobile-menu");
            $this->load->view("dashboard/data/v_data_category",$data);
            $this->load->view("layout/dashboard/footer");
        }
        public function list_merk(){
            $data['active_merk'] = "active";
            $data['data_merk'] = $this->db->get('tb_merk')->result_array();
            $this->load->view("layout/dashboard/header");
            $this->load->view("layout/dashboard/sidebar",$data);
            $this->load->view("layout/dashboard/navbar");
            $this->load->view("layout/dashboard/mobile-menu");
            $this->load->view("dashboard/data/v_data_merk",$data);
            $this->load->view("layout/dashboard/footer");
        }
        public function list_tujuan(){
            $data['active_tujuan'] = "active";
            $data['data_tujuan'] = $this->db->get('tb_tujuan')->result_array();
            $this->load->view("layout/dashboard/header");
            $this->load->view("layout/dashboard/sidebar",$data);
            $this->load->view("layout/dashboard/navbar");
            $this->load->view("layout/dashboard/mobile-menu");
            $this->load->view("dashboard/data/v_data_tujuan",$data);
            $this->load->view("layout/dashboard/footer");
        }
        public function list_kualitas(){
            $data['active_kualitas'] = "active";
            $data['data_kualitas'] = $this->db->get('tb_kualitas')->result_array();
            $this->load->view("layout/dashboard/header");
            $this->load->view("layout/dashboard/sidebar",$data);
            $this->load->view("layout/dashboard/navbar");
            $this->load->view("layout/dashboard/mobile-menu");
            $this->load->view("dashboard/data/v_data_kualitas",$data);
            $this->load->view("layout/dashboard/footer");
        }

        public function insertProduct(){
            $idProduct = htmlspecialchars($_POST['id']);
            $namaProduct = htmlspecialchars($_POST['nama']);
            $harga = htmlspecialchars($_POST['harga']);
            $idKualitas = htmlspecialchars($_POST['kualitas']);
            $idTujuan = htmlspecialchars($_POST['tujuan']);
            $idMerk = htmlspecialchars($_POST['merk']);
            $idCategory = htmlspecialchars($_POST['category']);
            $berat = htmlspecialchars($_POST['berat']);
            $kedalaman = htmlspecialchars($_POST['kedalaman']);

            if($idProduct != null || $namaProduct != null || $harga != null || $idKualitas != null || $idTujuan != null || $berat != null || $kedalaman != null || $idMerk != null || $idCategory != null ){

                $image = $this->_uploadImage();
                if($image !=null){
                    $this->ProductModel->insertProduct($idProduct,$namaProduct,$harga,$idKualitas,$idMerk,$idTujuan,$idCategory,$berat,$kedalaman,$image);
                    $this->session->set_flashdata('icon','success');
                    $this->session->set_flashdata('title','Success !');
                    $this->session->set_flashdata('message','Product berhasil ditambahkan !');
                    redirect(base_url().'dashboard/list_product');
                }else{
                    $this->session->set_flashdata('icon','warning');
                    $this->session->set_flashdata('title','Warning !');
                    $this->session->set_flashdata('message','Field Tidak boleh kosong !');
                    redirect(base_url().'dashboard/list_product');
                }
                
            }else{
                $this->session->set_flashdata('icon','warning');
                $this->session->set_flashdata('title','Warning !');
                $this->session->set_flashdata('message','Field Tidak boleh kosong !');
                redirect(base_url().'dashboard/list_product');
            }
           
        }

        public function updateProduct(){
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $kualitas = $this->input->post('kualitas');
            $tujuan = $this->input->post('tujuan');
            $merk = $this->input->post('merk');
            $category = $this->input->post('category');
            $harga = $this->input->post('harga');
            $kedalaman = $this->input->post('kedalaman');
            $berat = $this->input->post('berat');
            $foto = $this->_uploadImage();
            $getDataProduct = $this->db->get_where('tb_product',array('id_product' => $id))->row_array();

            if($nama == null){
                $nama = $getDataProduct['nama_product'];
            }
            
            if($kualitas == null){
                $kualitas = $getDataProduct['id_kualitas'];
            }

            if($merk == null){
                $merk = $getDataProduct['id_merk'];
            }

            if($tujuan == null){
                $tujuan = $getDataProduct['id_tujuan'];
            }

            if($category == null ){
                $category = $getDataProduct['id_category'];
            }

            if($harga == null){
                $harga = $getDataProduct['harga'];
            }

            if($kedalaman == null){
                $kedalaman = $getDataProduct['kedalaman'];
            }

            if($foto == null){
                $foto = $getDataProduct['foto'];
            }

            if($berat == null){
                $berat = $getDataProduct['berat'];
            }

            $this->ProductModel->updateProduct($id,$nama,$harga,$kualitas,$merk,$tujuan,$category,$berat,$kedalaman,$foto);
            $this->session->set_flashdata('icon','success');
            $this->session->set_flashdata('title','Success !');
            $this->session->set_flashdata('message','Product berhasil diubah !');
            redirect(base_url().'dashboard/list_product/');
        }

        public function deleteProduct(){
            $idProduct = $this->uri->segment(3);
            if($idProduct == null){
                redirect(base_url().'dashboard/list_product/');
            }
            $this->ProductModel->deleteProduct($idProduct);
            $this->session->set_flashdata('icon','success');
            $this->session->set_flashdata('title','Success !');
            $this->session->set_flashdata('message',' Product berhasil dihapus !');
            redirect(base_url().'dashboard/list_product/');
        }

        public function _uploadImage()
        {
            $config['upload_path'] = "./assets/home/images/product/";
            $config['allowed_types'] = 'gif|jpg|png|jpeg|';
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);
            if($this->upload->do_upload('foto'))
            {
                $data = array('upload_data' => $this->upload->data());
                $foto = $data['upload_data']['file_name'];
                return $foto;
            }
        }

        //kualitas

        public function insertKualitasProduct(){
            $idKualitas = htmlspecialchars($_POST['id']);
            $namaKualitas = htmlspecialchars($_POST['nama']);
            $nilai = htmlspecialchars($_POST['nilai']);
            if($idKualitas == null || $namaKualitas == null || $nilai == null){
                $this->session->set_flashdata('icon','warning');
                $this->session->set_flashdata('title','Warning !');
                $this->session->set_flashdata('message','Field Tidak boleh kosong !');
                redirect(base_url().'dashboard/list_kualitas/');
            }

            $this->ProductModel->insertKualitasProduct($idKualitas,$namaKualitas,$nilai);
            $this->session->set_flashdata('icon','success');
            $this->session->set_flashdata('title','Success !');
            $this->session->set_flashdata('message','Kualitas Product berhasil ditambahkan !');
            redirect(base_url().'dashboard/list_kualitas/');
        }

        public function updateKualitas(){
            $idKualitas = htmlspecialchars($_POST['id']);
            $namaKualitas = htmlspecialchars($_POST['nama']);
            $nilai = htmlspecialchars($_POST['nilai']);
            if($idKualitas == null || $namaKualitas == null || $nilai == null){
                $this->session->set_flashdata('icon','warning');
                $this->session->set_flashdata('title','Warning !');
                $this->session->set_flashdata('message','Field Tidak boleh kosong !');
                redirect(base_url().'dashboard/list_kualitas/');
            }

            $this->ProductModel->updateKualitasProduct($idKualitas,$namaKualitas,$nilai);
            $this->session->set_flashdata('icon','success');
            $this->session->set_flashdata('title','Success !');
            $this->session->set_flashdata('message','Kualitas Product berhasil diubah !');
            redirect(base_url().'dashboard/list_kualitas/');
        }

        public function deleteKualitas(){
            $idKualitas = $this->uri->segment(3);
            if($idKualitas == null){
                redirect(base_url().'dashboard/list_kualitas/');
            }
            $this->ProductModel->deleteKualitasProduct($idKualitas);
            $this->session->set_flashdata('icon','success');
            $this->session->set_flashdata('title','Success !');
            $this->session->set_flashdata('message','Kualtias Product berhasil dihapus !');
            redirect(base_url().'dashboard/list_kualitas/');
        }

        //tujuan

        public function insertTujuanProduct(){
            $idTujuan = htmlspecialchars($_POST['id']);
            $namaTujuan = htmlspecialchars($_POST['nama']);
            $nilai = htmlspecialchars($_POST['nilai']);
            if($idTujuan == null || $namaTujuan == null || $nilai == null){
                $this->session->set_flashdata('icon','warning');
                $this->session->set_flashdata('title','Warning !');
                $this->session->set_flashdata('message','Field Tidak boleh kosong !');
                redirect(base_url().'dashboard/list_tujuan/');

            }
            $this->ProductModel->insertTujuanProduct($idTujuan,$namaTujuan,$nilai);
            $this->session->set_flashdata('icon','success');
            $this->session->set_flashdata('title','Success !');
            $this->session->set_flashdata('message','Tujuan Product berhasil ditambahkan !');
            redirect(base_url().'dashboard/list_tujuan/');
        }

        public function updateTujuan(){
            $idTujuan = htmlspecialchars($_POST['id']);
            $namaTujuan = htmlspecialchars($_POST['nama']);
            $nilai = htmlspecialchars($_POST['nilai']);
            if($idTujuan == null || $namaTujuan == null || $nilai == null){
                $this->session->set_flashdata('icon','warning');
                $this->session->set_flashdata('title','Warning !');
                $this->session->set_flashdata('message','Field Tidak boleh kosong !');
                redirect(base_url().'dashboard/list_tujuan/');

            }
            $this->ProductModel->updateTujuanProduct($idTujuan,$namaTujuan,$nilai);
            $this->session->set_flashdata('icon','success');
            $this->session->set_flashdata('title','Success !');
            $this->session->set_flashdata('message','Tujuan Product berhasil diubah !');
            redirect(base_url().'dashboard/list_tujuan/');
        }

        public function deleteTujuan(){
            $idTujuan = $this->uri->segment(3);
            if($idTujuan == null){
                redirect(base_url().'dashboard/list_tujuan/');
            }
            $this->ProductModel->deleteTujuanProduct($idTujuan);
            $this->session->set_flashdata('icon','success');
            $this->session->set_flashdata('title','Success !');
            $this->session->set_flashdata('message','Tujuan Product berhasil dihapus !');
            redirect(base_url().'dashboard/list_tujuan/');
        }

        //category
        public function insertCategoryProduct(){
            $idCategory = htmlspecialchars($_POST['id']);
            $namaCategory = htmlspecialchars($_POST['nama']);
            $nilai = htmlspecialchars($_POST['nilai']);
            if($idCategory == null || $namaCategory == null || $nilai == null){
                $this->session->set_flashdata('icon','warning');
                $this->session->set_flashdata('title','Warning !');
                $this->session->set_flashdata('message','Field Tidak boleh kosong !');
                redirect(base_url().'dashboard/list_category');
                
            }
            $this->ProductModel->insertCategoryProduct($idCategory,$namaCategory,$nilai);
            $this->session->set_flashdata('icon','success');
            $this->session->set_flashdata('title','Success !');
            $this->session->set_flashdata('message','Kategori Product berhasil ditambahkan !');
            redirect(base_url().'dashboard/list_category');

        }

        public function updateCategory(){
            $idCategory = htmlspecialchars($_POST['id']);
            $namaCategory = htmlspecialchars($_POST['nama']);
            $nilai = htmlspecialchars($_POST['nilai']);
            if($idCategory == null || $namaCategory == null || $nilai == null){
                $this->session->set_flashdata('icon','warning');
                $this->session->set_flashdata('title','Warning !');
                $this->session->set_flashdata('message','Field Tidak boleh kosong !');
                redirect(base_url().'dashboard/list_category/');
                
            }
            $this->ProductModel->updateCategory($idCategory,$namaCategory,$nilai);
            $this->session->set_flashdata('icon','success');
            $this->session->set_flashdata('title','Success !');
            $this->session->set_flashdata('message','Kategori Product berhasil diubah !');
            redirect(base_url().'dashboard/list_category/');
        }

        public function deleteCategory(){
            $idCategory = $this->uri->segment(3);
            if($idCategory == null){
                redirect(base_url().'dashboard/list_category/');
            }
            $this->ProductModel->deleteCategoryProduct($idCategory);
            $this->session->set_flashdata('icon','success');
            $this->session->set_flashdata('title','Success !');
            $this->session->set_flashdata('message','Kategory Product berhasil dihapus !');
            redirect(base_url().'dashboard/list_category/');
        }


        //merk
        public function insertMerk(){

            $idMerk = htmlspecialchars($_POST['id']);
            $namaMerk = htmlspecialchars($_POST['nama']);
            $nilai = htmlspecialchars($_POST['nilai']);
            if($idMerk == null || $namaMerk == null || $nilai == null){
                $this->session->set_flashdata('icon','warning');
                $this->session->set_flashdata('title','Warning !');
                $this->session->set_flashdata('message','Field Tidak boleh kosong !');
                redirect(base_url().'dashboard/list_merk');
                
            }
            $this->ProductModel->insertMerkProduct($idMerk,$namaMerk,$nilai);
            $this->session->set_flashdata('icon','success');
            $this->session->set_flashdata('title','Success !');
            $this->session->set_flashdata('message','Merk Product berhasil ditambahkan !');
            redirect(base_url().'dashboard/list_merk');
        }

        public function updateMerk(){
            $idMerk = htmlspecialchars($_POST['id']);
            $namaMerk = htmlspecialchars($_POST['nama']);
            $nilai = htmlspecialchars($_POST['nilai']);
            if($idMerk == null || $namaMerk == null || $nilai == null){
                $this->session->set_flashdata('icon','warning');
                $this->session->set_flashdata('title','Warning !');
                $this->session->set_flashdata('message','Field Tidak boleh kosong !');
                redirect(base_url().'dashboard/list_merk');
                
            }
            $this->ProductModel->updateMerkProduct($idMerk,$namaMerk,$nilai);
            $this->session->set_flashdata('icon','success');
            $this->session->set_flashdata('title','Success !');
            $this->session->set_flashdata('message','Merk Product berhasil diubah !');
            redirect(base_url().'dashboard/list_merk');
        }

        public function deleteMerk(){
            $idMerk = $this->uri->segment(3);
            if($idMerk == null){
                redirect(base_url().'dashboard/list_merk');
            }
            $this->ProductModel->deleteMerkProduct($idMerk);
            $this->session->set_flashdata('icon','success');
            $this->session->set_flashdata('title','Success !');
            $this->session->set_flashdata('message','Merk Product berhasil dihapus !');
            redirect(base_url().'dashboard/list_merk');
        }

        //Rental

        public function confirmRental(){
            $idSewa = $this->uri->segment(3);
            $idPembayaran = "PMB-". mt_rand(10000,99999);

            $data = array(
                "id_pembayaran" => $idPembayaran,
                "id_sewa"       => $idSewa
            );

            $insertPembayaran = $this->PaymentModel->insertPayment($data);
            if($insertPembayaran){
                $this->RentalModel->changeStatusRental($idSewa,1);
                $this->session->set_flashdata('icon','success');
                $this->session->set_flashdata('title','Success !');
                $this->session->set_flashdata('message','Pesanan Berhasil di Konfirmasi !');
                redirect(base_url().'dashboard/list_sewa');
            }


        }

        public function deleteRental(){
            $idSewa = $this->uri->segment(3);
            if($idSewa == null){
                redirect(base_url().'dashboard/list_sewa/');
            }

            $this->RentalModel->deleteRental($idSewa);
            $this->session->set_flashdata('icon','success');
            $this->session->set_flashdata('title','Success !');
            $this->session->set_flashdata('message','Pesanan Berhasil di Hapus !');
            redirect(base_url().'dashboard/list_sewa');
        }

        public function insertPelunasan(){
            $idSewa = $this->input->post('idSewa');
            $jumlahDp =  $this->input->post('JumlahTagihan');
            $nominal = $this->input->post('nominal');
            if($nominal ==  $jumlahDp){
                $foto = $this->_uploadBukti();
                if($foto != null){
                    $this->PaymentModel->insertPelunasan($idSewa,$nominal,$foto,"2");
                    $this->RentalModel->changeStatusRental($idSewa,4);
                    $this->session->set_flashdata('icon','success');
                    $this->session->set_flashdata('title','success !');
                    $this->session->set_flashdata('message','Pembayaran DP berhasil dilakukan !');
                    redirect(base_url()."dashboard/list_transaction");
                }else{
                    $this->session->set_flashdata('icon','warning');
                    $this->session->set_flashdata('title','Warning !');
                    $this->session->set_flashdata('message','Foto bukti tidak boleh kosong !');
                    redirect(base_url()."dashboard/list_transaction/");
                }
            }else{
                $this->session->set_flashdata('icon','warning');
                $this->session->set_flashdata('title','Warning !');
                $this->session->set_flashdata('message','Nominal Pembayaran tidak sama dengan Sisa Tagihan !');
                redirect(base_url()."dashboard/list_transaction/");
            }
        }

        public function insertPembayaran(){
            $idSewa = $this->input->post('idSewa');
            $jumlahDp =  $this->input->post('JumlahTagihan');
            $nominal = $this->input->post('nominal');
            if($nominal == $jumlahDp){
                $foto = $this->_uploadBukti();
                if($foto != null){
                
                    $this->PaymentModel->insertDp($idSewa,$nominal,"1",$foto);
                    $this->RentalModel->changeStatusRental($idSewa,3);
                    $this->session->set_flashdata('icon','success');
                    $this->session->set_flashdata('title','success !');
                    $this->session->set_flashdata('message','Pembayaran DP berhasil dilakukan !');
                    redirect(base_url()."dashboard/list_transaction");
                }else{
                    $this->session->set_flashdata('icon','warning');
                    $this->session->set_flashdata('title','Warning !');
                    $this->session->set_flashdata('message','Foto bukti tidak boleh kosong !');
                    redirect(base_url()."dashboard/list_transaction/");
                }
            
            }else{
                $this->session->set_flashdata('icon','warning');
                $this->session->set_flashdata('title','Warning !');
                $this->session->set_flashdata('message','Nominal Pembayaran tidak sama dengan Jumlah DP !');
                redirect(base_url()."dashboard/list_transaction/");
            }
        }

        public function _uploadBukti(){
            $config['upload_path'] = "./assets/dashboard/img/bukti/";
            $config['allowed_types'] = 'gif|jpg|png|jpeg|';
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);
            if($this->upload->do_upload('foto')){
                $data = array('upload_data' => $this->upload->data());
                $image = $data['upload_data']['file_name'];
    
                return $image;
            }else{
                $this->session->set_flashdata('icon','warning');
                $this->session->set_flashdata('title','Warning !');
                $this->session->set_flashdata('message','Silhahkan Masukan bukti pembayaran yang benar');
                redirect(base_url()."dashboard/list_transaction/");
            }
        }

        public function laporan(){
            $data['laporan'] = $this->PaymentModel->getDataLaporan();
            $data['active_laporan'] = "active";
            $this->load->view("layout/dashboard/header");
            $this->load->view("layout/dashboard/sidebar",$data);
            $this->load->view("layout/dashboard/navbar");
            $this->load->view("layout/dashboard/mobile-menu");
            $this->load->view("dashboard/data/v_laporan",$data);
            $this->load->view("layout/dashboard/footer");
        }

        public function cetak_laporan(){
            $data['laporan'] = $this->PaymentModel->getDataLaporan();
            $this->load->view("dashboard/data/v_cetak_laporan",$data);
        }

    }
    