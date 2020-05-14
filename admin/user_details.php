<?php session_start();?>
  <?php
if(!isset($_SESSION['email'])){
     header('location:../index.php');
}else{
?>

<?php require_once "includes/connection.php";?> 
<?php require_once "includes/header.php";?> 




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           
            <h1>
                Profile page
                <small> User's Details </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="users.php" class="active">Users</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

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
                    
					 
			  <div class="col-md-3 col-sm-2 col-xs-2"></div>
			<div class="col-md-6">         
			  
<?php
				 
                 
                if(isset($_GET['cid'])){
	$id = $_GET['cid'];
	$sql2 = " SELECT * FROM users WHERE Userid ='$id' LIMIT 1 ";
    $query = mysqli_query($connect, $sql2) or die(mysqli_error($connect));
    while($row = mysqli_fetch_array($query)){
		
        $id = $row['Userid'];
        $fname = $row['fname'];
        $email = $row['email'];
        $role = $row['role'];
        $date = $row['DateCreated'];
        
         
        //$date_modified = $row['PostingDate'];
 
 				//date formating
				 $cdate = new DateTime($date); 
				 $expiry_date = new DateTime($expiry_date); 
				 $mydate = $cdate->format('l, j F Y');
				 $mydate1 = $expiry_date->format('l, j F Y');
								
		 
    }	
    
} 
                    ?>
			  		 			
			<div class="page-header" style="margin-top:5px;align:center;">  
 <h2 class="text-center"><strong><em class="text-success"><?php echo $fname;?></em></strong></h2>
  </div>

  <table class="table table-striped ">
 


<tbody  class="">
<tr class="active">
    
   <tr>
   <td><strong>User name</strong></td>
   <td><?php echo $fname;?></td>
   </tr>
   <td><strong>Email</strong></td>
   <td><?php echo $email;?></td>
   </tr>
   <td><strong>Role</strong></td>
   <td><?php echo $role;?></td>
   </tr>
   <tr>
   <td><strong>Enrolled On :</strong></td>
   <td><?php echo $mydate;?></td>
	</tr>
 
	</tr>
	  
	
	</tr>
	</tbody>
</table> 
                </div>
				<div class="col-md-3 col-sm-2 col-xs-2"></div>
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