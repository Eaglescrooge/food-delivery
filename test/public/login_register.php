
<?php
session_start();
include('../db/db_config.php');


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login | Register</title>



<style>
#logo{border:1px solid red;
		width:20%;
		height:90px;

}
#header{ border:1px solid hidden;
	 						width: 99%;
							margin:5px;
							height:100px;
							background:#F60;
							}


							#logotext {
								 border:1px solid hidden;
								 float:right;
								 height:50px;
								 padding: 40px 25px;
								 font-family:Tahoma, Geneva, sans-serif;
								 font-size:20px;
								 clear:both;

								}
							#logotext a{text-decoration:none;
							}


							logotext{float:left;}	
							</style>

</head>

<body>



<div id=header>
    
   <div id=logo>
   		<img src="file:///C|/wamp/www/wole/test/images/logo.PNG"  />
    </div>
    <div id=logotext>
   	<p><a href="home.php">Home</a> | <a href="">AboutUs</a> | <a href="contact_form.php">ContactUs</a> | <a href="" ><img src="../images/cart.png" width="20" height="20" /></a></p>
    <p align="right"><a href="login_register.php"> Sign In </a> |
    <a href="login_register.php" > Sign Up </a> </p>
    </div>
    </div>
<div id=login>
<?php
if(array_key_exists('login', $_POST)) {
	//I INITIALIZED MY ERROR ARRAY
	$error = array();
	if(empty($_POST['email'])){
		
		$error[] = 'Please enter your email';	
	}else {
		$email = mysqli_escape_string($db, $_POST['email']);
		}
		
		if(empty($_POST['pword'])) {
			$error[] = 'Please enter your password';
		}else {
			$pword = mysqli_escape_string($db, $_POST['pword']);
			}
	
					
					if(empty($error)){
						
			$query = mysqli_query($db, "SELECT * FROM customers WHERE email_address= '".$email."' AND password= '".md5($pword)."'")or die(mysqli_error($db));
						
						
						if(mysqli_num_rows($query) == 1){
							
							$row = mysqli_fetch_array($query);
								
								$_SESSION['cust_id'] = $row['customer_id'];
								$_SESSION['cust_name'] = $row['customer_firstname'].' '.$row['customer_lastname'];
								$_SESSION['e_addy'] = $row['email_address'];
								header("Location: customer_home.php");
							
							
						} else {
							
							$invalid = "Invalid email and/or password. Please try again";
							header("Location:login_register.php?invalid=$invalid");	
						}
						
						
					} else {
					
						foreach($error as $err){
							
						echo '<p class="error">*'.$err.'</p>';	
						}
						
					}
			
	
	} // CLOSE OF GENERAL IF


if(isset($_GET['invalid'])){
			
				$invalid = $_GET['invalid'];
				echo '<p class="error">*'.$invalid."</p>";	
				
			}



?>

<fieldset> 
<legend align="center"> <span class=tx> <b> Please Enter your Email address and Password to Sign In </span> </b> </legend>
<br/><br/>
<form action="" method="post" >
<p class=px>  Email Address : <input type="text" name="email"  /> </p>

<p class=px>  Password : <input type="password" name="pword"  /> </p>

<input type="submit" name="login" value="Sign In" /> 

<br/><br/>
</div>
<br/>
</fieldset>

<fieldset>

    	<?php
		// HERE IS VALIDATING THE SIGNUP FORM
			$wrong = array();
			
			if(array_key_exists('reg', $_POST)){
				
				if(empty($_POST['fname'])){
					
					$wrong[] = "Please Enter your Firstname";	
				} else {
				
				$fname = mysqli_real_escape_string($db, $_POST['fname']);	
				}
				
				
				if(empty($_POST['lname'])){
					
					$wrong[] = "Please Enter your lastname";	
				} else {
				
				$lname = mysqli_real_escape_string($db, $_POST['lname']);	
				}
				
				if(empty($_POST['e_addy'])){
					
					$wrong[] = "Please Enter your Email Address";	
				} else {
				
				$e_addy = mysqli_real_escape_string($db, $_POST['e_addy']);	
				}
				
				
				if(empty($_POST['pwd'])){
					
					$wrong[] = "Please Enter your Password";	
				} else {
				
				$pwd = mysqli_real_escape_string($db, $_POST['pwd']);	
				}
				
				if(empty($_POST['p_num'])){
					
					$wrong[] = "Please Enter your Phone Number";	
				} else {
				
				$p_num = mysqli_real_escape_string($db, $_POST['p_num']);	
				}
				
				
				if(empty($_POST['addy'])){
					
					$wrong[] = "Please Enter your Address";	
				} else {
				
				$addy = mysqli_real_escape_string($db, $_POST['addy']);	
				}
				if(empty($_POST['cty'])){
					
					$wrong[] = "Please Enter your City";	
				} else {
				
				$cty = mysqli_real_escape_string($db, $_POST['cty']);	
				}
				if(empty($_POST['sta'])){
					
					$wrong[] = "Please Enter your State";	
				} else {
				
				$sta = mysqli_real_escape_string($db, $_POST['sta']);	
				}
				
				
				if(empty($wrong)){
				
			
			//THE QUERY BELOW IS TO CHECK THAT THE DETAILS SUPPLIED BY THE USER DOESN'T ALREADY EXIST IN OUR DATABASE
			
			$check = mysqli_query($db, "SELECT * FROM customers WHERE email_address = '".$e_addy."' || password = '".md5($pwd)."'") or die(mysqli_error);
			
				if(mysqli_num_rows($check) == 0){ 
					$insert = mysqli_query($db, "INSERT INTO customers(customer_firstname, customer_lastname, email_address, password, phone_number, billing_address, city, state) VALUES (
																	'".$fname."',
																	'".$lname."',
																	'".$e_addy."',
																	'".md5($pwd)."',
																	'".$p_num."',
																	'".$addy."',
																	'".$cty."',
																	'".$sta."'
																	)") or die(mysqli_error($db));
						$reg = "<p class=px>You have been registered </p>";
						header("Location:login_register.php?reg=$reg");
					
				} else {
					
					$incorrect = "Email or Password already exists";
					header("Location:login_register.php?incorrect=$incorrect");	
					
				}
					
				} else {
					
					foreach($wrong as $wrongs){
					
						echo '<p class="error">*'.$wrongs.'</p>';	
					}
				}
				
			}
		
		
			if(isset($_GET['incorrect'])){
			$incorrect = $_GET['incorrect'];
			echo '<p class="error">'.$incorrect."</p>";		
			}
		
			if(isset($_GET['reg'])){
			
				$register = $_GET['reg'];
				echo '<p class="error">'.$register."</p>";	
				
			}
		
		?>
    
<legend align="center"><span class="tx"> <b> Or Sign Up Below </b></span></legend>
<div id=register>


			<p class="px">Firstname: <input type="text" name="fname" /></p>
				<p class="px">Lastname:  <input type="text" name="lname"  /> </p>
					  </p>
                			<p class="px">Email Address: <input type="text" name="e_addy" /></p> 
                
               					 <p class="px">Password: <input type="password"  name="pwd" /> </p>
				
	  									<p class="px">Phone Number: <input type="text" name="p_num" /></p>
                
               			 <p id="px1"> Address: <textarea rows="17px" cols="100" name="addy">  </textarea></p>
				
               		 <p class="px"> City: <input type="text"  name="cty" /> </p>
                
                <p class="px"> State: <input type="text" name="sta"/> </p> <br/>
                
                
<input type="submit" name="reg" value="Sign Up" />
				


</div>
<div id=footer>
                
              		  </div>
</fieldset>
</form>
</body>
</html>