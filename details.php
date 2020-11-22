<?php include 'inc/header.php'; ?>
<?php
    if (!isset($_GET['id']) || $_GET['id'] == NULL){
        echo "<script>window.location = '404.php';</script>";
    }else{
        $product_Id = $_GET['id'];
        $pt_detail = $product->singleProductDetail($product_Id);
    }
?>
 <div class="main">
    <div class="content">
        <?php
            if ($pt_detail){
                while ($detail = $pt_detail->fetch_assoc()){
            ?>
    	<div class="section group">
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/<?php echo $detail['image']; ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $detail['product_name']; ?></h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>					
					<div class="price">
						<p>Price: <span>$<?php echo $detail['price']; ?></span></p>
						<p>Category: <span><?php echo $detail['category_name']; ?></span></p>
						<p>Brand:<span><?php echo $detail['brand_name']; ?></span></p>
					</div>
				<div class="add-cart">
					<form action="cart.html" method="post">
						<input type="number" class="buyfield" name="" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>				
				</div>
			</div>
            <?php  } } ?>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p><?php echo $detail['product_name']; ?></p>
	    </div>
				
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
				      <li><a href="productbycat.html">Mobile Phones</a></li>
				      <li><a href="productbycat.html">Desktop</a></li>
				      <li><a href="productbycat.html">Laptop</a></li>
				      <li><a href="productbycat.html">Accessories</a></li>
				      <li><a href="productbycat.html#">Software</a></li>
					   <li><a href="productbycat.html">Sports & Fitness</a></li>
					   <li><a href="productbycat.html">Footwear</a></li>
					   <li><a href="productbycat.html">Jewellery</a></li>
					   <li><a href="productbycat.html">Clothing</a></li>
					   <li><a href="productbycat.html">Home Decor & Kitchen</a></li>
					   <li><a href="productbycat.html">Beauty & Healthcare</a></li>
					   <li><a href="productbycat.html">Toys, Kids & Babies</a></li>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
 </div>
</div>
<?php include 'inc/footer.php'; ?>