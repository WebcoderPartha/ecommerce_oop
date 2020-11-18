<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../helpers/Format.php'?>
<?php include '../classes/Product.php';?>
<?php
    $product= new Product();
    $fm       = new Format();
//    print_r($products->getallProudct()->fetch_assoc());
?>
<div class="grid_10">
    <div class="box round first grid">
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
					<td><a href="">Edit</a> || <a href="">Delete</a></td>
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
