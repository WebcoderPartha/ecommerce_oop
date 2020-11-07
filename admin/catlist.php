<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php';
    $category = new Category();
    if (isset($_GET['action'])){
        $catID = $_GET['action'];
        $delete_category = $category->destroy($catID);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">
                    <?php
                        if ($category->success){
                            echo $category->success;
                        }
                    ?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                        <?php
                            if ($category->allcategory()){
                                foreach ($category->allcategory() as $key => $result){ ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $key+1; ?></td>
                                        <td><?php echo $result['category_name']; ?></td>
                                        <td><a href="editcat.php?id=<?php echo $result['id']; ?>">Edit</a> || <a href="?action=<?php echo $result['id']; ?>" onclick="return confirm('Are you sure to delete?') ">Delete</a></td>
                                    </tr>
                        <?php   } }  ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

