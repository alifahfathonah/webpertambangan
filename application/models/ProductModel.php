
<?php 

    class ProductModel extends CI_Model
    {
        public function getDataProduct(){
            $sql = "SELECT id_product,nama_product,harga,nama_kualitas,nama_tujuan,tb_kualitas.nilai,                                               tb_tujuan.nilai,berat,kedalaman,nama_merk,tb_merk.id_merk,nama_category,                                                tb_category.id_category,foto
                        FROM tb_product,tb_kualitas,tb_tujuan,tb_merk,tb_category
                        WHERE 
                            tb_kualitas.id_kualitas = tb_product.id_kualitas AND
                            tb_tujuan.id_tujuan = tb_product.id_tujuan AND
                            tb_category.id_category = tb_product.id_category AND
                            tb_merk.id_merk = tb_product.id_merk LIMIT 4
                            ";
            return $this->db->query($sql)->result_array();
        }
        public function getDataProductTrain(){
            $sql = "SELECT id_product,nama_product,foto,harga,tb_kualitas.nilai as n_k,
            tb_tujuan.nilai as n_t,tb_category.nilai as n_c,tb_merk.nilai as n_m,berat,kedalaman
                        FROM tb_product,tb_kualitas,tb_tujuan,tb_merk,tb_category
                        WHERE 
                            tb_kualitas.id_kualitas = tb_product.id_kualitas AND
                            tb_tujuan.id_tujuan = tb_product.id_tujuan AND
                            tb_category.id_category = tb_product.id_category AND
                            tb_merk.id_merk = tb_product.id_merk
                            ";
            return $this->db->query($sql)->result_array();
        }
      
        public function getListDataProduct($number,$offset){
            $sql = "SELECT id_product,nama_product,harga,nama_kualitas,nama_tujuan,tb_kualitas.nilai,                                               tb_tujuan.nilai,berat,kedalaman,nama_merk,tb_merk.id_merk,nama_category,                                                tb_category.id_category,foto
                        FROM tb_product,tb_kualitas,tb_tujuan,tb_merk,tb_category
                        WHERE 
                            tb_kualitas.id_kualitas = tb_product.id_kualitas AND
                            tb_tujuan.id_tujuan = tb_product.id_tujuan AND
                            tb_category.id_category = tb_product.id_category AND
                            tb_merk.id_merk = tb_product.id_merk  LIMIT $offset,$number
                            ";
            
            return $this->db->query($sql)->result_array();
        }

        public function getListDataProductByCategory($number,$offset,$idCategory){
            $sql = "SELECT id_product,nama_product,harga,nama_kualitas,nama_tujuan,tb_kualitas.nilai,                                               tb_tujuan.nilai,berat,kedalaman,nama_merk,tb_merk.id_merk,nama_category,                                                tb_category.id_category,foto
                        FROM tb_product,tb_kualitas,tb_tujuan,tb_merk,tb_category
                        WHERE 
                            tb_kualitas.id_kualitas = tb_product.id_kualitas AND
                            tb_tujuan.id_tujuan = tb_product.id_tujuan AND
                            tb_category.id_category = tb_product.id_category AND
                            tb_merk.id_merk = tb_product.id_merk AND
                            tb_product.id_category = ? LIMIT $offset,$number
                            ";

            return $this->db->query($sql,$idCategory)->result_array();
        }

        public function getAllDataProduct(){
            $sql = "SELECT id_product,nama_product,harga,nama_kualitas,nama_tujuan,tb_kualitas.nilai,                                               tb_tujuan.nilai,berat,kedalaman,nama_merk,tb_merk.id_merk,nama_category,                                                tb_category.id_category,foto
                        FROM tb_product,tb_kualitas,tb_tujuan,tb_merk,tb_category
                        WHERE 
                            tb_kualitas.id_kualitas = tb_product.id_kualitas AND
                            tb_tujuan.id_tujuan = tb_product.id_tujuan AND
                            tb_category.id_category = tb_product.id_category AND
                            tb_merk.id_merk = tb_product.id_merk 
                            ";

            return $this->db->query($sql)->result_array();
        }

        public function getDataProductById($idProduct){
            $sql = "SELECT id_product,nama_product,harga,nama_kualitas,nama_tujuan,tb_kualitas.nilai,                                               tb_tujuan.nilai,berat,kedalaman,nama_merk,tb_merk.id_merk,nama_category,                                                tb_category.id_category,foto
                        FROM tb_product,tb_kualitas,tb_tujuan,tb_merk,tb_category
                        WHERE 
                            tb_kualitas.id_kualitas = tb_product.id_kualitas AND
                            tb_tujuan.id_tujuan = tb_product.id_tujuan AND
                            tb_category.id_category = tb_product.id_category AND
                            tb_merk.id_merk = tb_product.id_merk AND
                            tb_product.id_product = ?
                            ";
            return $this->db->query($sql,$idProduct)->result_array();
        }

        public function insertProduct($idProduct,$namaProduct,$harga,$idKualitas,$idMerk,$idTujuan,$idCategory,$berat,$kedalaman,$urlImage){
            $sql = "INSERT INTO tb_product VALUES(?,?,?,?,?,?,?,?,?,?)";
            return $this->db->query($sql,array($idProduct,$namaProduct,$harga,$idKualitas,$idMerk,$idTujuan,$idCategory,$berat,$kedalaman,$urlImage));
        }

        public function updateProduct($id,$nama,$harga,$kualitas,$merk,$tujuan,$category,$berat,$kedalaman,$foto){
            $sql = "UPDATE tb_product SET nama_product = ?,harga= ?,id_kualitas = ?, id_merk = ?, id_tujuan = ?,id_category = ?,                berat = ?,kedalaman = ?,foto = ? WHERE id_product = ?";
            return $this->db->query($sql,array($nama,$harga,$kualitas,$merk,$tujuan,$category,$berat,$kedalaman,$foto,$id));
        }

        public function deleteProduct($idProduct){
            $sql = "DELETE from tb_product WHERE id_product = ?";
            return $this->db->query($sql,$idProduct);
        }

        public function insertTujuanProduct($idTujuan,$namaTujuan,$nilai){
            $sql = "INSERT INTO tb_tujuan VALUES(?,?,?)";
            return $this->db->query($sql,array($idTujuan,$namaTujuan,$nilai));
        }

        public function insertKualitasProduct($idKualitas,$namaKualitas,$nilai){
            $sql = "INSERT INTO tb_kualitas VALUES(?,?,?)";
            return $this->db->query($sql,array($idKualitas,$namaKualitas,$nilai));
        }
        
        public function insertMerkProduct($idMerk,$namaMerk,$nilai){
            $sql = "INSERT INTO tb_merk VALUES(?,?,?)";
            return $this->db->query($sql,array($idMerk,$namaMerk,$nilai));
        }

        public function updateMerkProduct($idMerk,$namaMerk,$nilai){
            $sql = "UPDATE tb_merk SET nama_merk = ?,nilai = ? WHERE id_merk = ?";
            return $this->db->query($sql,array($namaMerk,$nilai,$idMerk));
        }

        public function deleteMerkProduct($idMerk){
            $sql = "DELETE from tb_merk WHERE id_merk = ?";
            return $this->db->query($sql,$idMerk);
        }

        public function insertCategoryProduct($idCategory,$namaCategory,$nilai){
            $sql = "INSERT INTO tb_category VALUES(?,?,?)";
            return $this->db->query($sql,array($idCategory,$namaCategory,$nilai));
        }

        public function updateCategory($idCategory,$namaCategory,$nilai){
            $sql = "UPDATE tb_category SET nama_category = ?,nilai = ? WHERE id_category = ?";
            return $this->db->query($sql,array($namaCategory,$nilai,$idCategory));
        }

        public function deleteCategoryProduct($idCategory){
            $sql = "DELETE from tb_category WHERE id_category = ?";
            return $this->db->query($sql,$idCategory);
        }
        
        public function updateTujuanProduct($idTujuan,$namaTujuan,$nilai){
            $sql = "UPDATE tb_tujuan SET nama_tujuan = ?,nilai = ? WHERE id_tujuan = ?";
            return $this->db->query($sql,array($namaTujuan,$nilai,$idTujuan));
        }

        public function deleteTujuanProduct($idTujuan){
            $sql = "DELETE from tb_tujuan WHERE id_tujuan = ?";
            return $this->db->query($sql,$idTujuan);
        }

        public function updateKualitasProduct($idKualitas,$namaKualitas,$nilai){
            $sql = "UPDATE tb_kualitas SET nama_kualitas = ?,nilai = ? WHERE id_kualitas = ?";
             return $this->db->query($sql,array($namaKualitas,$nilai,$idKualitas));
        }

        public function deleteKualitasProduct($idKualitas){
            $sql = "DELETE from tb_kualitas WHERE id_kualitas = ?";
            return $this->db->query($sql,$idKualitas);
        }
    }
    