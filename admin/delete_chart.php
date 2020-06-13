<?php session_start();?>
  <?php
if(!isset($_SESSION['email'])){
     header('location:../index.php');
}else{
?>

         <?php include('includes/connection.php');?> 
<?php
 
$message ='Are you sure you want to delete the following client\'s details?';

if(isset($_GET['did'])){
	$id = $_GET['did'];
	$sql2 = " SELECT * FROM caliberation_chart WHERE caliberation_chart_id ='$id' LIMIT 1 ";
    $query = mysqli_query($connect, $sql2) or die(mysqli_error($connect));
    while($row = mysqli_fetch_array($query)){
		
        $id = $row['caliberation_chart_id'];
        $client = $row['client'];
        $transporter = $row['transporter'];
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
            $sql = "DELETE FROM caliberation_chart WHERE caliberation_chart_id = '$dbid' ";
            $query = mysqli_query($connect, $sql) or die(mysqli_error($connect)); 
			 if($query){
				 header("location:charts.php");
} 
} 
 ?>


<?php require_once "includes/header.php";?> 
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
                <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">		
			
                <div class="box-header with-border">				
                <h3 class="box-title"></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                      <button type="button" class="btn btn-danger btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>							
                    </div>
                </div>
                <div class="box-body">
                    <h4 class="text-center"><b class="alert alert-danger"><?php echo $message;?></b></h4>
                      <h1><?php echo $client;?></h1>
                <div class="col-md-4 col-sm-4 col-xs-4"></div>
			<div class="col-md-4 col-sm-4 col-xs-4">
			<form action="" method="POST">
			<div class="form-group">
			 		<button class="btn btn-danger" type="submit" name="delete">YES </button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <a href="charts.php" class="btn btn-info">NO</a>
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