<?php include 'inc/header.php'; ?>
<?php
    $customerHasLogin = Session::get('customerLogin');
    if ($customerHasLogin == false){
        header('Location: login.php');
    }
?>

    <div class="main">
        <div class="content">
            <h2>Order page</h2>
            <h2>Name: <?php echo Session::get('customerName'); ?></h2>
            <h2>Name: <?php echo Session::get('customerEmail'); ?></h2>
            <h2>Name: <?php echo Session::get('customerId'); ?></h2>
        </div>
    </div>
    </div>
<?php include 'inc/footer.php'; ?>