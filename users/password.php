
<?php session_start();?>
  <?php
if(!isset($_SESSION['email'])){
     header('location:../index.php');
}else{
?>

<?php include('includes/connection.php');?> 
<?php
$message = "";
if(isset($_POST['submit'])){              
    $old_pass = mysqli_real_escape_string($connect, $_POST['oldpassword']);   
    $new_pass = mysqli_real_escape_string($connect, $_POST['newpassword']);
    $comfirm_pass = mysqli_real_escape_string($connect, $_POST['cpassword']);
    
    if(!empty($comfirm_pass) && !empty($new_pass)){
        $sql = "SELECT * FROM users WHERE Userid ='$_SESSION[Userid]'";                     
        $query = mysqli_query($connect, $sql);
        while($row = mysqli_fetch_array($query)){		       
            $dbpassword = $row['password'];
           
                if($new_pass == $comfirm_pass){
                     // edit the database and send them back to the server           
                     echo'my fault';
                 $enc_pass = md5($comfirm_pass);
                 $sql1 = "UPDATE users SET password ='$enc_pass' WHERE Userid ='$_SESSION[Userid]'' ";
                 $query = mysqli_query($connect, $sql1) or die(mysqli_error($connect));             
                 if($query){
                     $message .='<h5 class="alert alert-success">Password Changed Successfully!</h5>';
              header("Referesh :2,url:index.php");
                  }
             }else{ $message .='<h5 class="alert alert-danger">New Password Do not Match!</h5>';}
              
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
                  <?php echo $message;?>
                    <form method="post" action="">					
						 
						
						<div class="form-group">                         
						<label>Old Password </label>
                            <input type="password" disabled class="form-control" name="oldpassword" value="<?php echo $_SESSION['password']; ?>" >
                        </div>

                        <div class="form-group">                         
						<label>New Password </label>
                            <input type="password" class="form-control" name="newpassword">
                        </div>

						<div class="form-group">                         
						<label>Comfirm Password </label>
                            <input type="password" class="form-control" name="cpassword" placholder="Comfirm password">
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