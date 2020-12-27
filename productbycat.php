<?php include 'inc/header.php'; ?>
<?php

    if (!isset($_GET['catid']) || $_GET['catid'] == NULL){
        echo "<script>window.location = '404.php';</script>";
    }else{
        $catid      = $_GET['catid'];
        $catProduct = $product->getCatIdByProduct($catid);
        $category   = $category->getCategoryById($catid)->fetch_assoc();
    }
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest from <?php echo $category['category_name']; ?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
              <?php
                if ($catProduct){
                    while ($result = $catProduct->fetch_assoc()){
              ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?id=<?php echo $result['id']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['product_name']; ?></h2>
					 <p><?php echo $fm->textShorten($result['details'], 50) ?></p>
					 <p><span class="price">$<?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?id=<?php echo $result['id']; ?>" class="details">Details</a></span></div>
				</div>
				<?php    }
                }
              ?>

          </div>
    </div>
 </div>
<?php include 'inc/footer.php'; ?>