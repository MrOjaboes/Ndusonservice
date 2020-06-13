<?php session_start();?>
  <?php
if(!isset($_SESSION['email'])){
     header('location:../index.php');
}else{
?>

 <?php include('includes/connection.php');?> 
<?php
$message = "<h2></h2>";
 
if(isset($_GET['uid'])){
    $projectID = $_GET['uid'];
    $sql = "SELECT * FROM caliberation_chart WHERE caliberation_chart_id ='$projectID'";
      // $sql = "SELECT * FROM caliberation_chart WHERE caliberation_chart_id ='$projectID' ";
    $query = mysqli_query($connect, $sql) or die(mysqli_error($connect));
    while($row = mysqli_fetch_array($query)){
         $id = $row['caliberation_chart_id'];
        $client = $row['client'];
        $transporter = $row['transporter'];
        $date = $row['PostingDate'];
        $nominal_volume = $row['nominal_volume'];
        $truck_reg = $row['truck_reg'];
        $truck_make = $row['truck_make'];
        $cmp1 = $row['cmp1'];
        $oheight1 = $row['oheight1'];
        $mhn_height1 = $row['mhn_height1'];
        $l_height1 = $row['l_height1'];
        $cmp2 = $row['cmp2'];
        $oheight2 = $row['oheight2'];
        $mhn_height2 = $row['mhn_height2'];
        $l_height2 = $row['l_height2'];
        $cmp3 = $row['cmp3'];
        $oheight3 = $row['oheight3'];
        $mhn_height3 = $row['mhn_height3'];
        $l_height3 = $row['l_height3'];
        $air = $row['air_balloon_def'];
        $spring = $row['spring'];
        $product_used = $row['product_used'];
        $validity_period = $row['validity_period'];
        $expiry_date = $row['expiry_date'];
        $serial_no = $row['serial_no'];
        $dateOfIssue = $row['date_issued'];
        //$date_modified = $row['PostingDate'];
 
 				//date formating
				 $cdate = new DateTime($dateOfIssue); 
				 $expiry_date = new DateTime($expiry_date); 
				 $mydate = $cdate->format('l, j F Y');
				 $mydate1 = $expiry_date->format('l, j F Y');
    }
}


if(isset($_POST['submit'])){
    $ThisID =  $_GET['uid'];
    $client = mysqli_real_escape_string($connect, $_POST['client']);
    $transporter = mysqli_real_escape_string($connect, $_POST['transporter']);
    $dateOfIssue = mysqli_real_escape_string($connect, $_POST['dis']);
    $nominal_volume = mysqli_real_escape_string($connect, $_POST['nominal_volume']);
    $truck_reg = mysqli_real_escape_string($connect, $_POST['truck_reg']);
    $truck_make = mysqli_real_escape_string($connect, $_POST['truck_make']);
    $cmp1 = mysqli_real_escape_string($connect, $_POST['cmp1']);
    $oheight1 = mysqli_real_escape_string($connect, $_POST['oheight1']);
    $mhn_height1 = mysqli_real_escape_string($connect, $_POST['mhn_height1']);
    $l_height1 = mysqli_real_escape_string($connect, $_POST['l_height1']);
    $cmp2 = mysqli_real_escape_string($connect, $_POST['cmp2']);
    $oheight2 = mysqli_real_escape_string($connect, $_POST['oheight2']);
    $mhn_height2 = mysqli_real_escape_string($connect, $_POST['mhn_height2']);
    $l_height2 = mysqli_real_escape_string($connect, $_POST['l_height2']);
    $cmp3 = mysqli_real_escape_string($connect, $_POST['cmp3']);
    $oheight3 = mysqli_real_escape_string($connect, $_POST['oheight3']);
    $mhn_height3 = mysqli_real_escape_string($connect, $_POST['mhn_height3']);
    $l_height3 = mysqli_real_escape_string($connect, $_POST['l_height3']);
    $air = mysqli_real_escape_string($connect, $_POST['air']);
    $spring = mysqli_real_escape_string($connect, $_POST['spring']);
    $product = mysqli_real_escape_string($connect, $_POST['product']);
    $validity = mysqli_real_escape_string($connect, $_POST['validity']);
    $expiry_date = mysqli_real_escape_string($connect, $_POST['expiry_date']);
    
    //$caption = mysqli_real_escape_string($connect, $_POST['caption']);
    
            // edit the database and send them back to the server
 
				$sql = " UPDATE caliberation_chart SET client='$client', transporter='$transporter', date_issued='$dateOfIssue',
				nominal_volume='$nominal_volume', truck_reg='$truck_reg', truck_make='$truck_make', cmp1='$cmp1', 
				oheight1='$oheight1', mhn_height1='$mhn_height1', l_height1='$l_height1', cmp2='$cmp2',
				oheight2='$oheight2', mhn_height2='$mhn_height2', l_height2='$l_height2', cmp3='$cmp3',
				oheight3='$oheight3', mhn_height3='$mhn_height3', l_height3='$l_height3', air_balloon_def='$air',
				spring='$spring', product_used='$product_used', validity_period='$validity_period', expiry_date='$expiry_date' WHERE caliberation_chart_id ='$ThisID'";  
            $query = mysqli_query($connect, $sql) or die(mysqli_error($connect)); 
            
			//looping through the calibration chart capacity
			    
                $capacity_one = $_POST['capacity_one'];
                $ullage_one = $_POST['ullage_one'];
                $capacity_two = $_POST['capacity_two'];
                $ullage_two = $_POST['ullage_two'];	  	 
                $capacity_three = $_POST['capacity_three'];	  	 
                $ullage_three = $_POST['ullage_three'];	  	 
                
             
					 $sql2 = " UPDATE caliberation_chart_capacity SET capacity_one ='$capacity_one', ullage_one ='$ullage_one', capacity_two ='$capacity_two', ullage_two ='$ullage_two', capacity_three ='$capacity_three', ullage_three ='$ullage_three' WHERE caliberation_chart_id ='$ThisID'";
	 	            $result1 = mysqli_query($connect,$sql2)or die(mysqli_error($connect));
	 
				
            if($result1){
		 header("location:index.php");
			 }
        } 
     
?>
<?php include "includes/header.php";?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">        
        <section class="content">
            <?php echo $message ?>

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    
					 
<div class="row">
<div class="page-header" style="margin-top:5px;text-align:center;">
<h2 class="text-center text-warning"><strong><em>Calibration Chart Update Form</em></strong></h2>
</div>
</div>
  
<form action="" method="post"> 
 <div class="row">
 <!-- first column--->
   <div class="col-sm-6">
				
				<div class="form-group">
				<label>Client Name</label> 
				<input type="text" class="form-control" name="client" value="<?php echo $client; ?>">
				</div>
				

				<div class="form-group">
				<label>Transporter</label> 
				<input type="text" class="form-control" name="transporter" value="<?php echo $transporter; ?>">
				</div>
				

				<div class="form-group">
				<label>Date Of Issue</label> 
				<input type="text" class="form-control" name="dis" id="datepicker" value="<?php echo $mydate; ?>">
				</div>
				


   </div>
	<!-- SECOND column--->
		<div class="col-sm-6">
		
					<div class="form-group">
					<label>Nominal Volume</label> 
					<input type="text" class="form-control" name="nominal_volume" value="<?php echo $nominal_volume; ?>"> 
					</div>

					<div class="form-group">
					<label>Truck Reg. No</label> 
					<input type="text" class="form-control" name="truck_reg" value="<?php echo $truck_reg; ?>">
					</div>
					


					<div class="form-group">
					<label>Truck Make</label> 
					<input type="text" class="form-control" name="truck_make" value="<?php echo $truck_make; ?>">
					</div>
		

		</div>			
	</div>
<div class="row"><h3 class="text-center text-warning">TRUCK TANK CALIBRATION CERTIFICATE</h3></div>
	<div class="row">	
	<!-- first column--->
				<div class="col-sm-4">							
					<div class="form-group">
					<label>Compartment #1</label> 
					<input type="text" class="form-control" name="cmp1" value="<?php echo $cmp1; ?>">
					</div>
					

					<div class="form-group">
					<label>Overall Height</label> 
					<input type="text" class="form-control" name="oheight1" value="<?php echo $oheight1; ?>">
					</div>
					

					<div class="form-group">
					<label>M/H Neck Height</label> 
					<input type="text" class="form-control" name="mhn_height1" value="<?php echo $mhn_height1; ?>">
					</div>
					

					<div class="form-group">
					<label>Liquid Height</label> 
					<input type="text" class="form-control" name="l_height1" value="<?php echo $l_height1; ?>">
					</div>
					
				</div>
<!-- second column--->
				<div class="col-sm-4">
							<div class="form-group">
							<label>Compartment #2</label> 
							<input type="text" class="form-control" name="cmp2" value="<?php echo $cmp2; ?>">
							</div>
							

							<div class="form-group">
							<label>Overall Height</label> 
							<input type="text" class="form-control" name="oheight2" value="<?php echo $oheight2; ?>">
							</div>
							

							<div class="form-group">
							<label>M/H Neck Height</label> 
							<input type="text" class="form-control" name="mhn_height2" value="<?php echo $mhn_height2; ?>">
							</div>
							

							<div class="form-group">
							<label>Liquid Height</label> 
							<input type="text" class="form-control" name="l_height2" value="<?php echo $l_height2; ?>">
							</div>							
				
				</div>
				<!-- third column--->
				<div class="col-sm-4">
				    <div class="form-group">
					<label>Compartment #3</label> 
					<input type="text" class="form-control" name="cmp3" value="<?php echo $cmp3; ?>">
					</div>
					

					<div class="form-group">
					<label>Overall Height</label> 
					<input type="text" class="form-control" name="oheight3" value="<?php echo $oheight3; ?>">
					</div>
					

					<div class="form-group">
					<label>M/H Neck Height</label> 
					<input type="text" class="form-control" name="mhn_height3" value="<?php echo $mhn_height3; ?>">
					</div>
					

					<div class="form-group">
					<label>Liquid Height</label> 
					<input type="text" class="form-control" name="l_height3" value="<?php echo $l_height3; ?>">
					</div>
					
				</div>
	       </div>
		   <!-- TABLE ROW--->
		   <div class="row">
		   <div class="col-sm-12">
		   <div class="table-responsive">
		   <table id="product" class="table table-stripped">
		   <tr> 
		   <thead>
		   <th>Capacity(liters)<button type="button" onclick="create_rows();" class="btn btn-warning" onclick="create_rows()"><i class="fa fa-plus"></i></button></th>
                    <th>Ullage(cm)</th>
                    <th>Capacity(liters)</th>
                    <th>Ullage(cm)</th>                     
                    <th>Capacity(liters)</th>                     
                    <th>Ullage(cm)</th> 
                     <th> </th>      
		   </thead>
		   </tr>
		   <tr>
           <tbody>
                <?php
                $sql = "SELECT * FROM caliberation_chart_capacity WHERE caliberation_chart_id ='$projectID' ";
                //$sql2 = " SELECT * FROM caliberation_chart WHERE caliberation_chart_id ='$id' AND caliberation_chart_capacity WHERE caliberation_chart_capacity_id ='$id' LIMIT 1 ";
                $query = mysqli_query($connect, $sql) or die(mysqli_error($connect));
                while($row = mysqli_fetch_array($query)){
					$caliberation_chart_capacity_id = $row['caliberation_chart_capacity_id'];
                    $capacity_one = $row['capacity_one'];
                    $capacity_two = $row['capacity_two'];
                    $capacity_three = $row['capacity_three'];
                    $ullage_one = $row['ullage_one'];
                    $ullage_two = $row['ullage_two'];
                    $ullage_three = $row['ullage_three'];
                            
                ?>
				<tr>
				<td><input type="text"    id="quantity" value="<?php echo $capacity_one;?>"  name="capacity_one[]"/> </td>
				<td><input type="text"    id="quantity" value="<?php echo $ullage_one;?>" name="ullage_one[]"/></td>
				<td> <input type="text"   id="quantity" value="<?php echo $capacity_two;?>" name="capacity_two[]"/></td>
				<td><input type="text"    id="quantity" value="<?php echo $ullage_two;?>" name="ullage_two[]"/></td>
				<td><input type="text"   id="quantity" value="<?php echo $capacity_three;?>" name="capacity_three[]"/></td>
		        <td><input type="text"    id="quantity" value="<?php echo $ullage_three;?>" name="ullage_three[]"/> </td>
				 
             </tr>
             <?php
                }
                ?>
				</tbody>
		   </tr>
		   </table>
		   </div>
		   </div>
		   </div> <!-- end of TABLE ROW--->
<br>
		   <div class="row"><!-- Air Balloon ROW--->
						 <div class="col-sm-2"></div>
						 <div class="col-sm-4"><label>Air Balloons</label></div>
						 <div class="col-sm-4">
						 <select class="form-control" value="<?php echo $air; ?>" name="air">
                         <option value="<?php echo $air; ?>"><?php echo $air; ?></option>                           
							<option>Yes</option>
							<option>No</option> 
						</select>
						 </div>
						 <div class="col-sm-2"></div>
		   </div><!-- end of Air Balloon ROW--->
<br>
		   <div class="row"><!-- Spring ROW--->
						 <div class="col-sm-2"></div>
						 <div class="col-sm-4"><label>Spring</label></div>
						 <div class="col-sm-4">
						 <select class="form-control" value="<?php echo $spring; ?>" name="spring">
                         <option value="<?php echo $spring; ?>"><?php echo $spring; ?></option>                           
							<option>Yes</option>
							<option>No</option> 
						</select>
						 </div>
						 <div class="col-sm-2"></div>
		   </div><!-- end of Spring ROW--->
<br>
		   <div class="row"><!-- Product Used ROW--->
						 <div class="col-sm-2"></div>
						 <div class="col-sm-4"><label>Product Used</label></div>
						 <div class="col-sm-4">
						 <select class="form-control" value="<?php echo $product_used; ?>" name="product">
                         <option value="<?php echo $product_used; ?>"><?php echo $product_used; ?></option>                           
							<option>Water</option>
							<option>No</option> 
						</select>
						 </div>
						 <div class="col-sm-2"></div>
		   </div><!-- end of Product Used ROW--->
<br>
		   <div class="row"><!-- Validity Period ROW--->
						 <div class="col-sm-2"></div>
						 <div class="col-sm-4"><label>Validity Period</label></div>
						 <div class="col-sm-4">
						 <select class="form-control" value="<?php echo $validity_period; ?>" name="validity">
							<option value="<?php echo $validity_period; ?>"><?php echo $validity_period; ?></option>
                            <option>1 Year</option>
							<option>2 Years</option>
							<option>3 Years</option>
							<option>4 Years</option>
							<option>5 Years</option>
							<option>6 Years</option> 
							<option>7 Years</option>
						</select>
						 </div>
						 <div class="col-sm-2"></div>
		   </div><!-- end of Validity Period ROW--->
<br>
		   <div class="row"><!-- Expiry Date ROW--->
						 <div class="col-sm-2"></div>
						 <div class="col-sm-4"><label>Expiry Date</label></div>
						 <div class="col-sm-4">
						 <input type="text" class="form-control" id="datepicker1" value="<?php echo $mydate1; ?>" name="expiry_date">
						 </div>
						 <div class="col-sm-2"></div>
		   </div><!-- end of Expire Date ROW--->
<br>
         <div class="row">
		 <div class="col-sm-4"></div>
		 <div class="col-sm-4">
		 <button class="btn btn-success btn-lg btn-block" type="submit" name="submit"><em>UPDATE CHART</em></button>
		 </div>
		 <div class="col-sm-4"></div>
		 </div>
 </form>
 <br>
<div class="row">
<div class="form-control-static">
<ul>
<li>This certificate of caliberation is not a certificate of quality. it is for use in determining the actual
   volumes loaded when a nominal of 45000 liters is delivered
 </li>
 <li>All caliberation with bottom lines full</li>
 </ul>
</div>
                     
                </div>
                
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
