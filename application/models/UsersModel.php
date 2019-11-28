
<?php 


class UsersModel extends CI_Model
{
    public function insertUsers($data)
    {
        return $this->db->insert("tb_users",$data);
    }

    public function changeProfile($username,$fname,$lname,$email,$telp,$password){
        $sql = "UPDATE tb_users SET nama_depan = ?,nama_belakang = ?,email = ?,nomor_telp = ?,password = ? WHERE username = ?";
        return $this->db->query($sql,array($fname,$lname,$email,$telp,md5($password),$username));
    } 
}
