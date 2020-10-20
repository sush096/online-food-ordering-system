<?php
session_start();


include("connection.php");
extract($_REQUEST);
$arr=array();
if(isset($_GET['msg']))
{
	$loginmsg=$_GET['msg'];
}
else
{
	$loginmsg="";
}
if(isset($_SESSION['cust_id']))
{
	 $cust_id=$_SESSION['cust_id'];
	 $cquery=mysqli_query($con,"select * from tblcustomer where fld_email='$cust_id'");
	 $cresult=mysqli_fetch_array($cquery);
}
else
{
	$cust_id="";
}
 


$query=mysqli_query($con,"select  tblvendor.fld_name,tblvendor.fldvendor_id,tblvendor.fld_email,
tblvendor.fld_mob,tblvendor.fld_address,tblvendor.fld_logo,tbfood.food_id,tbfood.foodname,tbfood.cost,
tbfood.cuisines,tbfood.paymentmode 
from tblvendor inner join tbfood on tblvendor.fldvendor_id=tbfood.fldvendor_id;");
while($row=mysqli_fetch_array($query))
{
	$arr[]=$row['food_id'];
	shuffle($arr);
}

//print_r($arr);

 if(isset($addtocart))
 {
	 
	if(!empty($_SESSION['cust_id']))
	{
		 
		header("location:form/cart.php?product=$addtocart");
	}
	else
	{
		header("location:form/?product=$addtocart");
	}
 }
 
 if(isset($login))
 {
	 header("location:form/index.php");
 }
 if(isset($logout))
 {
	 session_destroy();
	 header("location:index.php");
 }
 $query=mysqli_query($con,"select tbfood.foodname,tbfood.fldvendor_id,tbfood.cost,tbfood.cuisines,tbfood.fldimage,tblcart.fld_cart_id,tblcart.fld_product_id,tblcart.fld_customer_id from tbfood inner  join tblcart on tbfood.food_id=tblcart.fld_product_id where tblcart.fld_customer_id='$cust_id'");
  $re=mysqli_num_rows($query);
if(isset($message))
 {
	 
	 if(mysqli_query($con,"insert into tblmessage(fld_name,fld_email,fld_phone,fld_msg) values ('$nm','$em','$ph','$txt')"))
     {
		 echo "<script> alert('We will be Connecting You shortly')</script>";
	 }
	 else
	 {
		 echo "failed";
	 }
 }

?>
<html>
  <head>
     <title>Home</title>
     <style>
     	

     </style>
	 </head>
	 <body>
	 <?php include('header-new.php');?>
<div class="overlay"></div>

<div id="demo" class="carousel slide" data-ride="carousel">
	<div class="headline">
	<h1>HungerBuZZ</h1>
	    	<h5>Beat your hunger with buzz..</h5>
	    	<br>
	    </div>
	    <div class="search-container">
		    <a href="#"><form method="post"><input type="text" name="search_hotel" id="search_hotel" placeholder="Search Places " class="form-control search-bar" /></form></a>
		    <a href="#" class="ml-2 w-25"><form method="post"><input type="text" name="search_text" id="search_text" placeholder="Search by Food Name " class="form-control search-bar" /></form></a>
	    </div>
		
		<ul class="carousel-indicators">
		    <li data-target="#demo" data-slide-to="0" class="active"></li>
		    <li data-target="#demo" data-slide-to="1"></li>
		    <li data-target="#demo" data-slide-to="2"></li>
	  	</ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/coffee_beverage_cup_saucer_creative_continents_84944_1920x1080.png" alt="beverage" class="d-block w-100">
      <div class="carousel-caption">
        <h3>Hotel Taj</h3>
        <p>We had such a great time!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="img/coffee_cup_saucer_grain_foam_73571_1920x1080-min.png" alt="saucer grain" class="d-block w-100">
      <div class="carousel-caption">
        <h3>Hayat</h3>
        <p>Thank you, Hayat!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="img/fabienne-hubener-L3fTbd5euhI-unsplash.png" alt="saucer cup" class="d-block w-100">
      <div class="carousel-caption">
        <h3>Picasso</h3>
        <p>We love the Big Apple!</p>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<!--slider ends-->


<!-- widget -->

<!-- <div class="widget_wrap" style="width:320px;height:797px;display:inline-block;"><iframe src="products.php" style="position:relative;width:100%;height:100%;" border="0" frameborder="0"></iframe></div>
 -->

 <!-- widget close -->


<!--container starts-->
<div class="container mt-5">
  <div class="row">
	  	<div class="col-md-12 d-flex">
	    <div class="col-md-6 text-center ml-5">
	    	<a href="products.php">
	    		<div class="cards">
	    		<img src="img/order-food.png" width="300">
	    		<h5 class="mt-2">Order Food Online</h5>
	    		</div>
	    	</a>
	    </div>
	    <div class="col-md-6 text-center ml-5">
	    	<a href="restaurant.php">
		    	<div class="cards">
		    	<img src="img/place.png" width="300">
		    	<h5 class="mt-2">Visit A Place</h5>
		    	</div>
		    </a>
	    </div>
	  </div>
	</div>
</div>
<br><br>


<!--footer primary-->
	     
		    <?php
			include("footer.php");
			?>
			 			 
		  
	 
	 <script>
	 //search product function
            $(document).ready(function(){
	
	             $("#search_text").keypress(function()
	                      {
	                       load_data();
	                       function load_data(query)
	                           {
		                        $.ajax({
			                    url:"fetch2.php",
			                    method:"post",
			                    data:{query:query},
			                    success:function(data)
			                                 {
				                               $('#result').html(data);
			                                  }
		                                });
	                             }
	
	                           $('#search_text').keyup(function(){
		                       var search = $(this).val();
		                           if(search != '')
		                               {
			                             load_data(search);
		                                }
		                            else
		                             {
			                         $('#result').html(data);			
		                              }
	                                });
	                              });
	                            });
								
								//hotel search
								$(document).ready(function(){
	
	                            $("#search_hotel").keypress(function()
	                         {
	                         load_data();
	                       function load_data(query)
	                           {
		                        $.ajax({
			                    url:"fetch.php",
			                    method:"post",
			                    data:{query:query},
			                    success:function(data)
			                                 {
				                               $('#resulthotel').html(data);
			                                  }
		                                });
	                             }
	
	                           $('#search_hotel').keyup(function(){
		                       var search = $(this).val();
		                           if(search != '')
		                               {
			                             load_data(search);
		                                }
		                            else
		                             {
			                         load_data();			
		                              }
	                                });
	                              });
	                            });
		</script>
	</body>
</html>