<?php
    include '../classes/Adminlogin.php';
    $adminlogin = new Adminlogin();
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $adminUser = $_POST['username'];
        $adminPassword = md5($_POST['password']);
        $loginCheck = $adminlogin->adminLogin($adminUser, $adminPassword);
    }
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
            <span style="color: red; font-size: 18px">
                <?php
                    if (isset($loginCheck)){
                        echo $loginCheck;
                    }
                ?>
            </span>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">WebCoder Partha</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>