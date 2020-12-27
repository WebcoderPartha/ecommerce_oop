<?php include 'inc/header.php'; ?>
<?php
$customerHasLogin = Session::get('customerLogin');
if ($customerHasLogin == false){
    header('Location: login.php');
}
$customerId = Session::get('customerId');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
    $updateInfo = $customer->UpdateCustomerInfo($_POST, $customerId);
}
?>
    <div class="main">
        <div class="content">
            <form action="" method="POST">
            <?php
            $customerInfo = $customer->CustomerInfo($customerId);
            if ($customerInfo){
                while ($result = $customerInfo->fetch_assoc()){
                    ?>
                    <div class="profile" style="width: 550px;margin: 0 auto;padding: 20px; background-color: lightgrey;">
                        <style>table tr td{padding: 10px 15px}</style>
                        <?php
                            if (isset($updateInfo)){
                                echo $updateInfo;
                            }
                        ?>
                        <table>
                            <tr>
                                <td width="30%" ><p>Name: </p></td>
                                <td width="10%">:</td>
                                <td><input type="text" name="name" value="<?php echo $result['name']; ?>"></td>
                            </tr>
                            <tr>
                                <td><p>Email: </p></td>
                                <td>:</td>
                                <td><input type="email" name="email" value="<?php echo $result['email']; ?>"></td>
                            </tr>
                            <tr>
                                <td><p>Phone: </p></td>
                                <td>:</td>
                                <td><input type="text" name="phone" value="<?php echo $result['phone']; ?>"></td>
                            </tr>
                            <tr>
                                <td><p>Address </p></td>
                                <td>:</td>
                                <td><input type="text" name="address" value="<?php echo $result['address']; ?>"></td>
                            </tr>
                            <tr>
                                <td><p>City: </p></td>
                                <td>:</td>
                                <td><input type="text" name="city" value="<?php echo $result['city']; ?>"></td>
                            </tr>
                            <tr>
                                <td><p>Zip: </p></td>
                                <td>:</td>
                                <td><input type="text" name="zip" value="<?php echo $result['zip']; ?>"></td>
                            </tr>
                            <tr>
                                <td><p>Country</p></td>
                                <td>:</td>
                                <td><input type="text" name="country" value="<?php echo $result['country']; ?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><input type="submit" name="update" value="UPDATE"></td>
                            </tr>
                        </table>
                    </div>
                <?php  }
            } ?>
            </form>
        </div>
    </div>
    </div>
<?php include 'inc/footer.php'; ?>