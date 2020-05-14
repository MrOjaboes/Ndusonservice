<?php session_start()?>   
 <?php
 $message = '';
 session_destroy();
 $message='<p class="text-success">Loading........</p>';
 if(@$message){
header("Refresh:1; url=index.php");
 }
 
 ?>
 
 
  
 