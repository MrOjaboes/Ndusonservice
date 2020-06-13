<?php session_start();?>
  <?php
if(!isset($_SESSION['email'])){
     header('location:../index.php');
}else{
?>
<?php include('includes/connection.php');?> 
<?php
$message = "<h2></h2>";
  $id = $_SESSION['Userid'];
  $uname = $_SESSION['fname'];
  $email = $_SESSION['email'];
  $password = $_SESSION['password'];
if(isset($_POST['submit'])){     
          $new_username = $_POST['fname']; 
          $new_email = $_POST['email']; 
          $new_password = $_POST['npassword']; 

            if(!empty($new_username) || !empty($new_email) || !empty($new_password)){
                $encpass = md5($new_password);
                    // edit the database and send them back to the server
                    $sql = "UPDATE users SET fname='$new_username', email='$new_email', password='$encpass' WHERE email ='$email'";
                    $query = mysqli_query($connect, $sql) or die(mysqli_error($connect));             
                    if($query){
                        $message .='<div class="alert alert-success">Profile Updated Successfully</div>';
                        $_SESSION['fname'] = $new_username;
                        $_SESSION['email'] = $new_email;
                header("Refresh:2; url=index.php");
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
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
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
                  <?php echo $message;?>
                    <form method="post" action="">					 
						 
						<div class="form-group">
						<label>User Name </label>
                            <input type="text" class="form-control" name="fname" value="<?php echo $uname; ?>" >
                        </div>

                        <div class="form-group">
						<label>Email </label>
                            <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" >
                        </div>

                         

                        <div class="form-group">
						<label>New Password </label>
                            <input type="password" class="form-control" name="npassword">
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
<?php
}
?>