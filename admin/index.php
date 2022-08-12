<?php include './admin_partials/_header.php';?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Admin - MyOnlineMeal</title>
	    <?php include './css.php';?>
        <link rel="icon" type="image/x-icon" href="../images/favicon-32x32.png">


  </head>
  <body>
  

<div class="wrapper">


        <div class="body-overlay"></div>
		
		<!-------------------------sidebar------------>
        <?php include_once('sidebar.php');?>

    <!-- Sidebar  -->
        
		
		<!--------page-content---------------->
		
		
		   
		   <!--top--navbar----design--------->
		<div id="content">
		   
		   <!--top--navbar----design--------->
		   
		   <?php include_once('nav.php');?>
		   
		   
		   	   
		   
                    <!--------main-content------------->
            <div id="mid-content" class="mid-content">
                
                <?php 
                    include_once('dashboard.php');       
                ?>
                
            </div>   


            
                        
                        <!---footer---->
            <div id="ftr">
                <?php include_once('footer.php');?>	
            </div>		 
					
	    </div>
</div>










</body>
  
</html>