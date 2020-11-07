<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Brand.php';
    $brands = new Brand();
    $getallBrand = $brands->getAllBrand();
?>
<?php
    if (isset($_GET['action'])){
        $brand_id = $_GET['action'];
        $destroy = $brands->Destroy($brand_id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Category List</h2>
        <div class="block">
            <?php
                if (isset($brands->success)){
                    echo $brands->success;
                }
            ?>
            <table class="data display datatable" id="example">
                <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>Brand Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if ($getallBrand){
                    foreach ($getallBrand as $key => $result){ ?>
                        <tr class="odd gradeX">
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $result['brand_name']; ?></td>
                            <td><a href="editbrand.php?id=<?php echo $result['id']; ?>">Edit</a> || <a href="?action=<?php echo $result['id']; ?>" onclick="return confirm('Are you sure to delete?') ">Delete</a></td>
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

