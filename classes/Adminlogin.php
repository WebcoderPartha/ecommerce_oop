<?php
include "../lib/Session.php";
Session::checkLogin();
include_once "../lib/Database.php";
include_once "../helpers/Format.php";


class Adminlogin
{

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function adminLogin($username, $password){

        $username = $this->fm->validation($username);
        $password = $this->fm->validation($password);
        $username = mysqli_real_escape_string($this->db->link, $username);
        $password = mysqli_real_escape_string($this->db->link, $password);

        if (empty($username) || empty($password)){
            $loginmsg = "Username or Password must not be empty!";
            return $loginmsg;
        }else{
            $query = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password' limit 1";

            $result = $this->db->select($query);
            if ($result != false){
                $value = $result->fetch_assoc();
                Session::set('userid', $value['id']);
                Session::set('name', $value['name']);
                Session::set('username', $value['username']);
                Session::set('email', $value['email']);
                Session::set('login', true);
                header('Location: dashboard.php');
            }else{
                $loginmsg = "Username or Password not match!";
                return $loginmsg;
            }

        }

    }
}