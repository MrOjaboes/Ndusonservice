<?php session_start();?>
  <?php
if(!isset($_SESSION['email'])){
     header('location:../index.php');
}else{
?>  
<?php include "includes/connection.php";?>
<?php include "includes/header.php";?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User Page
                <small>Registered Users</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="users.php" class="active">Users</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Registered Users</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-info" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-danger btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                         
                    </div>
                </div>
                <div class="box-body">
				 
				<div class="panel panel-default">
            <div class="panel-heading"><h2 class="text-center">Manage Registered Users</h2></div>			
            </div>
            <a href="user.php" class="btn btn-success">Add New User</a><br/><br/>
			<div style="overflow-y:scroll;height:250px;" class="table-responsive">
            <table class="table table-hover">

                <tr class="active">
                <th>S/N</th>
				<th>Full Name</th>			 				 				 			 
				<th>Email</th>			 				 				 			 
				<th>Date Added</th>
                    <th colspan="3"></th>
                </tr>
				
                <?php
  
                    $sn = 1;
                $sql = "SELECT * FROM users WHERE role ='user' ORDER BY DateCreated DESC";
                $query = mysqli_query($connect, $sql);
                while($row = mysqli_fetch_array($query)){
                $id = $row['Userid'];                
				$fname = $row['fname'];
				$email = $row['email'];
				$date = $row['DateCreated'];
				$date_modified = $row['DateUdated'];
			
			//$date_modified = $row['PostingDate'];
 
 				//date formating
				 $cdate = new DateTime($date); 
				 //$cdate1 = new DateTime($date_modified); 
				 $mydate = $cdate->format('l, j F Y');
				 //$mydate1 = $cdate1->format('l, j F Y');
					

                ?>

                <tbody>
                <tr>
                    <td><?php echo $sn; ?></td>
                    <td ><?php echo $fname;  ?></td>
                    <td ><?php echo $email;  ?></td>
                    <td ><?php echo $mydate;  ?></td>
                     
                    <td>
					  <a href="delete_user.php?did=<?php echo $id ?>"><button name="delete" title="delete user" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                    </td>
                </tr>
                <?php  
				$sn++;
				}
				?>
                </tbody>
                



            </table>
</div>
        </div>
    </div>
                     </div>
					 </section>
                
             
             
<?php include_once "includes/footer.php";?>
<?php
}
?>