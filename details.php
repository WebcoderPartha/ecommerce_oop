<?php include 'inc/header.php'; ?>
<?php
    if (!isset($_GET['id']) || $_GET['id'] == NULL){
        echo "<script>window.location = '404.php';</script>";
    }else{
        $product_Id = $_GET['id'];
        $pt_detail = $product->singleProductDetail($product_Id);
    }

    // Store Add to Cart
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit']){
        $addCart = $cart->addToCart($_POST['quantity'], $product_Id);
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
					<form action="details.php?id=<?php echo $detail['id']; ?>" method="POST">
						<input type="number" class="buyfield" name="quantity" value="1" min="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>				
				</div>
			</div>

			<div class="product-desc">
			<h2>Product Details</h2>
			<p><?php echo $detail['details']; ?></p>
	    </div>
                    <?php  } } ?>
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
                        <?php
                            $categories = $category->allcategory();
                            if ($categories){
                                while ($category = $categories->fetch_assoc()){
                        ?>
				      <li><a href="productbycat.php?catid=<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></a></li>
                      <?php } } ?>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
 </div>

<?php include 'inc/footer.php'; ?>