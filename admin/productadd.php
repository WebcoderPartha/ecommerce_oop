﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Product.php';?>
<?php include '../classes/Category.php';?>
<?php include '../classes/Brand.php';?>
<?php
    $pd = new Product();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $storeProduct = $pd->store($_POST, $_FILES);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">
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
                        <input type="text" name="product_name" placeholder="Enter Product Name..." class="medium" />
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
                            <option value="<?php echo $result['id']; ?>"><?php echo $result['category_name']; ?></option>
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
                           <option value="<?php echo $result['id']; ?>"><?php echo $result['brand_name']; ?></option>
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
                        <textarea class="tinymce" name="details"></textarea>
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
                        <input type="text" name="price" placeholder="Enter Price..." class="medium" />
                    </td>
                    <?php
                    if (isset($pd->error_pric)){
                        echo $pd->error_pric;
                    }
                    ?>
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
                            <option value="0">General</option>
                            <option value="1">Featured</option>
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


