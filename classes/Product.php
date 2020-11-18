<?php
include_once '../lib/Database.php';
include_once '../helpers/Format.php';

class Product
{

    protected $db;
    protected $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public $success;
    public $error;
    public $error_prdc;
    public $error_cat;
    public $error_bnd;
    public $error_dtls;
    public $error_pric;
    public $error_img;

    public function store($request, $file){

        $product_name = $this->fm->validation($request['product_name']);
        $cat_id       = $this->fm->validation($request['cat_id']);
        $brand_id     = $this->fm->validation($request['brand_id']);
        $details      = $this->fm->validation($request['details']);
        $price        = $this->fm->validation($request['price']);
        $type         = $this->fm->validation($request['type']);

        $product_name = mysqli_real_escape_string($this->db->link, $product_name);
        $cat_id       = mysqli_real_escape_string($this->db->link, $cat_id);
        $brand_id     = mysqli_real_escape_string($this->db->link, $brand_id);
        $details      = mysqli_real_escape_string($this->db->link, $details);
        $price        = mysqli_real_escape_string($this->db->link, $price);
        $type         = mysqli_real_escape_string($this->db->link, $type);

        // File
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_tmp = $file['image']['tmp_name'];
        $div = explode('.', $file_name);
        $extension = strtolower(end($div));
        $img = time().'.'.$extension;
        $upload_image = "uploads/".$img;

        if (empty($product_name)){
            return $this->error_prdc = "<span style='font-size: 18px;color: red'>Product name required!</span>";
        }
        if(empty($cat_id)){
            return $this->error_cat  = "<span style='font-size: 18px;color: red'>Category is required!</span>";
        }
        if(empty($brand_id)){
            return $this->error_bnd  = "<span style='font-size: 18px;color: red'>Brand is required!</span>";
        }
        if(empty($details)){
            return $this->error_dtls = "<span style='font-size: 18px;color: red'>Product details is required!</span>";
        }
        if(empty($price)){
            return $this->error_pric = "<span style='font-size: 18px;color: red'>Price is required!</span>";
        }
        if (!empty($type)){
            return $this->error      = "<span style='font-size: 18px;color: red'>Type is required!</span>";
        }


        if (empty($file_name)){
            return $this->error_img = "<span style='font-size: 18px;color: red'>Image is required!</span>";
        }elseif($file_size > 1234567){
            return $this->error_img = "<span style='color:red'>Image size should be less then 1 KB!</span>";
        }elseif(in_array($extension,$permited) === false){
            return $this->error_img = "<span style='color:red'>You can upload only".implode(',', $permited)."</span>";
        }else{

            move_uploaded_file($file_tmp, $upload_image);
            $query = "INSERT INTO tbl_product(product_name, cat_id, brand_id, details, price, image, type) VALUES ('$product_name', '$cat_id', '$brand_id', '$details', '$price', '$upload_image', '$type')";
                $result = $this->db->insert($query);

            if ($result){
                return $this->success = "<span style='color:green'>Product inserted successfully</span>";
            }else{
                return $this->success = "<span style='color:red'>Product Not Inserted</span>";
            }
        }

    }


    public function getallProudct(){
        // INNER JOIN
//        $query = "SELECT tbl_product.* , tbl_category.category_name , tbl_brand.brand_name FROM tbl_product INNER JOIN tbl_category ON tbl_product.cat_id = tbl_category.id INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.id ORDER BY id DESC";

        // Alias
        $query = "SELECT p.*, c.category_name, b.brand_name FROM tbl_product AS p, tbl_category AS c, tbl_brand AS b WHERE p.cat_id = c.id AND p.brand_id = b.id ORDER BY p.id DESC";

        $result = $this->db->select($query);
        return $result;
    }


}