<?php

include('../db/db_config.php');
include('../includes/functions/header_one.php');
include('../includes/functions/view_order.php');
session_start();
$customer_name = $_SESSION['cust_name'];
$email = $_SESSION['e_addy'];




$count = $_POST['count'];

for($i = 1; $i < $count; $i++ ){
	$id = $_POST['foodID'.$i];
	$foodName = $_POST['foodName'.$i];
	$quantity = $_POST['quantity'.$i];
	$price = $_POST['price'.$i];
	$plates = $_POST['plates'.$i];
	


	$rest = mysqli_query($db, "INSERT INTO cart_two(foodID, foodName, quantity, price, plates)
									Values ('".$id."',
											'".$foodName."',
											'".$quantity."',
											'".$price."',
											'".$plates."')"
									  			)  or die(mysqli_error($db));
			

	
	
	}
	
	
	$rested = mysqli_query ($db, "SELECT * FROM cart_two") or die(mysqli_error($db));
	
		
		
		if(mysqli_num_rows($rested) != 0){
		$p_type = $_POST['p_type'];
		$d_addy = $_POST['d_addy'];

			
			$fetch = mysqli_query($db, "INSERT INTO cart_two(payment_type, delivery_address)
										VALUES ('".$p_type."',
												'".$d_addy."')") or die(mysqli_error($db));
			
			
			
			
		}
		
		
		
		


	echo "<p> <span style='font-size:24px'> Customer $customer_name </span></p> <br/><hr/>";
	echo "<p><span style='font-size:24px'> Your Order is : </p></span>";

	?>

    <?php

	$new = mysqli_query($db, "SELECT * FROM cart_two") or die(mysqli_error($db));


?>
<html>
<head>
	<title> </title>

    </head>
    	<body>
			<table border="1" align="center">



			<tr>
    			<th> Food </th> <th> Quantity</th><th> Price </th><th> Plates </th><th>Amount</th>

    		 </tr>


     <?php


	 $viewOrder = showOrder($new);
			echo $viewOrder;


		$get = mysqli_query($db, "SELECT SUM( price * plates) as total
                            FROM cart_two
                            WHERE plates != 0") or die(mysqli_error($db));
  $total = mysqli_fetch_array($get);
  echo "<tr><td>{$total['total']}</td></tr>";

		  ?>
          
          

     </table>
     <?php

	$query = mysqli_query($db, "SELECT * FROM cart_two
                              WHERE plates != 0
                              ") or die(mysqli_error($db));

    while($row = mysqli_fetch_array($query)){
          extract($row);


        }

  $get = mysqli_query($db, "SELECT SUM( price * plates) as total
                            FROM cart_two
                            WHERE plates != 0") or die(mysqli_error($db));
  $total = mysqli_fetch_array($get);
  							echo "<br/> Your Total is #<tr><td>{$total['total']}</td></tr> ";
  									$_SESSION['total'] = $total['total'];
  
  
  
  $select = mysqli_query($db, "SELECT * from cart_two WHERE delivery_address !='' ") or die(mysqli_error($db));
  $rot = mysqli_fetch_array($select);
  
  				$del_addy = $rot[6];
  						echo " and your Delivery address is $del_addy ";
 
 
 
  ?>
     <form action="checkout.php" method="post">
     <br/>
    
     <p> <input type="submit" value="Click To confirm Order" name="order"> </p>


     </form>
</body>
</html>
