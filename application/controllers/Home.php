<?php


class Home extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('PaymentModel');
        $this->load->model('ProductModel');
        $this->load->model('RentalModel');
    }

    public function index()
    {   

        $type = $this->session->userdata('fname');
        $data['data_category'] = $this->db->get('tb_category')->result_array();
        $data['data_kualitas'] = $this->db->get('tb_kualitas')->result_array();
        $data['data_tujuan'] = $this->db->get('tb_tujuan')->result_array();
        $data['data_merk'] = $this->db->get('tb_merk')->result_array();
        $data['product'] = $this->ProductModel->getDataProduct();
        $this->load->view('layout/home/header');
        $this->load->view('layout/home/navbar');
        $this->load->view('v_home',$data);
        $this->load->view('layout/home/footer');
    }

    

    public function login(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if($username == null){
            $this->session->set_flashdata('icon','warning');
            $this->session->set_flashdata('title','Warning !');
            $this->session->set_flashdata('message','username tidak boleh kosong');
            redirect(base_url());
        }

        if($password == null){
            $this->session->set_flashdata('icon','warning');
            $this->session->set_flashdata('title','Warning !');
            $this->session->set_flashdata('message','Password tidak boleh kosong');
            redirect(base_url());
        }

        $cekUsers = $this->db->get_where('tb_users',array('username' =>$username))->row_array();
        if($cekUsers == null){
            $this->session->set_flashdata('icon','warning');
            $this->session->set_flashdata('title','Warning !');
            $this->session->set_flashdata('message','User tidak ditemukan');
            redirect(base_url());
        }
    
        if(md5($password) == $cekUsers['password'] && $cekUsers['type'] == 0){
            //session customer
            $this->session->set_userdata('users_id',$cekUsers['id_users']);
            $this->session->set_userdata('email',$cekUsers['email']);
            $this->session->set_userdata('fname',$cekUsers['nama_depan']);
            $this->session->set_userdata('lname',$cekUsers['nama_belakang']);
            $this->session->set_userdata('phone',$cekUsers['nomor_telp']);
            $this->session->set_userdata('customer',true);
            redirect(base_url());
        }else if(md5($password) == $cekUsers['password'] && $cekUsers['type'] == 1){
            //session admin
            $this->session->set_userdata('users_id',$cekUsers['id_users']);
            $this->session->set_userdata('email',$cekUsers['email']);
            $this->session->set_userdata('admin',true);
            redirect(base_url().'dashboard/');
        }else{
            $this->session->set_flashdata('icon','warning');
            $this->session->set_flashdata('title','Warning !');
            $this->session->set_flashdata('message','Email atau Password Salah !');
            redirect(base_url());
      
        }
        

          
    }

    //penyewaan

    public function insertRental(){
        $idSewa = htmlspecialchars($_POST['idSewa']);
        $idUsers = htmlspecialchars($_POST['idUsers']);
        $idProduct = htmlspecialchars($_POST['idProduct']);
        $tglSewa = htmlspecialchars($_POST['tglSewa']);
        $tglPengembalian = htmlspecialchars($_POST['idSewa']);
        $harga = htmlspecialchars($_POST['harga']);
        $rangeRental = getDatesFromRange($tglSewa,$tglPengembalian);
        $biaya = $harga*$rangeRental;
        $status = " ";

        if($idSewa == null || $idUsers == null || $idProduct == null || $tglSewa == null || $tglPengembalian == null || $biaya == null || $status == null){
            $this->session->set_flashdata('icon','warning');
            $this->session->set_flashdata('title','Warning !');
            $this->session->set_flashdata('message','Field tidak boleh kosong !');
            //mental ke halaman tambah penyewaan
        }

        $this->RentalModel->insertRental($idSewa,$idUsers,$idProduct,$tglSewa,$tglPengembalian,$biaya,$status);
        $this->session->set_flashdata('icon','success');
        $this->session->set_flashdata('title','Success !');
        $this->session->set_flashdata('message','Data Penyewaan berhasil disimpan,silahkan tunggu untuk proses pengecekan !');
        //mental ke halaman ...
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

   
}