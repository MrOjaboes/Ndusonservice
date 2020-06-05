<?php session_start();?>
<?php
if(!isset($_SESSION['email'])){
     header('location:../index.php');
}else{
?>
 <?php include "includes/connection.php";?>
 
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ndusonservices  | Admin Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.min.css">
<link type="text/css" rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.css">

<script src="add.js"></script>
<script src="jquery-ui-1.12.1.custom/jquery.js"></script>
<script src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>

<script>
  $( function() {
    $( "#datepicker" ).datepicker();
    $( "#datepicker1" ).datepicker();
  } );
  </script>
  <link rel="stylesheet" href="dist/css/font-awesome.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  	<link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.min.css">
  <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="includes/user.css">
  <script type="text/javascript">
function create_rows() {
    // Find a <table> element with id="myTable":
                var table = document.getElementById("product");
        
// Create an empty <tr> element and add it to the 1st position of the table:
        var row = table.insertRow(1);
        
// Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);  
        var cell6 = row.insertCell(5);
        var cell7 = row.insertCell(6);

                cell1.innerHTML = "<input  name='capacity_one[]' type='text' /> "
                cell2.innerHTML = "<input name='ullage_one[]' type='text' />";
                cell3.innerHTML = "<input type='text' name='capacity_two[]'>";
                cell4.innerHTML = "<input type='text' name='ullage_two[]' />";
                cell5.innerHTML = "<input type='text' name='capacity_three[]' />";
                cell6.innerHTML = "<input type='text' name='ullage_three[]' />";                 
                cell7.innerHTML = "<a onClick='deleteRow(this);' style='cursor:pointer'><span class='glyphicon glyphicon-remove'></span></a>";
    }
  
	
	//deleteRow
	function deleteRow(btndel) {
			if (typeof(btndel) == "object") {
        $(btndel).closest("tr").remove();
    } else {
        return false;
    }
		}
</script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>N C C </b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Ndusonservices </b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->	  
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
 <span  style="margin:20px;color:white !important;align:center !important;font-size:25px !important;">NDUSON CONSTRUCTION COMPANY MANAGEMENT PORTAL</span>
	                  
      <div class="navbar-custom-menu">
	  
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
           
          <!-- Notifications: style can be found in dropdown.less -->
 
          <!-- User Account: style can be found in dropdown.less -->
           
          <!-- Control Sidebar Toggle Button -->
           
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">		 
          <img src="" class="img-circle" alt="">
        </div>
        <div class="">
         
        <?php  $name = $_SESSION['fname'];
             $subname = substr($name,0,1);
         ?>
        <div id="profile"><h4><?php echo $subname; ?></h4> </div>
        <br><br>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
  
      
          
      </div>
      <!-- search form -->
       
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span> </i>
          </a>
        </li>
		 
		
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
			<?php 
		  
	     $sql = " SELECT COUNT(*) AS total FROM users";	 
         $query = mysqli_query($connect, $sql) or die(mysqli_error($connect));
	     $row = mysqli_fetch_assoc($query);
	     $num = $row['total']; 
		?>
            <span>Users</span>
            <i class="label label-primary pull-right"><?php echo $num; ?></i>
          </a>
          <ul class="treeview-menu">
		  			<?php 
		  
	     $sql = " SELECT COUNT(*) AS total FROM users";	 
         $query = mysqli_query($connect, $sql) or die(mysqli_error($connect));
	     $row = mysqli_fetch_assoc($query);
	     $jnum = $row['total']; 
		?>
            <li><a href="sign_up.php"><i class="fa fa-circle-o"></i>Add User</a><i class="label label-primary pull-right"><?php echo $jnum;?></i></li>
             
            <li><a href="users.php"><i class="fa fa-circle-o"></i>Manage Users</a></li>
            
          </ul>
        </li>
		
		 <li class="treeview">
          <a href="#">
            <i class="fa fa-gears"></i>
            <span>Settings</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
		   
            <li><a href="username.php"><i class="fa fa-pencil"></i>Update Username</a></li>
            <li><a href="email.php"><i class="fa fa-pencil"></i>Update Email</a></li>
            <li><a href="password.php"><i class="fa fa-pencil"></i>Update Password</a></li>
            
          </ul>
        </li>
		
         <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Charts</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="chart.php"><i class="fa fa-circle-o"></i>Add Chart</a></li>
            <li><a href="charts.php"><i class="fa fa-circle-o"></i>Manage Charts</a></li>
            
          </ul>
        </li>
        <li><a href="../logout.php"><i class="fa fa-sign-out"></i> Sign out</a>
             </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<?php 
}
?>
