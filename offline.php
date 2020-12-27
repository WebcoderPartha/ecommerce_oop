<?php include 'inc/header.php'; ?>
<?php
$customerHasLogin = Session::get('customerLogin');
if ($customerHasLogin == false){
    header('Location: login.php');
}
?>
<style>
    .section{
        overflow: hidden;
    }
    .division1 table {
        width: 100%;
        text-align: center;
    }
    .total1{
        width: 60%;
        float: left;
    }
    .total2{
        width: 40%;
        float: left;
    }
    .division1 {
        width: 60%;
        float: left;
        background: lightblue;
        padding: 15px 0px;
    }
    .division2{ width: 40%; float: left}
</style>
    <div class="main">
        <div class="content">
            <div class="section">
                <div class="division1">

                             <table>
                                 <tr>
                                     <th>SL</th>
                                     <th>Name</th>
                                     <th>img</th>
                                     <th>Price</th>
                                     <th>Qty</th>
                                     <th>Total Price</th>
                                 </tr>
                                 <?php
                                 $carts = $cart->getCartItems();
//                                 print_r($carts->fetch_assoc());
                                 if ($carts){
                                     $i = 0;
                                     $sum = 0;
                                     $qty = 0;
                                 while ($result= $carts->fetch_assoc()){
                                        $i++
                                     ?>
                                 <tr>
                                    <td><?php echo $i; ?></td>
                                     <td><?php echo $result['productName']; ?></td>
                                     <td><img src="admin/<?php echo $result['image']; ?>"  width="20" alt=""></td>
                                     <td><?php echo $result['price']; ?></td>
                                     <td><?php echo $result['quantity']; ?></td>
                                     <td><?php
                                            $total = $result['price'] * $result['quantity'];

                                         echo  $total ?></td>
                                </tr>
                                <?php
                                        $sum = $sum + $total;
                                        $qty = $qty + $result['quantity'];
                                     ?>
                       <?php }
                    }
                   ?>
                             </table>
                    <div class="total1">
                        Total:
                    </div>
                    <div class="total2">
                        <table>
                            <tr>
                                <th>Sub Total : </th>
                                <td>TK. <?php echo $sum; ?></td>
                            </tr>
                            <tr>
                                <th>VAT : </th>
                                <td>5%</td>
                            </tr>
                            <tr>
                                <th>Grand Total :</th>
                                <td>TK. <?php
                                    $vat = $sum*0.05;
                                    $grand_total = $sum+$vat;
                                    echo $grand_total;
                                    ?></td>
                                <?php
                                $header_total = Session::set('total', $grand_total);
                                $header_qty   = Session::set('qty', $qty)
                                ?>
                            </tr>
                        </table>
                    </div>

                </div>
                <div class="division2">
                    <?php
                    $customerId = Session::get('customerId');
                    $customerInfo = $customer->CustomerInfo($customerId);
                    if ($customerInfo){
                        while ($result = $customerInfo->fetch_assoc()){
                            ?>
                            <div class="profile" style="width: 550px;margin: 0 auto;padding: 20px; background-color: lightgrey;">
                                <style>table tr td{padding: 10px 15px}</style>
                                <table>
                                    <tr>
                                        <td width="30%" ><p>Name: </p></td>
                                        <td width="10%">:</td>
                                        <td><?php echo $result['name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><p>Email: </p></td>
                                        <td>:</td>
                                        <td><?php echo $result['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><p>Phone: </p></td>
                                        <td>:</td>
                                        <td><?php echo $result['phone']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><p>Address </p></td>
                                        <td>:</td>
                                        <td><?php echo $result['address']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><p>City: </p></td>
                                        <td>:</td>
                                        <td><?php echo $result['city']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><p>Zip: </p></td>
                                        <td>:</td>
                                        <td><?php echo $result['zip']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><p>Country</p></td>
                                        <td>:</td>
                                        <td><?php echo $result['country']; ?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><a href="update-profile.php" style="background-color: green; color: #fff ; padding: 5px 10px; margin-top:30px;">Update Profile</a></td>
                                    </tr>
                                </table>
                            </div>
                        <?php  }
                    } ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php'; ?>