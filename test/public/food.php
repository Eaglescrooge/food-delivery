<?php

include('../includes/header.inc.php');

?>

<?php

    if(isset($_GET['cat_id']) && isset($_GET['cat_name'])){

      $cat_id = $_GET['cat_id'];
      $cat_name = $_GET['cat_name'];
    }


?>
 <?php


 $error = array();
		  
	  		if(isset($_POST['aoc'])){
				
				if(empty($_POST['p_type'])){
					
					$error[] = "Please enter a selection";
					
					}else {
						$p_type =  $_POST['p_type'];
						
					}
				
				
				
				if(empty($_POST['del_address'])){
					
							$error = "Please enter your Delivery Address";
					
					} else {
						
						$del_address  =  $_POST['del_address'];
						
						}
						
						if(empty($error)){
						
						$_SESSION['payment_type'] = $p_type;
						$_SESSION['delivery_address'] = $del_address;
						
							$query = mysqli_query($db, "INSERT INTO cart_two(payment_type, delivery_address)
																			Values ('".$p_type."',
																					'".$del_address."' )")
										 or die(mysqli_error($db));	
							
							
							}else  {
									foreach($error as $error) {
										echo "<p> $error</p>";
									}
				
							}
				
				}
	  

?>
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
								 padding: 40px 25px;
								 font-family:Tahoma, Geneva, sans-serif;
								 font-size:20px;
								 clear:both;

								}
							#logotext a{text-decoration:none;

							}


	#table  th {font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
			font-size:26;
			}
			#table td{font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;

			}
	#table{border:1px solid hidden;
			width:50% auto;
			height:auto;
			margin:70px;
			padding-left: 25%;
			color:orange;
			background-color:#C69;
	}		

	#table table{border-color:white;
				

	}


	#table2{border:1px solid red;
			width:auto;
			padding-left:25%;
			font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
			font-size: 45;
			color:orange;
			background-color:#C69;px
	}
	#table p{font-size:20px;
			font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
	}

	#table input{color:orange;}
</style>


<form method = "POST" action="add_to_cart.php">


<div id=header>
    
   <div id=logo>
    </div>
    <div id=logotext>
   	<p><a href="home.php">Home</a> | <a href="">AboutUs</a> | <a href="contact_form.php">ContactUs</a> | <a href="" ><img src="../images/cart.png" width="20" height="20" /></a></p>
    <p align="right"><a href="login_register.php"> Sign In </a> |
    <a href="login_register.php" > Sign Up </a> </p>
    </div>
    </div>

<div id="table">
<table >
<tr>
        <th>Name of Dish</th>
        <th>Quantity Available</th>
        <th>Price</th>
        <th>plates</th></tr>

<?php
    $i = 0;
      $select = mysqli_query($db, "SELECT * FROM food
                                  WHERE cat_id='".$cat_id."'
                                  ") or die(mysqli_error($db));


      while($row = mysqli_fetch_array($select)){
        extract($row);
        //echo $row['food_name'];
        $food_id = $row['food_id'];
        //$food_name = $row['food_name'];
$i++;




        ?>


<tr>
           <input type="hidden" name = "foodID<?php echo $i; ?>" value="<?php echo $row['food_id']; ?>" />
          <td><?php echo $row['food_name']; ?></td>
          <input type="hidden" name = "foodName<?php echo $i; ?>" value="<?php echo $row['food_name']; ?>" />
          <td><?php echo $row['quantity_plate']." plates"; ?></td>
          <input type="hidden" name = "quantity<?php echo $i; ?>" value="<?php echo $row['quantity_plate']; ?>" />
          <td><?php echo $row['price']; ?></td>
          <input type="hidden" name = "price<?php echo $i; ?>" value="<?php echo $row['price']; ?>" />
          <td><input type="number"  max = "<?php echo $row['quantity_plate']; ?>" name="plates<?php  echo $i; ?>"  /></td>
</tr>
		<div>	
<?php
			


       } ?>
       
        <div id="table2"> 
<input type="hidden" name = "count" value="<?php echo $i; ?>" />

      </table>
      <br>
     
      <p> Payment Type: WebPay<input type="radio" name="p_type" value="Webpay"/> 
            				Payment On Delivery<input type="radio" name="p_type" value="POD" /> </p>
                            
        <p> Delivery Address: <textarea name="d_addy" rows="30" cols="30" > </textarea> </p>
                            
       <p> <input type="submit" name="aoc" value = "ADD TO CART" /> </p>
      </form>

	</div>