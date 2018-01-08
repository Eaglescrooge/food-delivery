<?php

include('../includes/header.inc.php');

$customer_name = $_SESSION['cust_name'];
$customer_id = $_SESSION['cust_id'];
$email = $_SESSION['e_addy'];
$total = $_SESSION['total'];


?>

<?php

 $rest = mysqli_query($db, "SELECT * from cart_two") or die(mysqli_error($db));
 $show = mysqli_query($db, "SELECT * from cart_two WHERE delivery_address !='' AND payment_type != ''") or die(mysqli_error($db));
 

 $result = mysqli_fetch_array($rest);
 
 while($flow = mysqli_fetch_array($show)){
	 $food_name = $result['foodName'];
	 $p_type = $flow[5];
	 $d_addy = $flow[6];
	 $quantity = $result['quantity'];
	 $plates = $result['plates'];
	 
	 
	 
	 $select = mysqli_query($db, "INSERT INTO transaction_details 
	 										VALUES(NULL,
													NOW(),
												'".$customer_name."',
												'".$customer_id."',
												'".$food_name."',
												'".$p_type."',
												'".$total."',
												'".$d_addy."')
											 
												 ") or die(mysqli_error($db));
												 
												 
									 
												 
							if($quantity <  $plates) {
								
								$error = "Food is Finished";
							}else{
							
										$new = $quantity - $plates;
								
								
								$update = mysqli_query($db, " UPDATE food set quantity_plate = '".$new."' 
																WHERE food_name = '".$food_name."'") 
																or die(mysqli_error($db));
								
								
												 
							}
							$select = mysqli_query($db, "SELECT * FROM cart_two") or die(mysqli_error($db));
							
							if (mysqli_num_rows($select) != 0 )
							{
								
								$insert = mysqli_query($db, "TRUNCATE TABLE cart_two") or die(mysqli_error($db));
								
								
								}
											
	 																
	 
	 }
 



?>
  
<?php

echo "Thanks for choosing Chownow Online restaurant";

?>