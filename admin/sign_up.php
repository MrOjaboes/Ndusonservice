<?php session_start();?>
  <?php
if(!isset($_SESSION['email'])){
     header('location:../index.php');
}else{
?>

<?php
include "includes/connection.php";
include "includes/header.php";


if(isset($_POST['sign'])){
 
	$fname = htmlspecialchars($_POST['fname']);
	$email = htmlspecialchars($_POST['email']);	  	 
	$role = htmlspecialchars($_POST['role']);	  	 
	$password = htmlspecialchars($_POST['password']);
	$cpassword = htmlspecialchars($_POST['cpassword']);
	$message = '';
	//$image = $_FILES["image"];
		if(!empty($fname) && !empty($email)&& !empty($role)&& !empty($password)&& !empty($cpassword)){
 

     
     // checking emails of users     
$sql3 = "SELECT Email FROM users WHERE email = '$email'";
	$result = mysqli_query($connect,$sql3)or die(mysqli_error($connect));
	$numrow = mysqli_num_rows($result);
	if($numrow != 0){
		$message .= '<h class="alert alert-danger" >This email already existed, please try other!</h4>';
		exit;
	}else{
		
		
       //confirming password inputed
		if($password !== $cpassword){
		$message=  '<h4 class="alert alert-danger">your password do not match!</h4>';
		if(@$message){
				 exit;
	} 
		}else{
		$encpassword = md5($password);
	 
	$sql = "INSERT INTO users (fname,email,role,password) VALUES('$fname', '$email', '$role', '$encpassword')";
	$result = mysqli_query($connect,$sql)or die(mysqli_error($connect));
	if($result){
		 $message .=  '<h4 class="alert alert-success" >user added successfully!</h4>';
				 //header("location:../index.php");
	}else{
		$message .=  '<h4 class="alert alert-danger" >Error with registeration!</h4>';
		exit;
	}
}
}
	}
}
	
 ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User Page
                <small>Add User</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="users.php" class="active">Users</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <?php echo $message ?>

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">User </h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-md-3 col-sm-4 col-xs-4"></div>
                    <div class="col-md-6 col-sm-4 col-xs-4">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
						<label>Full Name</label>
                            <input type="text" class="form-control" placeholder="Full Name" name="fname" required>
                        </div>
						
						<div class="form-group">
						<label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                        </div>
						
						<div class="form-group">
						<label>Role</label>
						<select class="form-control" name="role" title="user's role" required>		 
						<option value="admin">admin</option>
						<option value="user">user</option>		 		 
						</select>
						</div>
						
						<div class="form-group">
						<label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
						
						<div class="form-group">
						<label>Comfirm Password</label>
                            <input type="password" class="form-control" placeholder="Comfirm Password" name="cpassword" required>
                        </div>
                         
						</br>
						</br>
						</br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="sign" >Sign Up</button>
                             
                        </div>
                    </form>
                </div>
                 
                <div class="col-md-3 col-sm-4 col-xs-4"></div>
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