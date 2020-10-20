<?php
include("connection.php");
extract($_REQUEST);
session_start();
if(isset($_SESSION['cust_id']))
{
	 $cust_id=$_SESSION['cust_id'];
	 $qq=mysqli_query($con,"select * from tblcustomer where fld_email='$cust_id'");
	 $qqr= mysqli_fetch_array($qq);
}
else
{
	$cust_id="";
}
if(Isset($vendor_id))
{
$vid= $vendor_id;
}
else
{
	header("location:index.php");
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

$query=mysqli_query($con,"select * from tblvendor where fldvendor_id='$vid'");
$row=mysqli_fetch_array($query);
echo $row['fld_name'];
$query=mysqli_query($con,"select tbfood.foodname,tbfood.fldvendor_id,tbfood.cost,tbfood.cuisines,tbfood.fldimage,tblcart.fld_cart_id,tblcart.fld_product_id,tblcart.fld_customer_id from tbfood inner  join tblcart on tbfood.food_id=tblcart.fld_product_id where tblcart.fld_customer_id='$cust_id'");
  $re=mysqli_num_rows($query);
?>
<html>
  <head>
     <title>Home</title>
	
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
     <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	 <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Permanent+Marker" rel="stylesheet">
     
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
<style>
#aboutus{
     background-image:url("img/main_spice2.jpg");
	 background-repeat: no-repeat;
	 background-attachment: fixed;
	  background-position: center;
  
}

ul li {list-style:none;}
ul li a{color:black; font-weight:bold;}
ul li a:hover{text-decoration:none;}


</style>
  </head>
  
    
	<body>
	

<div id="result" style="position:fixed;top:100; right:50;z-index: 3000;width:350px;background:white;"></div>
<?php include('header-cust.php');?>
<br><br><br><br>
<!--menu ends-->
<div class="container" >
<img src="img/five-points-proposed-hotel-2012.jpg" alt="no Pic Available" height="400px" width="100%">
</div>
<div class="container-fluid" >
<br><br>
<div class="row">
   <div class="col-sm-1"></div>
   <div class="col-sm-10" >
   <h3 style="color:#01C699;text-transform:uppercase;"><?php echo $row['fld_name']; ?></h3><br><br>
   <span style="color:#A5A5A5;font-size:25px;text-transform:uppercase;"><i class="fas fa-home"></i></span>&nbsp;&nbsp;<span style="font-family: 'Tangerine', serif; font-weight:bold;font-size:25px; color:#ED2553;"><?php echo $row['fld_address']?></span><br><br>
   <span style="color:#A5A5A5;font-size:25px;"><i class="fas fa-phone"></i></span>&nbsp;&nbsp;<span style=" font-size:25px; color:#ED2553;"><?php echo $row['fld_phone']?></span><br><br>
   <span style="color:#A5A5A5;font-size:25px;"><i class="fa fa-mobile" aria-hidden="true"></i></span>&nbsp;&nbsp;<span style=" font-size:25px; color:#ED2553;"><?php echo $row['fld_mob']?></span><br><br>
   <span style="color:#A5A5A5;font-size:25px;"><i class="fas fa-at"></i></span>&nbsp;&nbsp;<span style=" font-size:25px; color:#ED2553;"><?php echo $row['fld_email']?></span><br><br>


   
   </div>
   
   <div class="col-sm-1"></div>
</div>
</div>

<!--footer primary-->
	     <?php
		 include("footer.php");
		 ?>
</body>

</html>