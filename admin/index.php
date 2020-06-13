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
        <!-- Main content -->
        <section class="content">
          <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-info" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-danger btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                         
                    </div>
                </div>
                <div class="box-body">
				 
				<div class="panel panel-default">
            <div class="panel-heading"><h2 class="text-center">Manage Uploaded Calibration Charts</h2></div>			 
			</div>
 
			
			 
			 		 
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="chart.php"><button name="add new chart" title="add new chart" class="btn btn-success">Add New Chart</button></a></p>
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
                        $sql = "SELECT * FROM caliberation_chart ORDER BY caliberation_chart_id DESC ";
                        $query = mysqli_query($connect, $sql);
                        while($row = mysqli_fetch_array($query)){
                        $id = $row['caliberation_chart_id'];
                        $client = $row['client'];
                        $transporter = $row['transporter'];
                        $serial_no = $row['serial_no'];
                        $date = $row['date_issued'];

                        $cdate = new DateTime($date); 
                        //$cdate1 = new DateTime($date_modified); 
                        $mydate = $cdate->format('l, j F Y');
                        //$mydate1 = $cdate1->format('l, j F Y');
                        

                        ?>

                <tbody>
                                    <tr>
                                        <td><?php echo $sn; ?></td>
                                        <td ><?php echo $client;?></td>
                                        <td ><?php echo $serial_no;?></td>
                                        <td ><?php echo $mydate;?></td>
                                        

                                        <td>
                                        <a href="edit_chart.php?uid=<?php echo $id ?>"><button name="edit" title="update chart" class="btn btn-success"><i class="fa fa-pencil"></i></button></a>
                                        <a href="chart_details.php?cid=<?php echo $id ?>"><button title="chart details" class="btn btn-info"><i class="fa fa-file"></i></button></a>
                                        <a href="delete_chart.php?did=<?php echo $id ?>"><button name="delete" title="delete chart" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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