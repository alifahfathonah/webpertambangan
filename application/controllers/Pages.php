<?php 

require_once FCPATH.'vendor/autoload.php';
use Phpml\Math\Distance\Euclidean;
use Phpml\Classification\KNearestNeighfbors;
use Phpml\Metric\ClassificationReport;
use Phpml\Metric\Accuracy;
use Phpml\Metric\ConfusionMatrix;
use Phpml\Dataset\CsvDataset;
use Phpml\Dataset\ArrayDataset;
use Phpml\Classification\KNearestNeighbors;
class Pages extends CI_Controller{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProductModel');
        $this->load->model('RentalModel');
        $this->load->model('PaymentModel');
        $this->load->model('UsersModel');
    }

    public function index(){
        redirect(base_url());
    }
    public function about(){
        $this->load->view("layout/home/header");
        $this->load->view("layout/home/navbar");
        $this->load->view("v_about");
        $this->load->view("layout/home/footer");
    }

  
    public function listProduct(){
        $idCategory = $this->uri->segment(3);
        $page = $this->uri->segment(4);
        if($page == null){
            $page = 0;
        }
        if($idCategory == null){
            $data['active_all'] = "active";
            $totalProduct = count($this->db->get('tb_product')->result_array());
            $data['product'] = $this->ProductModel->getListDataProduct('4',$page);
        }

        if($idCategory == "KTG-34331"){
            $data['active_1'] = "active";
            $totalProduct = count($this->db->get('tb_product')->result_array());
            $data['product'] = $this->ProductModel->getListDataProductByCategory('4',$page,$idCategory);
        }

        if($idCategory == "KTG-37833"){
            $data['active_2'] = "active";
            $totalProduct = count($this->db->get_where('tb_product',array('id_category' => $idCategory))->result_array());
            $data['product'] = $this->ProductModel->getListDataProductByCategory('4',$page,$idCategory);
        }

        if($idCategory == "KTG-40279"){
            $data['active_3'] = "active";
            $totalProduct = count($this->db->get_where('tb_product',array('id_category' => $idCategory))->result_array());
            $data['product'] = $this->ProductModel->getListDataProductByCategory('4',$page,$idCategory);
        }

        if($idCategory == "KTG-42021"){
            $data['active_4'] = "active";
            $totalProduct = count($this->db->get_where('tb_product',array('id_category' => $idCategory))->result_array());
            $data['product'] = $this->ProductModel->getListDataProductByCategory('4',$page,$idCategory);
        }

       
        $data['category'] = $this->db->get('tb_category')->result_array();
       
        $config['base_url'] = base_url().'pages/listproduct/';
        $config['total_rows'] = $totalProduct;
        $config['per_page'] = 4;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['next_tag_open'] = '<li style="margin-left:5px">';
        $config['next_tag_close'] = '</li'>
        $config['prev_tag_open'] = '<li style="margin-left:5px">';
        $config['prev_tag_close'] ='</li>';
        $config['cur_tag_open'] = '<li style="margin-left:5px" class="active"><span>';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li style="margin-left:5px">';
        $config['num_tag_close'] = '</li>';
       
       
        $this->pagination->initialize($config);
        $this->load->view("layout/home/header");
        $this->load->view("layout/home/navbar");
        $this->load->view("v_list_product",$data);
        $this->load->view("layout/home/footer");
    }

    public function contact(){
        $this->load->view("layout/home/header");
        $this->load->view("layout/home/navbar");
        $this->load->view("v_contact");
        $this->load->view("layout/home/footer");
    }

    public function singleProduct(){
        $idProduct = $this->uri->segment(3);
        $data['detail'] = $this->ProductModel->getDataProductById($idProduct);
        $this->load->view("layout/home/header");
        $this->load->view("layout/home/navbar");
        $this->load->view("v_single_product",$data);
        $this->load->view("layout/home/footer");
    }




    public function checkout(){
        $product['product_id'] = $this->uri->segment(3);
        $product['price']= $this->db->select("harga")->get_where('tb_product',array("id_product"=>$product['product_id']))->result_array();
        if($this->session->userdata("admin")){
            redirect(base_url());
        }
        if(!$this->session->userdata('customer')){
            redirect(base_url());
        }
        $this->load->view("layout/home/header");
        $this->load->view("layout/home/navbar");
        $this->load->view("v_checkout",$product);
        $this->load->view("layout/home/footer");
         
    }


    public function proses_checkout(){
        $idProduct = $_POST['id_product'];
        $idRental = "SW"+date('s')+rand(0,100);
        $idUser = $this->session->userdata('users_id');
        $from = $_POST['from'];
        $to=$_POST['to'];
        $address = $_POST['address'];
        $addressPT = $_POST['address_pt'];
        $city = $_POST['city'];
        $zipcode =$_POST['zipcode'];  
        $total =$_POST['total'];
        $biayaDp = $total*0.3;  
        
        if(!empty($address) && !empty($from) && !empty($to) && !empty($city) && !empty($zipcode)){
            $data = array(
                "id_sewa"=>$idRental,
                "id_users"=>$idUser,
                "id_product"=>$idProduct,
                "tgl_sewa"=>$from,
                "tgl_pengembalian"=>$to,
                "alamat"=>$address,
                "alamat_pt"=>$addressPT,
                "kota"=>$city,
                "kode_pos"=>$zipcode,
                "biaya" =>$total,
                "biaya_dp" => $biayaDp
            );
            $this->RentalModel->insertRentalData($data);
            $this->session->set_flashdata('icon','success');
            $this->session->set_flashdata('title','success !');
            $this->session->set_flashdata('message','Sukes !');
            redirect(base_url()."pages/list_transaction");
        }else{
            $this->session->set_flashdata('icon','warning');
            $this->session->set_flashdata('title','Warning !');
            $this->session->set_flashdata('message','Field tidak boleh kosong !');
            redirect(base_url()."pages/checkout/".$idProduct);
        }
        if(isset($_POST['checkout'])){
        }else{
            redirect(base_url());
        }
    }


    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function list_transaction(){
        $idUser = $this->session->userdata('users_id');
        $data['transaction'] = $this->RentalModel->getDataRentalByUsersId($idUser);
        $data = $this->RentalModel->getDataRentalByUsersId($idUser);
        $arrayBaru = array();
        foreach($data as $dataBaru){
            $tglSewa = $dataBaru["tgl_sewa"];
            $tglPengembalian = $dataBaru['tgl_pengembalian'];
            $range = $this->getDatesFromRange($tglSewa,$tglPengembalian);
            $arr = $dataBaru;
            $arr += ['range' =>count($range)-1];
            array_push($arrayBaru,$arr);
        }

        $data['transaction2'] = $arrayBaru;
    
        $this->load->view("layout/home/header");
        $this->load->view("layout/home/navbar");
        $this->load->view("v_list_transaction",$data);
        $this->load->view("layout/home/footer");
    }

    public function deleteRental(){
        $idSewa = $this->uri->segment(3);
        if($idSewa == null){
            redirect(base_url().'pages/list_transaction/');
        }

        $this->RentalModel->deleteRental($idSewa);
        $this->session->set_flashdata('icon','success');
            $this->session->set_flashdata('title','success !');
            $this->session->set_flashdata('message','Pesanan Berhasil di Batalkan');
            redirect(base_url()."pages/list_transaction");
    }

    public function insertPembayaran(){
        $idSewa = $this->input->post('idSewa');
        $jumlahDp =  $this->input->post('jumlahDP');
        $nominal = $this->input->post('nominal');
        if($nominal == $jumlahDp){
            $foto = $this->_uploadImage();
            if($foto != null){
               
                $this->PaymentModel->insertDp($idSewa,$nominal,"1",$foto);
                $this->RentalModel->changeStatusRental($idSewa,3);
                $this->session->set_flashdata('icon','success');
                $this->session->set_flashdata('title','success !');
                $this->session->set_flashdata('message','Pembayaran DP berhasil dilakukan !');
                redirect(base_url()."pages/list_transaction");
            }else{
                $this->session->set_flashdata('icon','warning');
                $this->session->set_flashdata('title','Warning !');
                $this->session->set_flashdata('message','Foto bukti tidak boleh kosong !');
                redirect(base_url()."pages/list_transaction/");
            }
         
        }else{
            $this->session->set_flashdata('icon','warning');
            $this->session->set_flashdata('title','Warning !');
            $this->session->set_flashdata('message','Nominal Pembayaran tidak sama dengan Jumlah DP !');
            redirect(base_url()."pages/list_transaction/");
        }

    }

    public function insertPelunasan(){
        $idSewa = $this->input->post('idSewa');
        $jumlahDp =  $this->input->post('jumlahDP');
        $nominal = $this->input->post('nominal');
        if($nominal ==  $jumlahDp){
            $foto = $this->_uploadImage();
            if($foto != null){
                $this->PaymentModel->insertPelunasan($idSewa,$nominal,$foto,"2");
                $this->RentalModel->changeStatusRental($idSewa,4);
                $this->session->set_flashdata('icon','success');
                $this->session->set_flashdata('title','success !');
                $this->session->set_flashdata('message','Pembayaran DP berhasil dilakukan !');
                redirect(base_url()."pages/list_transaction");
            }else{
                $this->session->set_flashdata('icon','warning');
                $this->session->set_flashdata('title','Warning !');
                $this->session->set_flashdata('message','Foto bukti tidak boleh kosong !');
                redirect(base_url()."pages/list_transaction/");
            }
        }else{
            $this->session->set_flashdata('icon','warning');
            $this->session->set_flashdata('title','Warning !');
            $this->session->set_flashdata('message','Nominal Pembayaran tidak sama dengan Sisa Tagihan !');
            redirect(base_url()."pages/list_transaction/");
        }
    }

    public function _uploadImage(){
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
            redirect(base_url()."pages/list_transaction/");
        }
    }

    public function deletePenyewaan(){
        $idSewa = $this->uri->segment(3);
        if($idSewa == null){
            redirect(base_url().'pages/list_transaction/');
        }
        $this->PaymentModel->deletePembayaran($idSewa);
        $this->RentalModel->deleteRental($idSewa);
        $this->session->set_flashdata('icon','success');
        $this->session->set_flashdata('title','success !');
        $this->session->set_flashdata('message','Data Pesanan Berhasil dihapus !');
        redirect(base_url()."pages/list_transaction");
    
     }

    
    public function search_recommended(){
        $labels = array();
        $trainData = $this->ProductModel->getDataProductTrain();
        foreach($trainData as $key=> $index){
            $labels[$key]= $index['nama_product'];
        }
        $dataset = new ArrayDataset($trainData,$labels);
        $dataset->removeColumns([null]);
        $dataset->removeColumns([0,1,2]);
        $samples = $dataset->getSamples();
        $labels = $dataset->getTargets();   
        $quality = $_POST['kualitas'];
        $merk = $_POST['merk'];
        $purpose = $_POST['tujuan'];
        $category = $_POST['category'];
        $deep = $_POST['kedalaman'];
        $price = $_POST['harga'];
        $weight = $_POST['berat'];
        $k = $_POST['paramsk'];

        $predictLabels;
        for($i=0;$i<count($samples);$i++){
            $classifier = new KNearestNeighbors($k);
            $classifier->train($samples,$labels);
            $predict = $classifier->predict([$samples[$i]]);
            $predictLabels[$i] = $predict[0];
        }
    
        $report = new ClassificationReport($labels, $predictLabels);
        $data['accuracy'] = Accuracy::score($labels, $predictLabels)*100;
        $data['average'] = $report->getAverage();
        $input = [$price,$quality,$merk,$purpose,$category,$weight,$deep];
        $newData = array();
        $euclidean = new Euclidean();
        for($i =0 ;$i<=count($samples)-1; $i++){
            $distance = $euclidean->distance($samples[$i], $input);
            $newData [$i]["distance"] = round($distance,2);
            $newData [$i]["data"] = $trainData[$i]; 
        }
        $data['recommend'] = $newData;
        sort($data['recommend']);
        $this->load->view("layout/home/header");
        $this->load->view("layout/home/navbar");
        $this->load->view("v_result_recommend",$data);
        $this->load->view("layout/home/footer");
    }
    public function getDatesFromRange($start, $end, $format = 'Y-m-d') {
        $array = array();
        $interval = new DateInterval('P1D');
    
        $realEnd = new DateTime($end);
        $realEnd->add($interval);
    
        $period = new DatePeriod(new DateTime($start), $interval, $realEnd);
    
        foreach($period as $date) { 
            $array[] = $date->format($format); 
        }
    
        return $array;
    }


    public function profile(){
        $username = $this->session->userdata('users_id');
        $data['profile'] = $this->db->get_where('tb_users',array('id_users' => $username))->result_array();
        $this->load->view("layout/home/header");
        $this->load->view("layout/home/navbar");
        $this->load->view("v_profile",$data);
        $this->load->view("layout/home/footer");
    }

    public function changeProfile(){
        $username = htmlspecialchars($_POST['username']);
        $fname = htmlspecialchars($_POST['fname']);
        $lname = htmlspecialchars($_POST['lname']);
        $email = htmlspecialchars($_POST['email']);
        $telp = htmlspecialchars($_POST['telp']);
        $password = htmlspecialchars($_POST['password']);
        $confirmPassword = htmlspecialchars($_POST['confirmPassword']);

        if($username == null || $fname == null || $lname == null || $email == null || $telp==null || $password ==null || $confirmPassword == null){
            $this->session->set_flashdata('icon','warning');
            $this->session->set_flashdata('title','Warning !');
            $this->session->set_flashdata('message','Field Tidak boleh kosong');
            redirect(base_url()."pages/profile/");
        }

        if($password != $confirmPassword){
            $this->session->set_flashdata('icon','warning');
            $this->session->set_flashdata('title','Warning !');
            $this->session->set_flashdata('message','Konfirmasi password harus sama !');
            redirect(base_url()."pages/profile/");
        }

        $this->UsersModel->changeProfile($username,$fname,$lname,$email,$telp,$password);
        $this->session->set_flashdata('icon','success');
        $this->session->set_flashdata('title','success !');
        $this->session->set_flashdata('message','Profile berhasil di ubah !');
        redirect(base_url()."pages/profile");
    }
}


