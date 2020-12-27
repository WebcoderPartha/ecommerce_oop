<?php include 'inc/header.php'; ?>
<?php
$customerHasLogin = Session::get('customerLogin');
if ($customerHasLogin == false){
    header('Location: login.php');
}
?>
    <div class="main">
        <div class="content">
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