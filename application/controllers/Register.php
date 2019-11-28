<?php 


class Register extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->model('UsersModel');
    }
    public function index(){
        $this->load->view('v_register');
    }    


    public function prosesRegister(){
        $generateID = date("s")+rand(0,100);
        $idUsers = "USR-".$generateID;

    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $lName = $_POST['lname'];
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = md5($_POST['password']);
        $c_password = md5($_POST['confirm_password']);
        $type = 0;
        $cekUsers = $this->db->get_where('tb_users',array('email' =>$email))->num_rows();
        
        if(empty($fname)){
            $this->session->set_flashdata('icon','warning');
            $this->session->set_flashdata('title','Warning !');
            $this->session->set_flashdata('message','Nama Depan tidak boleh kosong !');
            redirect(base_url().'register/');
        }
        if(empty($lName)){
            $this->session->set_flashdata('icon','warning');
            $this->session->set_flashdata('title','Warning !');
            $this->session->set_flashdata('message','Nama Belakang tidak boleh kosong !');
            redirect(base_url().'register/');
        }
        if(empty($email)){
            $this->session->set_flashdata('icon','warning');
            $this->session->set_flashdata('title','Warning !');
            $this->session->set_flashdata('message','Email tidak boleh kosong !');
            redirect(base_url().'register/');
        }
        if(empty($phone)){
            $this->session->set_flashdata('icon','warning');
            $this->session->set_flashdata('title','Warning !');
            $this->session->set_flashdata('message','No Telp tidak boleh kosong !');
            redirect(base_url().'register/');
        }
        if(empty($password)){
            $this->session->set_flashdata('icon','warning');
            $this->session->set_flashdata('title','Warning !');
            $this->session->set_flashdata('message','Password tidak boleh kosong !');
            redirect(base_url().'register/');
        }
        if($password != $c_password){
            $this->session->set_flashdata('icon','warning');
            $this->session->set_flashdata('title','Warning !');
            $this->session->set_flashdata('message','Konfirmasi Password tidak sama !');
            redirect(base_url().'register/');
        }
        if($cekUsers >= 1){
            $this->session->set_flashdata('icon','warning');
            $this->session->set_flashdata('title','Warning !');
            $this->session->set_flashdata('message','Email sudah terdaftar !');
            redirect(base_url().'register/');
        }
        
    
    if(!empty($lName)&&!empty($fname)&&!empty($phone)&&!empty($password) && $password == $c_password && $cekUsers ==0){
        $data = array(
            "id_users"=>$idUsers,
            "nama_depan"=>$lName,
            "nama_belakang"=>$fname,
            "email"=>$email,
            "nomor_telp"=>$phone,
            "password"=>$password,
            "username"=>$username
        );
        $insertProcress = $this->UsersModel->insertUsers($data);
        if($insertProcress){
            $this->session->set_flashdata('icon','success');
            $this->session->set_flashdata('title','Success !');
            $this->session->set_flashdata('message','Pendaftaran Berhasil,Silahkan Log in !');
            redirect(base_url().'register/');
        }else{
            $this->session->set_flashdata('icon','warning');
            $this->session->set_flashdata('title','Warning !');
            $this->session->set_flashdata('message','Pendaftaran Gagal !');
            redirect(base_url().'register/');
        }
    }
    }else{
        redirect(base_url()."register");
    }
    }
}
