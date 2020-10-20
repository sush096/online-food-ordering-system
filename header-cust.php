	 <link rel="stylesheet" type="text/css" href="css/style.css">
	 

<br>
<nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
  
   <a class="navbar-brand" href="index.php"><span style="color:#f6f6f6;font-family: 'Permanent Marker', cursive; font-size:30px; font-weight: 400;">HungerBuzz</span></a>
    <?php
	if(!empty($cust_id))
	{
	?>
	<a class="navbar-brand" href="form/profile.php" style="color:white; text-decoratio:none;"><i class="far fa-user"><?php if(isset($cust_id)) { echo $qqr['fld_name']; }?></i></a>
	<?php
	}
	?>
	
	<button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
	
      <ul class="navbar-nav ml-auto">
	      
          
		  <li class="nav-item">
		     <a href="index.php" style="color:white;" class="nav-link">Home</a>
		  </li>
		  <li class="nav-item">
		     <a href="aboutus.php" style="color:white;" class="nav-link">About</a>
		  </li>
		  <!-- <li class="nav-item"> -->
		     <!-- <a href="services.php" style="color:white;" class="nav-link">Services</a> -->
		  <!-- </li> -->
		  <li class="nav-item">
		     <a href="contact.php" style="color:white;" class="nav-link">Contact</a>
		  </li>
		  <li class="nav-item">
				  <form method="post">
		          <?php
					if(empty($cust_id))
					{
					?>
					<a href="form/index.php?msg=you must be login first"><span style="color:red; font-size:24px;"><i class="fa fa-shopping-cart" aria-hidden="true"><span style="color:red;" id="cart" class="badge badge-light mr-2">0</span></i></span></a>
					<button class="btn btn-outline-light my-5 my-sm-0" name="login" type="submit">Log In</button>
		            <?php
					}
					else
					{
					?>
					
					<a href="form/cart.php"><span style=" color:green; font-size:24px;"><i class="fa fa-shopping-cart" aria-hidden="true"><span style="color:green;" id="cart"  class="badge badge-light mr-2"><?php if(isset($re)) { echo $re; }?></span></i></span></a>
					<button class="btn btn-outline-success my-5 my-sm-0" name="logout" type="submit">Log Out</button>
					<?php
					}
					?>
					</form>
		        </li>
				
		      
		
        
      </ul>
	  
    </div>
	
</nav>
