<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class Customer
{
    protected $db;
    protected $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }


    public function mysqlRealString($value){
        $string =  mysqli_real_escape_string($this->db->link, $value);
        return $string;
    }

    public function checkEmail($email){
        $query = "SELECT * FROM tbl_customer WHERE email = '$email' LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }

    public function customerRegister($data){

        $name       = $this->fm->validation($data['name']);
        $name       = $this->mysqlRealString($name);
        $city       = $this->fm->validation($data['city']);
        $city       = $this->mysqlRealString($city);
        $zip        = $this->fm->validation($data['zip']);
        $zip        = $this->mysqlRealString($zip);
        $email      = $this->fm->validation($data['email']);
        $email      = $this->mysqlRealString($email);
        $address    = $this->fm->validation($data['address']);
        $address    = $this->mysqlRealString($address);
        $country    = $this->fm->validation($data['country']);
        $country    = $this->mysqlRealString($country);
        $phone      = $this->fm->validation($data['phone']);
        $phone      = $this->mysqlRealString($phone);
        $password   = $this->fm->validation($data['password']);
        $password   = $this->mysqlRealString(md5($password));

        if ( empty($name) ||
             empty($city) ||
             empty($zip) ||
             empty($email) ||
             empty($address) ||
             empty($country) ||
             empty($phone) ||
             empty($password) ){
            return "<span style='color: red'>Field must not be empty!</span>";
        }else{
            if ($this->checkEmail($email) !== false){
                return "<span style='color: red'>Already registered with this email. Please use another email!</span>";
            }else{
                $query = "INSERT INTO tbl_customer (name, city, zip, email, address, country, phone, password) VALUES ('$name', '$city', '$zip', '$email', '$address', '$country', '$phone', '$password')";
                $result = $this->db->insert($query);

                if ($result){
                    return "<span style='color: green'>You are registered successfully!</span>";
                }else{
                    return "<span style='color: red'>Not registered, error occurs!</span>";
                }
            }
        }

    }

    public function customerSignIn($email, $password){
        $email      = $this->fm->validation($email);
        $email      = $this->mysqlRealString($email);
        $password   = $this->fm->validation($password);
        $password   = $this->mysqlRealString(md5($password));

        if (empty($email) || empty($password)){
            return "<span style='color: red'>Field must not be empty!</span>";
        }else{
            $query = "SELECT * FROM tbl_customer WHERE email = '$email' AND password = '$password' ";
            $result = $this->db->select($query);
            if ($result !== false){
                $customerData = $result->fetch_assoc();
                Session::set('customerLogin', true);
                Session::set('customerId', $customerData['id']);
                Session::set('customerName', $customerData['name']);
                Session::set('customerEmail', $customerData['email']);
                header('Location: profile.php');
            }else{
                return "<span style='color: red'>Email or Password not match!</span>";
            }

        }

    }

    public function logout(){
        session_destroy();
        header('Location:login.php');
    }

    public function CustomerInfo($customer_id){
        $query = "SELECT * FROM tbl_customer WHERE id = '$customer_id' LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }

    public function UpdateCustomerInfo($data, $id){
        $name       = $this->fm->validation($data['name']);
        $name       = $this->mysqlRealString($name);
        $city       = $this->fm->validation($data['city']);
        $city       = $this->mysqlRealString($city);
        $zip        = $this->fm->validation($data['zip']);
        $zip        = $this->mysqlRealString($zip);
        $email      = $this->fm->validation($data['email']);
        $email      = $this->mysqlRealString($email);
        $address    = $this->fm->validation($data['address']);
        $address    = $this->mysqlRealString($address);
        $country    = $this->fm->validation($data['country']);
        $country    = $this->mysqlRealString($country);
        $phone      = $this->fm->validation($data['phone']);
        $phone      = $this->mysqlRealString($phone);
        $customerId = $this->fm->validation($id);
        $customerId = $this->mysqlRealString($customerId);

        $query  = "UPDATE tbl_customer SET name = '$name', city = '$city', zip = '$zip', email = '$email', address = '$address', country = '$country', phone = '$phone' WHERE id = '$customerId'";
        $update = $this->db->update($query);
        if ($update){
            return "<span style='color: green'>Profile has been updated successfully.</span>";
        }

    }


}