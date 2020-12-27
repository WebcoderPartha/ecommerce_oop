<?php include 'inc/header.php';
$customerHasLogin = Session::get('customerLogin');
if ($customerHasLogin){
    header('Location:order.php');
}
?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
             <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signin'])){
                    $customerSignin = $customer->customerSignIn($_POST['email'], $_POST['password']);
                }
                if (isset($customerSignin)){
                    echo $customerSignin;
                }
             ?>
            <form action="" method="POST" id="member">
                <input name="email" type="text" class="field" placeholder="Enter your email" />
                <input name="password" type="password" class="field" placeholder="Enter your password" />

                <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                <div class="buttons">
                    <div><button name="signin" class="grey">Sign In</button>
                    </div>
                </div>
            </form>
         </div>
        <div class="register_account">
    		<h3>Register New Account</h3>
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
                    $custReg = $customer->customerRegister($_POST);
                }
                if (isset($custReg)){
                    echo $custReg;
                }
            ?>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Your name" />
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Your city" />
							</div>
							
							<div>
								<input type="text" name="zip" placeholder="Your zip code" />
							</div>
							<div>
								<input type="text" name="email" placeholder="Your email address" />
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Your address" />
						</div>
		    		<div>
						<select id="country" name="country" class="frm-field required">
							<option value="null">Select a Country</option>         
							<option value="Afghanistan">Afghanistan</option>
							<option value="Albania">Albania</option>
							<option value="Algeria">Algeria</option>
							<option value="Argentina">Argentina</option>
							<option value="Armenia">Armenia</option>
							<option value="Aruba">Aruba</option>
							<option value="Australia">Australia</option>
							<option value="Austria">Austria</option>
							<option value="Azerbaijan">Azerbaijan</option>
							<option value="Bahamas">Bahamas</option>
							<option value="Bahrain">Bahrain</option>
							<option value="Bangladesh">Bangladesh</option>

		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Your phone number" />
		          </div>
				  
				  <div>
					<input type="text" name="password" placeholder="Your password" />
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button name="register" class="grey">Register Account</button></div></div>

		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
  <?php include 'inc/footer.php'; ?>
