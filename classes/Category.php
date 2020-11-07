<?php
    include_once '../lib/Database.php';
    include_once '../helpers/Format.php';

class Category
{
    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    // Global Message Variable
    public $error_msg;
    public $success;

    public function insertCategory($data){

        $catname = $this->fm->validation($data['category_name']);
        $catname = mysqli_real_escape_string($this->db->link, $catname);

        if (empty($catname)){
            return $this->error_msg = "<span style='font-size: 10px;color: red'>Category name must not be empty!</span>";
        }else{
            $query = "INSERT INTO tbl_category (category_name) VALUES ('$catname')";
            $result = $this->db->insert($query);
            if ($result){
                return $this->success = "<span style='font-size: 18px;color: green'>".$catname." category added successfully</span>";
            }else{
                return $this->success = "<span style='font-size: 18px;color: red'>Something went wrong!</span>";
            }
        }
    }

    public function allcategory(){

        $query = "SELECT * FROM tbl_category ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;

    }

    public function editcategory($id){

        $query = "SELECT * FROM tbl_category WHERE id = '$id' ";
        $result = $this->db->select($query);
        return $result;

    }

    public function update($data, $id){

            $catname = $this->fm->validation($data['category_name']);
            $catname = mysqli_real_escape_string($this->db->link, $catname);

            if (empty($catname)){
                return $this->error_msg = "<span style='font-size: 10px;color: red'>Category name must not be empty!</span>";
            }else{

                $query = "UPDATE tbl_category SET category_name = '$catname' WHERE id = '$id'";
                $update = $this->db->update($query);
                if ($update){
                    return $this->success = "<span style='font-size: 18px;color: green'>".$catname." category updated successfully</span>";
                }else{
                    return $this->success = "<span style='font-size: 18px;color: red'>Category not updated</span>";
                }
            }

    }


    public function destroy($id){

        $query = "DELETE FROM tbl_category WHERE id = '$id'";
        $delete = $this->db->delete($query);

        if ($delete){

             return $this->success = "<span style='font-size: 18px;color: green'>Category deleted successfully</span>";

        }else{
            return $this->success = "<span style='font-size: 18px;color: red'>Category not deleted</span>";
        }

    }

}