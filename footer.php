
<style>
	
.footer{
  /*position: fixed;*/
   left: 0;
   bottom: 0;
   width: 100%;
   background:#F8F9FA; 
   margin-bottom: 0px !important;
   padding:2rem 2rem 4rem;
   /*color: white;*/
   /*text-align: center;*/
}

</style>

	<div class="container-fluid animatedParent footer"> 
	    <div class="container">
			<a class="navbar-brand" href="index.php"><span style="color:green;font-family: 'Permanent Marker', cursive;">HungerBuzz</span></a>
				<?php
				if(!empty($id))
					{
				?>
			<a class="navbar-brand" style="color:black; text-decoration:none;"><i class="far fa-user"><?php if(isset($id)) { echo $vr['fld_name']; }?></i></a>
				<?php
					}
				?>
			<div class="row animated fadeIn">
							  
			<!--  <div class="col-md-4" style=" border-right:1px solid black;">
			<ul>
			  <li><h5>ADMIN SECTION</h5></li>
			  <li><a href="admin.php">Admin Login</a></li>
			</ul>
			</div> -->

			<div class="col-md-6 text-center" style=" border-right:1px solid black;">
			 <ul>
			  
			<li class="nav-item">
			<form method="post">
				<?php
				if(empty($cust_id)){
				?>
			<li><h5>LOGIN</h5></li>
			<li><a href="vendor-new.php"><button class="btn" name="login" type="submit">Register with us</button> /</a><button class="btn" name="login" type="submit">Log In</button></li>
			<?php
				}
				else
				{
			?>
			<li class="nav-item">
	          <a class="nav-link" href="form/profile.php">Profile</a>
	        </li>
			<button class="btn my-2 my-sm-0" name="logout" type="submit">Log Out</button>
			<?php
				}
			?>
			</form>
	        </li>
	    </ul>
			  </div>

				<div class="col-md-6 text-center" style=" border-left:1px solid black;">
			     <ul>
				  <li><h5>HOTEL LINKS</h5></li>
				  <li><a href="vendor_login.php">Add Restaurants</a></li>
				  <li><a href="food.php">Add Foods</a></li>
				</ul>
			  </div>
		  </div>
	 </div>
	 			 
  </div>
