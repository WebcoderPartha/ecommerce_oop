<?php include 'inc/header.php'; ?>
<?php
$customerHasLogin = Session::get('customerLogin');
if ($customerHasLogin == false){
    header('Location: login.php');
}
?>
<style>
    .payment{
        text-align: center;
    }
    .payment h2 {
        margin-bottom: 28px;
        color: red;
        border-bottom: 1px solid;
    }
    .payment a {
        background: #ff0000;
        color: #fff;
        display: inline-block;
        padding: 11px 14px;
        margin-bottom: 30px;
    }
</style>
    <div class="main">
        <div class="content">
            <div class="profile" style="width: 550px;margin: 0 auto;padding: 20px; background-color: lightgrey;">
                <div class="payment">
                    <h2>Choose Payment Option</h2>
                    <a href="offline.php">Offline Payment</a>
                    <a href="online.php">Online Payment</a>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php include 'inc/footer.php'; ?>