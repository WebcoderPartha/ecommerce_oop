<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class Cart
{
    protected $db;
    protected $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function real_string($value){
        return mysqli_real_escape_string($this->db->link, $value);
    }

    public function getProductById($id){

        $query  = "SELECT * FROM tbl_product WHERE id = '$id'";
        $result = $this->db->select($query);
        return $result;

    }

    public function checkExistCartProduct($product_id, $session_id){

        $query   = "SELECT * FROM tbl_cart WHERE productID = '$product_id' AND sessionID = '$session_id'";
        $result  = $this->db->select($query);
        return $result;

    }

    public function addToCart($quantity, $id){

        $qty         = $this->fm->validation($quantity);
        $qty         = $this->real_string($qty);

        $productId   = $this->fm->validation($id);
        $productId   = $this->real_string($productId);

        $productInfo = $this->getProductById($productId)->fetch_assoc();

        $productID   = $productInfo['id'];
        $productName = $productInfo['product_name'];
        $price       = $productInfo['price'];
        $image       = $productInfo['image'];
        $sessionId   = session_id();

        $exist_item  = $this->checkExistCartProduct($productId, $sessionId);
        if ($exist_item){
            $cartItem        = $exist_item->fetch_assoc();
            $productID       = $cartItem['productID'];
            $productName     = $cartItem['product_name'];
            $price           = $cartItem['price'];
            $image           = $cartItem['image'];
            $sessionId       = $cartItem['sessionID'];
            $update_quantity = $qty + $cartItem['quantity'];

            $update_query = "UPDATE tbl_cart SET productName = '$productName', price = '$price', quantity = '$update_quantity', image = '$image' WHERE productID = '$productID' AND sessionID = '$sessionId'";
            $updated = $this->db->update($update_query);

            if ($updated){
                header('Location:cart.php');
            }else{
                header('Location:404.php');
            }

        }else{

            $query   = "INSERT INTO tbl_cart (sessionID, productID, productName, price, quantity, image) VALUES ('$sessionId', '$productID', '$productName', '$price', '$qty', '$image')";

            $inserted= $this->db->insert($query);

            if ($inserted){
                header('Location:cart.php');
            }else{
                header('Location:404.php');
            }
        }

    }

    public function getCartItems(){

        $sessionId  = session_id();
        $query      = "SELECT * FROM tbl_cart WHERE sessionID = '$sessionId' ORDER BY id DESC";
        $result     = $this->db->select($query);
        return $result;

    }

    public function updateQuantity($cartid, $qty, $session_id){
        $cartId      = $this->fm->validation($cartid);
        $cartId      = $this->real_string($cartId);
        $quantity   = $this->fm->validation($qty);
        $quantity   = $this->real_string($quantity);
        $sessionId  = $this->fm->validation($session_id);
        $sessionId  = $this->real_string($sessionId);

        $query      = "UPDATE tbl_cart SET quantity = '$quantity' WHERE id = '$cartId' AND sessionID = '$sessionId'";
        $update     = $this->db->update($query);

        if ($update){
            header('Location:cart.php');
        }else{
            header('Location:404.php');
        }

    }

    public function removeCart($cartId, $sessionId){
        $cartid  = $this->fm->validation($cartId);
        $cartid  = $this->real_string($cartid);

        $query   = "DELETE FROM tbl_cart WHERE id = '$cartid' AND sessionID = '$sessionId'";
        $delete  = $this->db->delete($query);
        if ($delete){
            header('Location:cart.php');
        }else{
            header('Location:404.php');
        }

    }



}