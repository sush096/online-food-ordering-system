
<style>
	
	footer{
		 /*position: fixed;*/
  left: 0;
   bottom: 0;
   width: 100%;
   background:#F8F9FA; 
   margin-bottom: 0px !important;
   padding:2rem 2rem 4rem;
}
</style>


<footer>

<div class="container-fluid animatedParent" style="background:#F8F9FA; padding:15px 40px;"> 
		    <div class="container">
		      <a class="navbar-brand" href="index.php"><span style="color:green;font-family: 'Permanent Marker', cursive;">HungerBuzz</span></a>
			      <div class="row animated fadeIn">
				      
					  
					  <div class="col-sm-6" style=" border-right:1px solid black;">
					   <ul>
						  
						<li class="nav-item">
					 		<form method="post">
			          		<?php
								if(empty($cust_id))
								{
								?>
								<li><h5>LOGIN</h5></li>
								<li><a href="vendor-new.php"><button class="btn my-2 my-sm-0" name="register" type="submit">Register with us</button> / </a><button class="btn my-2 my-sm-0" name="login" type="submit">Log In</button></li>
					            <?php
								}
								else
								{
								?>
								<a class="navbar-brand" style="color:black; text-decoratio:none;"><i class="far fa-user"><?php if(isset($cust_id)) { echo $qqr['fld_name']; }?></i></a>
								<li class="nav-item">
						          <a class="nav-link" href="profile.php">Profile</a>
						        </li>
								<?php
								}
								?>
							  </div>
					  
					  <div class="col-sm-6" style=" border-left:1px solid black;">
					     <ul>
						  <li><h5>HOTEL LINKS</h5></li>
						  <li><a href="../vendor-new.php">Register On Food Hunt</a></li>
						  <li><a href="../vendor_login.php">Hotel Account Login</a></li>
						  <li><a href="../food.php">Add Foods</a></li>
						  
						</ul>
					  </div>
				  </div>
			 </div>
			 			 
		  </div>
		</footer>