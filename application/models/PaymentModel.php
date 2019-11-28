<?php

    class PaymentModel extends CI_Model
    {
        public function getAllDataPayment(){
            $sql = "SELECT id_pembayaran,tb_pembayaran.id_sewa,pembayaran_awal,pembayaran_akhir,status_pembayaran,tb_sewa.id_users
                           tb_sewa.id_product,tgl_sewa,tgl_pengembalian,biaya,status_pembayaran,nama_product,harga,nama_kualitas,
                           nama_tujuan,berat,kedalaman,fname,lname
                    FROM   tb_pembayaran,tb_penyewaan,tb_product,tb_kualitas,tb_tujuan,tb_users
                    WHERE  tb_pembayaran.id_sewa = tb_penyewaan.id_sewa AND
                           tb_penyewaan.id_users = tb_users.id_users AND
                           tb_product.id_kualitas = tb_kualitas.id_kualitas AND
                           tb_product.id_tujuan = tb_tujuan.id_tujuan AND
                           tb_penyewaan.id_product = tb_product.id_product";
            return $this->db->query($sql)->result_array();
        }

        public function getDataPaymentByIdUsers($idUsers){
            $sql = "SELECT id_pembayaran,tb_pembayaran.id_sewa,pembayaran_awal,pembayaran_akhir,status_pembayaran,tb_sewa.id_users
                            tb_sewa.id_product,tgl_sewa,tgl_pengembalian,biaya,status_pembayaran,nama_product,harga,nama_kualitas,
                            nama_tujuan,berat,kedalaman,fname,lname
                    FROM   tb_pembayaran,tb_penyewaan,tb_product,tb_kualitas,tb_tujuan,tb_users
                    WHERE  tb_pembayaran.id_sewa = tb_penyewaan.id_sewa AND
                            tb_penyewaan.id_users = tb_users.id_users AND
                            tb_product.id_kualitas = tb_kualitas.id_kualitas AND
                            tb_product.id_tujuan = tb_tujuan.id_tujuan AND
                            tb_penyewaan.id_product = tb_product.id_product AND
                            tb_penyewaan.id_users = ?";
            return $this->db->query($sql,$idUsers)->result_array();
        }

        public function insertPayment($data){
            return $this->db->insert('tb_pembayaran',$data);
        }

        public function insertDp($id,$nominal,$status,$foto){
            $sql = "UPDATE tb_pembayaran SET pembayaran_awal = ?,status_pembayaran = ?,bukti = ? WHERE id_sewa = ?";
            return $this->db->query($sql,array($nominal,$status,$foto,$id));
        }

        public function insertPelunasan($idSewa,$nominal,$foto,$status){
            $sql = "UPDATE tb_pembayaran SET pembayaran_akhir = ?,status_pembayaran = ?,bukti = ? WHERE id_sewa = ?";
            return $this->db->query($sql,array($nominal,$status,$foto,$idSewa));
        }

        public function deletePembayaran($idSewa){
            $sql = "DELETE from tb_pembayaran WHERE id_sewa = ?";
            return $this->db->query($sql,$idSewa);
        }

        public function getDataTransaksi(){
            $sql = "SELECT nama_depan,nama_belakang,tgl_sewa,tgl_pengembalian,biaya_dp,biaya,pembayaran_awal,pembayaran_akhir,                     status_pembayaran,bukti,nama_product,tb_pembayaran.id_sewa
                    FROM tb_pembayaran,tb_penyewaaan,tb_users,tb_product 
                    WHERE tb_pembayaran.id_sewa = tb_penyewaaan.id_sewa AND
                          tb_penyewaaan.id_users = tb_users.id_users AND
                          tb_penyewaaan.id_product = tb_product.id_product ORDER BY status_pembayaran";
            return $this->db->query($sql)->result_array();
        }
        public function getDataLaporan(){
            $sql = "SELECT nama_depan,nama_belakang,tgl_sewa,tgl_pengembalian,biaya_dp,biaya,pembayaran_awal,pembayaran_akhir,                     status_pembayaran,bukti,nama_product,tb_pembayaran.id_sewa
                    FROM tb_pembayaran,tb_penyewaaan,tb_users,tb_product 
                    WHERE tb_pembayaran.id_sewa = tb_penyewaaan.id_sewa AND
                          tb_penyewaaan.id_users = tb_users.id_users AND
                          tb_penyewaaan.id_product = tb_product.id_product AND
                          status_penyewaan = ?";
            return $this->db->query($sql,"4")->result_array();
        }

        public function getsumSalary(){
            $sql = "SELECT SUM(biaya)as jumlah from tb_penyewaaan WHERE status_penyewaan = ?";
            return $this->db->query($sql,"4")->row_array();
        }
    }
    