<?php include('includes/header.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">  
<?php 
$connect = mysqli_connect('localhost', 'root', '', 'school');
//display the content
 if(isset($_GET['eid'])){
	$id = $_GET['eid'];
	$sql = " SELECT * FROM staffs WHERE Staff_id ='$id' LIMIT 1 ";
	$sql2 = " SELECT * FROM staffs ";
    $query = mysqli_query($connect, $sql) or die(mysqli_error($connect));
    while($row = mysqli_fetch_array($query)){
        $_SESSION['dbid'] = $row['Staff_id'];
         $_SESSION['Name'] = $row['Name'];
         $_SESSION['Username'] = $row['Username'];
         $_SESSION['Email']= $row['Email'];
         $_SESSION['State'] = $row['State'];
        $_SESSION['Role'] = $row['Role'];
        
    }	
    $query = mysqli_query($connect, $sql2) or die(mysqli_error($connect));
    while($row = mysqli_fetch_array($query)){
        
        $state1 = $row['State'];
        $role1 = $row['Role'];
        
    }	
   
}


if(isset($_POST['update'])){
     $dbid = $_SESSION['dbid'] ;
    $name = htmlspecialchars($_POST['name']);
	$username = htmlspecialchars($_POST['username']);
	$email = htmlspecialchars($_POST['email']);
	$state = htmlspecialchars($_POST['state']);
	$role = htmlspecialchars($_POST['role']);	 	 
	 
     $message = '';
    if(!empty($name) ){
         
            $sql = "UPDATE staffs SET Name='$name',Username='$username',Email='$email',Role='$role',State='$state' WHERE Staff_id = '$dbid' ";
            $query = mysqli_query($connect, $sql) or die(mysqli_error($connect));
             
		 header("location:register.php");
        } 
}

 ?>
    

 
  
<div class="col-md-3"></div>
<div class="col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">Edit staff's Details</div>
</div>
 
<hr />
<strong><?php echo  $_SESSION['Name']; ?></strong>
<hr />
<form action="" method="POST">
     <div class="form-group">
   <label>Name</label></br>
   <input type="text" class="form-control"  name="name" value="<?php echo  $_SESSION['Name'];?>">
      </div>
	  
	  <div class="form-group">
   <label>Username</label></br>
   <input type="text" class="form-control"  name="username" value="<?php echo  $_SESSION['Username'];?>">
    </div>
	
    <div class="form-group">
	<label>Email</label></br>
   <input type="email" class="form-control" name="email" value="<?php echo  $_SESSION['Email'];?>">
    </div>
	
	 <div class="form-group">
  <label>Please select your role as a staff</label>
  <select class="form-control" name="role">
<option value="<?php echo  $_SESSION['Role'];?>"><?php echo  $_SESSION['Role'];?></option>
 <option>principal</option>
<option>non-academic staff</option>
<option>academic staff</option> 
</select>
</div>

<div class="form-group">
  <label>Please select your state</label>
  <select class="form-control" name="state">
<option value="<?php echo  $_SESSION['State'];?>"> <?php echo  $_SESSION['State'];?></option>
 <option>benue</option>
<option>sokoto</option>
<option>anambra</option>
<option>imo</option>
<option>enugu</option>
<option>lagos</option>
<option>kastina</option>
</select>
</div>

<div class="form-group">
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button type="submit" name="update" class="btn btn-success">UPDATE</button> 
 
</div> 
</form>
  </div>
<div class="col-md-3"></div>
</div>
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
<?php include('includes/footer.php');?>