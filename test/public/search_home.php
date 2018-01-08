
<?php

include('../includes/header.inc.php');
?>
<title></title>
  <style>

     .listing {
       display: inline;
       margin: auto;
     }


     img {
       width: 100%;
       height: 300px;
       margin: 10px;
       margin: auto;

     }
p.notification{

  background: #F60;
  color: #ffffff;
  font-family: cursive;
  font-weight: 500;
  font-size: 1em;
  display: block;
  text-decoration: none;

}
p.notification a {
  color: #ffffff;
  weight: 500;
  font-size: 1.5em;
  text-decoration: none;
  text-align: center;
}

p.notification button{
	height:40px;
	background-color:green;
	color:white;

	}

/* Column Classes
 *
 * Width: 1200px
 * Gutter: 20px
 * Link: http://www.billerickson.net/column-class-generator/
--------------------------------------------- */

.five-sixths,
.four-sixths,
.four-fifths,
.one-fifth,
.one-fourth,
.one-half,
.one-sixth,
.one-third,
.three-fourths,
.three-fifths,
.three-sixths,
.two-fourths,
.two-fifths,
.two-sixths,
.two-thirds {
	float: left;
	margin-left: 1.66666666667%;

}

.one-half,
.three-sixths,
.two-fourths {
	width: 49.1666666667%;
}

.one-third,
.two-sixths {
	width: 32.2222222222%;

}

.four-sixths,
.two-thirds {
	width: 66.1111111111%;
}

.one-fourth {
	width: 23.75%;
}

.three-fourths {
	width: 74.5833333333%;
}

.one-fifth {
	width: 18.6666666667%;
}

.two-fifths {
	width: 39%;
}

.three-fifths {
	width: 59.3333333333%;
}

.four-fifths {
	width: 79.6666666667%;
}

.one-sixth {
	width: 15.2777777778%;
}

.five-sixths {
	width: 83.0555555556%;
}

.rice {
	clear: both;
	margin-left: 0;
}


#header_one{
	margin:auto 30px;
	position:relative;
	top:70px;


	}

 #noty {
	 font-size:24px;


	 }

  </style>

</head>


<body>

<div id=header_one>

  <?php

      $query = mysqli_query($db, "SELECT * FROM category ORDER BY cat_id ASC") or die(mysqli_error($db));
	  $fetch = mysqli_query($db, " SELECT * FROM customers") or die(mysqli_error($db));

	  while($row = mysqli_fetch_array($fetch)) {


		   $_SESSION['cust_id'] = $row['customer_id'];
								$_SESSION['cust_name'] = $row['customer_firstname'].' '.$row['customer_lastname'];
								$_SESSION['e_addy'] = $row['email_address'];
								header("Location: add_to_cart.php");


	  }

      /*$result = mysqli_fetch_array($query);

      $cat_id = $result['cat_id'];
      $description = $result['description'];
      $cat_name = $result['cat_name']; */

      $url= "../images/"

?>
<p class="notification"> <span id=noty> Here you can check our various categories and see the several dishes we offer. If you look through and you find any dish you are dying to try (or eat) our order button does the whole trick. </span>
</p>
<div class="listing">
<?php
  while($result = mysqli_fetch_array($query)) {



extract($result)
    ?>

    <div class="one-third <?php echo strtolower($cat_name); ?>">
      <a href="#"><img src="<?php echo $url.strtolower($cat_name).".jpg"?>"></a>
      <p class="notification"><a href="<?php echo "?cat_id=".$cat_id ?>"><?php echo $cat_name ?></a><br>
      <span class="des"><?php echo $description; ?></span><br>
      <a href="food.php?cat_id=<?php echo $cat_id ?>&cat_name=<?php echo $cat_name ?>"><button id="bt">VIEW ALL <?php echo strtoupper($cat_name); ?></button></a></p>
    </div>

<?php } ?>
    <!-- <div class="one-third">
      <a href="#"><img src="../images/rice1.jpg"></a>
      <p class="notification"><a href="<?php echo "?cat_id=".$cat_id ?>">Local Dishes</a><br>
      <span class="des">We have curated our list of Nigerian Local dishes and they are great like that (I promise). Our local dishes are made with fresh veggies cos we know your body needs this and we have the best chef (awaiting his award to showcase) preparing this. Our varieties are not limited to Pounded yam, Amala, Tuwo kinchafa... Just look through and get ready to dig in.</span><br>
      <a href="#"><button>VIEW Category</button></a></p>
    </div>



    <div class="one-third last">
      <a href="#"><img src="../images/rice1.jpg"></a>
      <p class="notification"><a href="<?php echo "?cat_id=".$cat_id ?>">Spaghetti</a><br>
      <span class="des">Here you can see all the different types of rice we have, from fried rice, white rice, Jollof rice (this is our heritage), Designer rice (Not the Panda guy) and more. All our rice dishes have been carefully </span><br>
      <a href="#"><button>VIEW Category</button></a></p>
``    </div> -->

</div>

</body>
</html>
