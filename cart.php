<?php include 'inc/header.php'?>
<?php
    if (isset($_GET['remove'])){
        $card_id = $_GET['remove'];
        $session_id = session_id();
        $removeCart = $cart->removeCart($card_id, $session_id);
    }
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $cartId = $_POST['id'];
        $qty        = $_POST['quantity'];
        $session_id = session_id();
        $updateQty  = $cart->updateQuantity($cartId, $qty, $session_id);
        if ($qty <= 0){
            $removeCart = $cart->removeCart($cartId, $session_id);
        }
    }
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
                <?php
                    $getcartItem = $cart->getCartItems();

                    if ($getcartItem){
                ?>
						<table class="tblone">
							<tr>
                                <th width="5%">SL</th>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="20%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
                            <?php
                                    $i = 0;
                                    $sum = 0;
                                    while ($result = $getcartItem->fetch_assoc()){
                                        $i++;
                            ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td>Product Title</td>
								<td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
								<td>Tk. <?php echo $result['price']; ?></td>
								<td>
									<form action="" method="POST">
										<input type="number" name="quantity" value="<?php echo $result['quantity'];  ?>"/>
                                        <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>Tk. <?php
                                    $total = $result['price'] * $result['quantity'];
                                    echo $total;
                                    ?></td>
								<td><a href="?remove=<?php echo $result['id']; ?>">X</a></td>
							</tr>
                            <?php $sum = $sum + $total; ?>
                        <?php } ?>
						</table>
						<table style="float:right;text-align:left;" width="40%">
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
							</tr>
					   </table
                <?php }else{ ?>
                    <h2 style="text-align: center">Empty</h2>
                <?php } ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="login.html"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
   <?php include 'inc/footer.php'; ?>