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
                <?php
                $newProduct = $product->getNewProduct();
                ?>
                <?php
                    if ($newProduct){
                    while ($result = $newProduct->fetch_assoc()){
                ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?id=<?php echo $result['id'] ?>"><img src="admin/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php echo $result['product_name'] ?></h2>
					 <p><span class="price">$<?php echo $result['price'] ?></span></p>
				     <div class="button"><span><a href="details.php?id=<?php echo $result['id']; ?>" class="details">Details</a></span></div>
				</div>
				<?php } }?>
			</div>
    </div>
 </div>

  <?php include 'inc/footer.php'; ?>