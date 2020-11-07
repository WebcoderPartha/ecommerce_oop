<?php
    include_once '../lib/Database.php';
    include_once '../helpers/Format.php';

class Brand
{

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public $errors;
    public $success;

    public function checkBrand($brandName){
        $query = "SELECT * FROM tbl_brand WHERE brand_name = '$brandName' limit 1";
        $result = $this->db->select($query);
        return $result;
    }

    public function Store($data){
        $brand_name = $this->fm->validation($data['brand_name']);
        $brand_name = mysqli_real_escape_string($this->db->link, $brand_name);

        if (empty($brand_name)){
            return $this->errors = "<span style='font-size: 18px;color: red'>Brand name must not be empty!</span>";
        }else{
            if (!$this->checkBrand($brand_name) == false){
                return $this->success = "<span style='font-size: 18px;color: #ff0707'>Brand name already exist!</span>";
            }else{
                $query = "INSERT INTO tbl_brand (brand_name) VALUES ('$brand_name')";
                $insert = $this->db->insert($query);
                if ($insert){
                    return $this->success = "<span style='font-size: 18px;color: #04f604'>Brand name added successfully</span>";
                }else{
                    return $this->success = "<span style='font-size: 18px;color: red'>Brand name not added</span>";
                }
            }
        }
    }

    public function getAllBrand(){

        $query  = "SELECT * FROM tbl_brand ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;

    }

    public function Edit($id){

        $brand_id = mysqli_real_escape_string($this->db->link, $id);
        $query = "SELECT * FROM tbl_brand WHERE id = '$brand_id'";
        $result = $this->db->select($query);
        return $result;

    }

    public function Update($request, $id){
        $brand_name = $this->fm->validation($request['brand_name']);
        $brand_name = mysqli_real_escape_string($this->db->link, $brand_name);
        $brand_id = mysqli_real_escape_string($this->db->link, $id);

        if (empty($brand_name)){

            return $this->errors = "<span style='font-size: 18px;color: red'>Brand name must not be empty!</span>";

        }else{

            $query = "UPDATE tbl_brand SET brand_name = '$brand_name' WHERE id = '$brand_id'";
            $update = $this->db->update($query);
            if ($update){
                return $this->success = "<span style='font-size: 18px;color: green'>Brand name updated successfully!</span>";
            }else{
                return $this->success = "<span style='font-size: 18px;color: red'>Brand name not updated!</span>";
            }
        }

    }

    public function Destroy($id){

        $brand_id = mysqli_real_escape_string($this->db->link, $id);
        $query = "DELETE FROM tbl_brand WHERE id = '$brand_id'";
        $delete = $this->db->delete($query);
        if ($delete){
            return $this->success = "<span style='font-size: 18px;color: #04f604'>Brand name deleted successfully</span>";
        }else{
            return $this->success = "<span style='font-size: 18px;color: red'>Brand name not deleted</span>";
        }
    }


}