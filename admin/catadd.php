<?php include 'inc/header.php';?>
<?php include '../classes/Category.php';
    $category = new Category();
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)){
        $insertData = $category->insertCategory($_POST);
    }
?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock">
                   <?php
                    if (isset($category->success)){
                        echo $category->success;
                    }
                   ?>
                 <form method="POST" action="catadd.php">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="category_name" placeholder="Enter Category Name..." class="medium" />

                            </td>
                            <?php
                            if (isset($category->error_msg)){
                                echo $category->error_msg;
                            }
                            ?>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>