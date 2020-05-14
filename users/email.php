
<?php session_start();?>
  <?php
if(!isset($_SESSION['email'])){
     header('location:../index.php');
}else{
?>

<?php include('includes/connection.php');?> 
<?php
$message = "<h2></h2>";
  
if(isset($_POST['submit'])){     
          $new_email = $_POST['email'];    
            if(!empty($new_email)){
                
                    // edit the database and send them back to the server
                    $sql = "UPDATE users SET email='$new_email' WHERE Userid ='$_SESSION[Userid]'";
                    $query = mysqli_query($connect, $sql) or die(mysqli_error($connect));             
                    if($query){
                        $message .='success';
                        //$_SESSION['email'] = $new_email;
                header("Refresh:5; url=index.php");
                    }
            
                } 

                
         $sql2 = "SELECT * FROM users WHERE Userid ='$_SESSION[Userid]'";                     
         $select_query = mysqli_query($connect, $sql2);
         $count = mysqli_num_rows($select_query);
         if($count == 1){
            while($row = mysqli_fetch_array($select_query)){		       
                $_SESSION['email'] = $row['email'];
               
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
<?php
}
?>