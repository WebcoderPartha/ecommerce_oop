<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php' ?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
              <?php
                $fr_pt = $product->featuredProduct();
                if ($fr_pt){
                    while ($feature = $fr_pt->fetch_assoc()){
              ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?id=<?php echo $feature['id']; ?>"><img src="admin/<?php echo $feature['image']; ?>" alt="" /></a>
					 <h2><?php echo $feature['product_name']; ?></h2>
					 <p><?php echo $fm->textShorten($feature['product_name'], 60); ?></p>
					 <p><span class="price">$<?php echo $feature['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?id=<?php echo $feature['id']; ?>" class="details">Details</a></span></div>
				</div>
                <?php   }
                }else{ ?>
                    <h2 style="text-align:center; padding-top: 20px;">No featured product found</h2>
                <?php } ?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="images/new-pic1.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p><span class="price">$403.66</span></p>
				     <div class="button"><span><a href="details.php" class="details">Details</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="details.php"><img src="images/new-pic2.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p><span class="price">$621.75</span></p> 
				     <div class="button"><span><a href="details.php" class="details">Details</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="details.php"><img src="images/feature-pic2.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p><span class="price">$428.02</span></p>
				     <div class="button"><span><a href="details.php" class="details">Details</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
				 <img src="images/new-pic3.jpg" alt="" />
					 <h2>Lorem Ipsum is simply </h2>					 
					 <p><span class="price">$457.88</span></p>

				     <div class="button"><span><a href="details.php" class="details">Details</a></span></div>
				</div>
			</div>
    </div>
 </div>
</div>
  <?php include 'inc/footer.php'; ?>