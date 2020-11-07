<?php include 'inc/header.php';?>
<?php include "../classes/Brand.php";
    $brand = new Brand();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)){
        $insert_brand = $brand->Store($_POST);
    }
?>

<?php include 'inc/sidebar.php';?>
    <div class="grid_10">
        <div class="box round first grid">
            <h2>Add New Brand</h2>
            <div class="block copyblock">
                <?php
                if (isset($brand->success)){
                    echo $brand->success;
                }
                ?>
                <form method="POST" action="brandadd.php">
                    <table class="form">
                        <tr>
                            <td>
                                <input type="text" name="brand_name" placeholder="Enter Brand Name..." class="medium" />

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