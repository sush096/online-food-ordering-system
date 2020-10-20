<link rel="stylesheet" type="text/css" href="style.css">


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


<body>
<?php
include('header-new.php');
?>

<!-- container 1 starts -->

<br><br><br>
<div class="container my-5">
  <div class="row">
	<div class="tab-pane fade show" id="ManageVendors" role="tabpanel" aria-labelledby="ManageVendors-tab">
			    <div class="container">
	               <table class="table">
	                 <thead>
		                    <tr>
	                        	<th scope="col">Hotel</th>
	                            <th scope="col">Name</th>
	                            <th scope="col">Address</th>
		                     </tr>
	                 </thead>
				 	<tbody>
					<?php
					$query=mysqli_query($con,"select  * from tblvendor");
					    while($row=mysqli_fetch_array($query))
						{
					
					?>			 
                    <tr>
                        
						<td><img src="image/restaurant/<?php echo $row['fld_email']."/" .$row['fld_logo'];?>" height="50px" width="100px"></td>

						<td><a href="search.php?vendor_id=<?php echo $row['fldvendor_id']; ?>"><span style="font-family: 'Miriam Libre', sans-serif; font-size:18px;color:#CB202D;">
						<?php echo $row['fld_name']; ?></span></a></td>
						<td><?php echo $row['fld_address'];?></td>
                     
                   	</tr>
						<?php
						}
						?>		   
                	</tbody>
           		  </table>
	 
	 			</div>   	
			 </div>
			</div>
		</div>
			<br><br><br><br><br>
 		<?php
			include("footer.php");
			?>
	</body>
</html>