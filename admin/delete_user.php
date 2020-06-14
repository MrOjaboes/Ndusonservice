<?php session_start();?>
  <?php
if(!isset($_SESSION['email'])){
     header('location:../index.php');
}else{
?>

         <?php include('includes/connection.php');?> 
<?php
 
$message ='';

if(isset($_GET['did'])){
	$id = $_GET['did'];
	$sql2 = " SELECT * FROM users WHERE Userid ='$id' LIMIT 1 ";
    $query = mysqli_query($connect, $sql2) or die(mysqli_error($connect));
    while($row = mysqli_fetch_array($query)){
		
        $id = $row['Userid'];
        $fname = $row['fname'];
        $email = $row['email'];
        $date = $row['PostingDate'];
        //$date_modified = $row['PostingDate'];
		 				//date formating
				 $cdate = new DateTime($date); 
				 //$cdate1 = new DateTime($date_modified); 
				 $mydate = $cdate->format('l, j F Y');
				 //$mydate1 = $cdate1->format('l, j F Y');
								
    }	
    
}

if(isset($_POST['delete'])){
           $dbid = $id;    
            $sql = "DELETE FROM users WHERE Userid = '$dbid' ";
            $query = mysqli_query($connect, $sql) or die(mysqli_error($connect)); 
			 if($query){
                $message .=  '<p class="alert alert-success" >user Deleted successfully!</p>';
                header("refresh:2; url=users.php");
} 
} 
 ?>


<?php require_once "includes/header.php";?> 
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           
            <h1>
                User Delete page
                <small> User's Details </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="users.php" class="active">Users</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        <div><?php echo $message ?></div>

            <!-- Default box -->
            <div class="box">		
			
                <div class="box-header with-border">
				
                    
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                      <button type="button" class="btn btn-danger btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>							
                    </div>
                </div>
                <div class="box-body">
                    <h4 class="text-center"><b class="alert alert-danger">Are You sure you want to delete this user's details</b></h4>
                      <h1><?php echo $fname;?></h1>
                <div class="col-md-4 col-sm-4 col-xs-4"></div>
			<div class="col-md-4 col-sm-4 col-xs-4">
			<form action="" method="POST">
			<div class="form-group">
			 		<button class="btn btn-danger" type="submit" name="delete">YES </button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <a href="users.php" class="btn btn-info">NO</a>
						 </div>
						 </form>
						 </div>
						 <div class="col-md-4 col-sm-4 col-xs-4"></div>
         
                </div>
                <!-- /.box-body --> 
                <div class="box-footer">
                    
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
        
    </div>
    <!-- /.content-wrapper -->

<?php require_once "includes/footer.php";?>
<?php
}
?>