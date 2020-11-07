<?php include 'inc/header.php';?>
<?php include "../classes/Brand.php";
    $brand = new Brand();
    if (!isset($_GET['id']) || $_GET['id'] == NULL){
        echo '<script>window.location = "brandlist.php";</script>';
    }else{
        $brandId = $_GET['id'];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)){
        $insert_brand = $brand->Update($_POST, $brandId);
    }
?>

<?php include 'inc/sidebar.php';?>
    <div class="grid_10">
        <div class="box round first grid">
            <h2>Edit Brand</h2>
            <div class="block copyblock">
                <?php
                if (isset($brand->success)){
                    echo $brand->success;
                }
                ?>
                <?php
                    $edit_brand = $brand->Edit($brandId);
                    $showByID = $edit_brand->fetch_assoc();
                   // print_r($showByID);
                ?>
                <form method="POST" action="">
                    <table class="form">
                        <tr>
                            <td>
                                <input type="text" name="brand_name" value="<?php echo $showByID['brand_name']; ?>" placeholder="Enter Brand Name..." class="medium" />

                            </td>
                            <?php
                            if (isset($brand->errors)){
                                echo $brand->errors;
                            }
                            ?>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="submit" Value="Add" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
<?php include 'inc/footer.php';?>