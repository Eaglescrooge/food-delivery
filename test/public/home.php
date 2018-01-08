<?php

session_start();
include('../db/db_config.php');


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chownownow | #index</title>
<link href="../css/style.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div id=container>
	<div id=header>
    
   <div id=logo>
    </div>
    <div id=logotext>
   	<p><a href="home.php">Home</a> | <a href="">AboutUs</a> | <a href="contact_form.php">ContactUs</a> | <a href="" ><img src="../images/cart.png" width="20" height="20" /></a></p>
    <p align="right"><a href="login_register.php"> Sign In </a> |
    <a href="login_register.php" > Sign Up </a> </p>
    </div>
    </div>
    
    	<div id=nav>
    		
     <br/><br/>
    <h1 align="center"> Order delicious food online! </h1>
		<h3 align="center"> Discover local delicacies that deliver to your doorstep </h3>

<br/> <br/>
							<div id=innernav>
                            
                            <?php
		
			//to authenticate the user
			
			$error = array();
			
			if(array_key_exists('search', $_POST)){
			
					
					
					if(empty($_POST['food'])){
						
					$error[] = "Please Make a Choice";	
					} else {
					$food = mysqli_real_escape_string($db, $_POST['food']);	
					}
					
					if(empty($error)){
						
			$query = mysqli_query($db, "SELECT * FROM food WHERE food_class= '".$food."'")or die(mysqli_error($db));
						
						
								if(mysqli_num_rows($query) == 1){
							
								$row = mysqli_fetch_array($query);
								
								$_SESSION['food_id'] = $row['food_id'];
								$_SESSION['food_class'] = $row['food_class'];
								header("Location: customer_order.php");
														
						} else {
							
							$invalid = "Invalid Choice. Please try again";
							header("Location: home.php?invalid=$invalid");	
						}
						
						
					} else {
					
								foreach($error as $err){
							
								echo '<p class="error">*'.$err.'</p>';	
							}
						
					}
				
			}
			?><form action="search_home_unregister.php"	method="post">	
                            <p>
						 
                                 <select  name="food">
                                 
                                 <option value="">Delicacies
                                 </option>
                                 
                                 
                                  <?php
		
		$select = mysqli_query($db,"SELECT * FROM category")
		or die(mysqli_error($db));
		
		while ($flow= mysqli_fetch_array($select)) //here, it coverts the array $row into associative and index array. meaning, the category id column is seen as the key in an array, and the value is seen as the category name.
		
		{
		
		?>
        
        <option  value="<?php echo $flow['cat_id'] ?>" >
        		<?php echo $flow['cat_name'] ?>
                
        </option>
        <?php } ?>
         </select>  
         
         <input type="submit" name="search" value="Enter"/>
                              </p>
                              </form>
                              </div>    
                                  

    
    	</div>
        
        
  <div id=link>
                	<div id="innerlink1">
                    <img src="../images/download (1).jpg" height="162" width="270"  />
                    
     				 </div>
                    
                    
    				<div id="innerlink2">
                    <img src="../images/download.jpg" height="162" width="270"  />
                    
                    </div>
                    
                    <div id="innerlink3">
                    <img src="../images/images.jpg" height="162" width="270"  />
                    
                    </div>
                    
                    <div id="innerlink4">
   					<img src="../images/Chickery-Fish-Geelong.jpg" height="162" width="230"  />
                    </div>
                    
                     <h2 >Food delivery in Nigeria - the best place to experience culinary diversity!</h2>
  </div>         
                    <div id="content">
                   	<div id="content1">
                    <img src="../images/img.png" />
                    
                    <h3 align="center">Use our search box to discover local restaurants. Chownownow searches its network of delivery restaurants, and shows you a list of restaurants that deliver to you. Delivery to your home, office or campus, or wherever you may be.</h3>
                    
                    </div>
                    <div id="content2">
                    <img src="../images/img2.png" />
                    <h3 align="center">Browse food delivery and takeout restaurants menus, read reviews, and enjoy coupons and discounts. You can choose a restaurant according to a cuisine you like, such as Pizza, Chinese food, Thai food, Indian, and even Mexican food, by their distance from you, rating or by reviews left by other customers.</h3>
                    </div>
                    <div id="content3">
                    <img src="../images/img3.png" />
                    <h3 align="center">View the menu, choose delicious items you like and place your order online. Our service is completely free. It's as easy as one, two, three! Chownownow is much better than ordering over the phone. Like we always say, "Don't be on hold, be online."</h3>
                    </div>
                       
                    </div>
                    <div id="footer">
                    <h3 align="center">Get in Touch</h3>
                    <p>
                    <a href=""><img src="../images/Instagram.png" width="30" height="30" /></a>
                    <a href=""><img src="../images/Facebook.png"width="30" height="30" /></a>
                    <a href=""><img src="../images/Twitter.png"width="30" height="30" /></a>
                	</p>
                    </div>
    
                
                
               














</div> <!-- CLOSING CONTAINER DIV -->

</body>
</html>