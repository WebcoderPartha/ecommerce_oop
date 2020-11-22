<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Product.php';?>
<?php include '../classes/Category.php';?>
<?php include '../classes/Brand.php';?>
<?php
    $pd = new Product();

    if (!isset($_GET['id']) || $_GET['id'] == NULL){
        echo "<script>window.location = 'productlist.php';</script>";
    }else{
        $product_id = $pd->real_strings($_GET['id']);
//        print_r($product);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $ProductUpdate = $pd->update($_POST, $_FILES, $product_id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">
        <?php
            $result = $pd->editProduct($product_id);
            $product = $result->fetch_assoc();
        ?>
        <?php
            if (isset($pd->success)){
                echo $pd->success;
            }
        ?>
         <form action="" method="POST" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="product_name" value="<?php echo $product['product_name']; ?>" placeholder="Enter Product Name..." class="medium" />
                    </td>
                    <?php
                    if (isset($pd->error_prdc)){
                        echo $pd->error_prdc;
                        }
                    ?>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="cat_id">
                            <option value="">Select Category</option>
                            <?php
                                $cat = new Category();
                                $category = $cat->allcategory();
                                if ($category){
                                    while ($result = $category->fetch_assoc()){
                            ?>
                            <option value="<?php echo $result['id']; ?>"
                                    <?php
                                        if ($product['cat_id'] == $result['id']){
                                            echo 'selected';
                                        }
                                    ?>
                            >
                                <?php echo $result['category_name']; ?>
                            </option>
                            <?php    } } ?>
                        </select>
                        <?php
                        if (isset($pd->error_cat)){
                            echo $pd->error_cat;
                        }
                        ?>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brand_id">
                            <option>Select Brand</option>
                           <?php
                                $brand = new Brand();
                                $allbrand = $brand->getAllBrand();
                                if ($allbrand){
                                    while ($result = $allbrand->fetch_assoc()){
                           ?>
                           <option value="<?php echo $result['id']; ?>"
                               <?php
                               if ($product['brand_id'] == $result['id']){
                                   echo 'selected';
                               }
                               ?>
                           ><?php echo $result['brand_name']; ?></option>
                           <?php  }
                                }
                           ?>

                        </select>
                        <?php
                        if (isset($pd->error_bnd)){
                            echo $pd->error_bnd;
                        }
                        ?>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="details"><?php echo $product['details'] ?></textarea>
                    </td>
                     <?php
                     if (isset($pd->error_dtls)){
                         echo $pd->error_dtls;
                     }
                     ?>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Enter Price..." value="<?php echo $product['price'] ?>" class="medium" />
                    </td>
                    <?php
                    if (isset($pd->error_pric)){
                        echo $pd->error_pric;
                    }
                    ?>
                </tr>
            
                <tr>
                    <td></td>
                    <td>
                        <img src="<?php echo $product['image']; ?>"  width="100" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                    <?php
                    if (isset($pd->error_img)){
                        echo $pd->error_img;
                    }
                    ?>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="types">
                            <option>Select Type</option>
                            <option value="0" <?php if ($product['type'] == 0){ echo "selected"; } ?>>General</option>
                            <option value="1" <?php if ($product['type'] == 1){ echo "selected"; } ?>>Featured</option>
                        </select>
                    </td>
                    <?php
                    if (isset($pd->error)){
                        echo $pd->error;
                    }
                    ?>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Add" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


