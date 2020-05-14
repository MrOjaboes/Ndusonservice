<?php session_start()?>   
 <?php
 $message = '';
 session_destroy();
 $message='<h3 class="alert alert-success">Connecting..............</h3>';
 if(@$message){
header('location : SMA/index.php');
 }
 
 ?>
 
 <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
     
    <title>Ndusonservices Ltd</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
     
  </head>
  <body>
    
  <div class="row">
  
<div class="col-md-3"></div>
<div class="col-md-6">
 
<hr />
  <p><?php echo @$message;?></p></br>
  <hr />
   
 
 </div>
<div class="col-md-3"></div>
</div>
       </body>
	   </html>
 