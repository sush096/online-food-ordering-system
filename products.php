
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


<body style="background:#e9e9e9;">
<?php
include('header-new.php');
?>
<!--details section-->
 <br>
	<!--tab 1 starts-->   
	   <div class="tab-content mt-5" id="myTabContent">
	   
            <div class="tab-pane fade show active" id="viewitem" role="tabpanel" aria-labelledby="viewitem-tab">
                 <div class="container"><br>
	               <table class="table">
                 <thead>
                    <tr>
                            <th scope="col">Food View</th>
                            <th scope="col">Food Cuisines</th>
                            <th scope="col">Hotel Name</th>
                            <th scope="col">Price</th>
                            <th scope="col"></th>
                    </tr>
                 </thead>
				 <tbody>
	<?php
	// $food_id=$arr[0];
	$query=mysqli_query($con,"select tblvendor.fldvendor_id,tblvendor.fld_name,tblvendor.fld_email,tbfood.food_id,tbfood.foodname,tbfood.cuisines,tbfood.fldimage from  tblvendor right join tbfood on tblvendor.fldvendor_id=tbfood.fldvendor_id");
	    while($row=mysqli_fetch_array($query))
		{
		$food_id=$row['food_id'];
	?>			 
                
                    <tr>
                        <!-- <th scope="row"><?php //echo $row['fldvendor_id'];?></th> -->
						<td><img src="image/restaurant/<?php echo $row['fld_email']."/foodimages/" .$row['fldimage'];?>" height="50px" width="100px">
						<br><?php echo $row['foodname'];?>
						</td>
						<td><?php echo $row['cuisines'];?></td>
                        <td><?php echo $row['fld_name'];?></td>
                        <?php
                        $sql = mysqli_query($con, "SELECT cost, cuisines, paymentmode, fldimage FROM `tbfood` WHERE food_id=$food_id");
                        while ($rows=mysqli_fetch_array($sql)) {
                        ?>
                       <td><i  style="font-size:20px;" class="fas fa-rupee-sign"></i>&nbsp;<span style="color:green; font-size:25px;"><?php echo $rows['cost']; ?></span></td>

					 <form method="post">
					 <td style="text-align:left;padding:10px; font-size:25px;"><button type="submit" name="addtocart" value='<?php echo $row['food_id'];?>'><span style="color:green;"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span></button>
					 </td>
					 </form>
                   </tr>
		<?php
		}
	}
		?>		   
                </tbody>
           </table>
	 
	 </div>   	
		  
		   <span style="color:green; text-align:center;"><?php if(isset($success)) { echo $success; }?></span>
			
		
      	    </div>	 
      	</div>
      	
	  
<!--tab 1 ends-->	   
			
			
			 
	<br><br><br>
 <?php
			include("footer.php");
			?>
		  

</body>
	
</html>	