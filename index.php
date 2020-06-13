<?php session_start();?>
<?php include("includes/connection.php");?>
<?php include("includes/session.php");?> 
<?php 
if(isset($_POST['login'])){
              $message ='';
            $email = $_POST['email'];
            $password = $_POST['password'];
            $mdpassword = md5($password); 
                    if($email && $mdpassword){
                      $sql = "SELECT * FROM users WHERE email ='$email'";
                  $result = mysqli_query($connect,$sql)or die(mysqli_error($connect));
                  $numrow = mysqli_num_rows($result);
                  if($numrow !=0){
                while($row = mysqli_fetch_array($result)){
                $id = $row['Userid'];	      
                $name = $row['fname'];       
                $dbemail = $row['email'];       
                $role = $row['role'];      
                $dbpassword = $row['password'];
                $date = $row['DateCreated'];
                
	 
                
                $_SESSION['Userid'] = $id;        
                $_SESSION['role'] = $role; 
                $_SESSION['password'] = $dbpassword; 
                $_SESSION['fname'] = $name;      
                $_SESSION['email'] = $email;
                $_SESSION['DateCreated'] = $date;
                  
    if($email == $dbemail){
		if(isset($_POST['remember'])){
				 setcookie('Email',$email, time()*60*60*7);
			 }
             if($mdpassword == $dbpassword){
				 if($role == "admin"){
					      $id = $_SESSION['id'];
					 $activity = $_SESSION['username'].  'Has just logged in....';
					 $sql = "INSERT INTO activities(user_id, content) VALUES('$id', '$activity')";
				$query = mysqli_query($connect, $sql) or die(mysqli_error($connect));
					header('location:admin/index.php');  
				 }
			                 
            else if($role == "user"){
				  $id = $_SESSION['id'];
					 $activity = $_SESSION['fname'].  'Has just logged in....';
					 $sql = "INSERT INTO activities(User_id, content) VALUES('$id', '$activity')";
				$query = mysqli_query($connect, $sql) or die(mysqli_error($connect));
				header('location:users/index.php');
 
			}else{
				
				$id = $_SESSION['id'];
					 $activity = $_SESSION['fname'].  'Has just logged in....';
					 $sql = "INSERT INTO activities(User_id, content) VALUES('$id', '$activity')";
				$query = mysqli_query($connect, $sql) or die(mysqli_error($connect));
				header('location:index.php');
				
			}
            
							}else{
                $message .='<div class="alert alert-danger">password do not match!</div>';
              }
							}else{
                $message .='<div class="alert alert-danger">Email do not match!</div>';
              } 

							}

							}
							}
            }

 
?>

 
        <?php include('includes/header1.php');?>
        
       
        <div class="login-box">
          <div class="login-logo">
            <a href="../../index2.html"><b>N C C Limited</b></a>
          </div>
          <!-- /.login-logo -->
          <div class="login-box-body">
          <div><?php echo $message;?></div>
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="" method="post">
              <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div class="row">
                <div class="col-xs-4"></div>
                <!-- /.col -->
                <div class="col-xs-4">
                  <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
            <div class="col-xs-4"></div>
                <!-- /.col -->
              </div>
            </form>     
            
          </div>
          <!-- /.login-box-body -->
        </div>
        
        <!-- /.login-box -->

        <!-- jQuery 2.2.0 -->
        <script src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="../../bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="../../plugins/iCheck/icheck.min.js"></script>
        <script>
          $(function () {
            $('input').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue',
              increaseArea: '20%' // optional
            });
          });
        </script>

        </body>
        </html>
