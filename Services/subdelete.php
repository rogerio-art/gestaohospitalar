<?php 
include("../inc/connect.php") ;
if(isset($_GET['id']))
      {
      	$sql="DELETE FROM subservices WHERE  service_id=".$_GET['id']."";
      	//exit;
      	$write =mysqli_query($connection,$sql) or die(mysqli_error($connection));
            
              header("location:services.php");
      }
      else
      	echo "Not Sucess";
   ?>