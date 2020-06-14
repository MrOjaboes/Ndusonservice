<?php session_start();?>
  <?php
if(!isset($_SESSION['email'])){
     header('location:../index.php');
}else{
?>

<?php
include "includes/connection.php";

if(isset($_POST['sign'])){
 
	$fname = htmlspecialchars($_POST['fname']);
	$email = htmlspecialchars($_POST['email']);	  	 
	//$role = htmlspecialchars($_POST['role']);	  	 
	$password = htmlspecialchars($_POST['password']);
	$cpassword = htmlspecialchars($_POST['cpassword']);
	$message = '';
	//$image = $_FILES["image"];
		if(!empty($fname) && !empty($email)&& !empty($password)&& !empty($cpassword)){
 

     
     // checking emails of users     
$sql3 = "SELECT Email FROM users WHERE email = '$email'";
	$result = mysqli_query($connect,$sql3)or die(mysqli_error($connect));
	$numrow = mysqli_num_rows($result);
	if($numrow != 0){
		$message .= '<b class="alert alert-danger" >This email already existed, please try other!</b>';
		exit;
	}else{
		
		
       //confirming password inputed
		if($password !== $cpassword){
		$message .= '<b class="alert alert-danger">your password do not match!</b>';
		if(@$message){
				 exit;
	} 
		}else{
		$encpassword = md5($password);
	 
	$sql = "INSERT INTO users (fname,email,role,password) VALUES('$fname', '$email', 'user', '$encpassword')";
	$result = mysqli_query($connect,$sql)or die(mysqli_error($connect));
	if($result){
		 $message .=  '<p class="alert alert-success" >user added successfully!</p>';
			header("refresh:2; url=users.php");
	}else{
		$message .=  '<p class="alert alert-danger" >Error with registeration!</p>';
		exit;
	}
}
}
	}
}
	
 ?>

 <?php include "includes/header.php"; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">      

        <!-- Main content -->
        <section class="content">
        <div><?php echo $message ?></div>

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
						<label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
						
						<div class="form-group">
						<label>Comfirm Password</label>
                            <input type="password" class="form-control" placeholder="Comfirm Password" name="cpassword" required>
                        </div>
                         
						<br/>
		 
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" name="sign" >Sign Up</button>
                             
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