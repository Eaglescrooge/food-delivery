<?php
	$db = mysqli_connect("localhost","root","","chownow2") or die(mysqli_error($db));

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
#header{ border:1px solid hidden;
	 						width: 99%;
							margin:5px;
							height:100px;
							background:#F60;
							 }
							 
							 #home{border:1px solid blue;
							 	width:30%;
								height:60px;
								margin:5px;
							 }
					
							
							#logotext {
								 border:1px solid hidden;
								 float:right;
								 height:50px;
								 padding: px 25px;
								 font-family:Tahoma, Geneva, sans-serif;
								 font-size:20px;
								 clear:both;
								
								} 
							#logotext a{text-decoration:none;
										
							}
							p{font-family:"Comic Sans MS", cursive;
								font-size:19px;
								color:#F60;
							}
							legend{font-family:"Comic Sans MS", cursive;
								font-size:36px;
								color:#69C;
								
							}
							input, textarea{width:25%;
											height:40px;
											border-radius:5px;
											border-color:#F60;
											
							}
							</style>
                            
</head>

<body>

	<div id=header>
    
    <img src="../images/images.png" width="170" height="100" />
    
    <div id=logotext>
   	<p><a href="home.php">Home</a> | <a href="">AboutUs</a> | <a href="contact_form.php">ContactUs</a> | <a href="" ><img
    src="../images/cart.png" width="20" height="20" /></a></p>
    <p align="right"><a href="login_register.php"> Sign In </a> |
    <a href="login_register.php" > Sign Up </a> </p>
    </div>
    </div>
<?php
	
	if(isset($_POST['send'])){
		$error = array();
	if(empty($_POST['full_name'])){
		$error[] = "Please Enter Your Full Name";
	}else{
		$full_name = mysqli_real_escape_string($db, $_POST['full_name']);
	}
	if(empty($_POST['email'])){
		$error[] = "Please Enter Your Email Address";
	}else{
		$email = mysqli_real_escape_string($db, $_POST['email']);
	}
	if(empty($_POST['msg'])){
		$error[] = "Insert a Message";
	}else{
		$msg = mysqli_real_escape_string($db, $_POST['msg']);
	}
	if(empty($_POST['addy'])){
		$error[] = "Please Enter Your Address";
	}else{
		$addy = mysqli_real_escape_string($db, $_POST['addy']);
	}
	if(empty($_POST['phno'])){
		$error[] = "Please Enter Your Phone Number";
	}else{
		$phno = mysqli_real_escape_string($db, $_POST['phno']);
	}
	if(empty($error)){
		$insert = mysqli_query($db, "INSERT INTO contact_form VALUES (NULL,'".$full_name."','".$email."','".$msg."','".$addy."','".$phno."')")or die (mysqli_error($db));
		echo "Your message has been sent";
		
		header('location:contact_form.php?success=$success');
		}else{
		foreach($error as $error){
			echo"<p>".$error."</p>";
		}
		}	
	
	}

?>    
    
    <form align="center" action="" method="post">
    <fieldset>
    	<legend align="center"> Contact Form</legend>
        <p>Full name: <input type="text" name="full_name" /></p>
        <p>Email Address: <input type="email" name="email" /></p>
        <p>Message: <textarea rows="4" name="msg" cols="17"></textarea></p>
        <p>Address: <textarea rows="4" name="addy" cols="17"></textarea></p>
        <p>Phone No: <input type="text" name="phno" /></p>
        <Input type="submit" name="send" value="Send" />
        
    </fieldset>    
    </form>
</body>
</html>
