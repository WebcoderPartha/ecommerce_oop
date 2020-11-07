<?php include 'inc/header.php';?>
<?php include '../classes/Category.php';
$category = new Category();
?>
<?php
    if (!isset($_GET['id']) || $_GET['id'] == NULL){
        echo "<script>window.location = 'catlist.php';</script>";
    }else{
        $catId = $_GET['id'];
    }
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)){
        $update = $category->update($_POST, $catId);
    }
?>
<?php include 'inc/sidebar.php';?>
    <div class="grid_10">
        <div class="box round first grid">
            <h2>Edit Category</h2>
            <div class="block copyblock">
                <?php
                    $show_category = $category->editcategory($catId);
                    $result = $show_category->fetch_assoc();
                ?>

                <?php
                if (isset($category->success)){
                    echo $category->success;
                }
                ?>
                <form method="POST" action="editcat.php?id=<?php echo $result['id']; ?>">
                    <table class="form">
                        <tr>
                            <td>
                                <input type="text" name="category_name" value="<?php echo $result['category_name']; ?>" placeholder="Enter Category Name..." class="medium" />

                            </td>
                            <?php
                            if (isset($category->error_msg)){
                                echo $category->error_msg;
                            }
                            ?>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
<?php include 'inc/footer.php';?>