<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../helpers/Format.php'?>
<?php include '../classes/Product.php';?>
<?php
    $product= new Product();
    $fm       = new Format();

    if (isset($_GET['del'])){
        $product_id = $_GET['del'];
        $deleteProduct = $product->destroy($product_id);
        if (isset($deleteProduct)){
            echo "<script>window.location = 'productlist.php';</script>";
        }
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <?php
            if (isset($product->success)){
                echo $product->success;
            }
        ?>
        <h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
                    <th>SL</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Details</th>
					<th>Price</th>
					<th>Image</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
            <?php
                $result = $product->getallProudct();
                if ($result){
                    $i = 0;
                    while ($product = $result->fetch_assoc()){
                        $i++;
            ?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $product['product_name'];  ?></td>
					<td><?php echo $product['category_name'];  ?></td>
					<td><?php echo $product['brand_name'];  ?></td>
					<td><?php echo $fm->textShorten($product['details'], 40);  ?></td>
					<td><?php echo $product['price'];  ?></td>
					<td><img src="<?php echo $product['image'];  ?>" width="40" alt=""></td>
					<td>
                        <?php
                            if ($product['type'] == 0){
                                echo "General";
                            }else{
                                echo 'Featured';
                            }
                        ?>
                    </td>
					<td><a href="productedit.php?id=<?php echo $product['id']; ?>">Edit</a> || <a href="?del=<?php echo $product['id']; ?>">Delete</a></td>
				</tr>
            <?php  } } ?>
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
