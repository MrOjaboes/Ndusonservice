<?php include('includes/connection.php');?> 
<?php
$message = "<h2></h2>";
  
if(isset($_POST['submit'])){              
    
    $email = mysqli_real_escape_string($connect, $_POST['email']);    
    if(!empty($email)){
         
            // edit the database and send them back to the server
            $sql = "UPDATE users SET email='$email' WHERE Userid='$_SESSION[Userid]'";
            $query = mysqli_query($connect, $sql) or die(mysqli_error($connect));             
            if($query){
		 header("location:profile.php?pid=$dbid");
			 }
        } 
    } 

?>

 
<?php include "includes/header.php";?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Profile page
 <small class="text-success"><?php echo $_SESSION["fname"];?></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="profile.php" class="active">Profile</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Profile</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-info" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                         <button type="button" class="btn btn-danger btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
				  <div class="col-md-3"></div>
				  <div class="col-md-6"> 
                    <form method="post" action="">					
						 
						
						<div class="form-group">
						<label>User Email </label>
                            <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['email']; ?>" >
                        </div>
						
			 
							 
                        <div class="form-group">                             
                            <button type="submit" class="btn btn-success" name="submit">Update</button>
                        </div>
                    </form>
                </div>
				<div class="col-md-3"></div>
                </div>
                <!-- /.box-body -->
                 
            </div>
            <!-- /.box -->

        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


<?php
include_once "includes/footer.php";?>