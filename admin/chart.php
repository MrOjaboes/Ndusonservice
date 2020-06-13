<?php session_start();?>
  <?php
if(!isset($_SESSION['email'])){
     header('location:../index.php');
}else{
?>

<?php
include('includes/connection.php');
include('includes/header.php');
  
				 
if(isset($_POST['insert'])){
 
	$client = htmlspecialchars($_POST['client']);
	$transporter = htmlspecialchars($_POST['transporter']);	  	 
	$dis = htmlspecialchars($_POST['dis']);	  	 
	$nominal_volume = htmlspecialchars($_POST['nominal_volume']);
	$truck_reg = htmlspecialchars($_POST['truck_reg']);
	$truck_make = htmlspecialchars($_POST['truck_make']);
	$cmp1 = htmlspecialchars($_POST['cmp1']);
	$oheight1 = htmlspecialchars($_POST['oheight1']);
	$mhn_height1 = htmlspecialchars($_POST['mhn_height1']);
	$l_height1 = htmlspecialchars($_POST['l_height1']);
	$cmp2 = htmlspecialchars($_POST['cmp2']);
	$oheight2 = htmlspecialchars($_POST['oheight2']);
	$mhn_height2 = htmlspecialchars($_POST['mhn_height2']);
	$l_height2 = htmlspecialchars($_POST['l_height2']);
	$cmp3 = htmlspecialchars($_POST['cmp3']);
	$oheight3 = htmlspecialchars($_POST['oheight3']);
	$mhn_height3 = htmlspecialchars($_POST['mhn_height3']);
	$l_height3 = htmlspecialchars($_POST['l_height3']);
	$air = htmlspecialchars($_POST['air']);
	$spring = htmlspecialchars($_POST['spring']);
	$product = htmlspecialchars($_POST['product']);
	$validity = htmlspecialchars($_POST['validity']);
	$expiry_date = htmlspecialchars($_POST['expiry_date']);	 
	$serial_no = rand();
	 
	$message = '';
	//$image = $_FILES["image"];
		if(!empty($client) && !empty($transporter)&& !empty($dis)&& !empty($nominal_volume)&&
		!empty($truck_reg)&& !empty($truck_make)&& !empty($cmp1)&& !empty($oheight1)&& !empty($mhn_height1)&&
		!empty($l_height1)&& !empty($cmp2)&& !empty($oheight2)&& !empty($mhn_height2)&& !empty($l_height2)&& 
		!empty($cmp3)&& !empty($oheight3)&& !empty($mhn_height3)&& !empty($l_height3)&& !empty($air)&&
		!empty($spring)&& !empty($product)&& !empty($validity)&& !empty($expiry_date)&& !empty($serial_no)){
			
 	
	$sql = " INSERT INTO caliberation_chart(client,transporter,date_issued,nominal_volume,truck_reg,truck_make,cmp1,oheight1,mhn_height1,l_height1,cmp2,oheight2,mhn_height2,l_height2,cmp3,oheight3,mhn_height3,l_height3,air_balloon_def,spring,product_used,validity_period,expiry_date,serial_no)
	 VALUES('$client', '$transporter', '$dis', '$nominal_volume', '$truck_reg', '$truck_make', '$cmp1', '$oheight1', '$mhn_height1', '$l_height1', '$cmp2', '$oheight2', '$mhn_height2', '$l_height2', '$cmp3', '$oheight3', '$mhn_height3', '$l_height3', '$air', '$spring', '$product', '$validity', '$expiry_date', '$serial_no')";
		 
	$result = mysqli_query($connect,$sql)or die(mysqli_error($connect));
	$lastid = mysqli_insert_id($connect);


	$capacity_one = $_POST['capacity_one'];
	$ullage_one = $_POST['ullage_one'];
	$capacity_two = $_POST['capacity_two'];
	$ullage_two = $_POST['ullage_two'];	  	 
	$capacity_three = $_POST['capacity_three'];	  	 
	$ullage_three = $_POST['ullage_three'];	  	 
	
	 if(!empty($capacity_one) && !empty($ullage_one)&& !empty($capacity_two)&& !empty($ullage_two)&&
		!empty($capacity_three)&& !empty($ullage_three)){
		 
foreach($capacity_one as $key=>$capacity_one_value)
					{
					$ullage_one = $ullage_one[$key];
					$capacity_two = $capacity_two[$key];
					$ullage_two = $ullage_two[$key];
					$capacity_three = $capacity_three[$key];
					$ullage_three = $ullage_three[$key];
					  
					 $sql2 = " INSERT INTO caliberation_chart_capacity(caliberation_chart_id,capacity_one,ullage_one,capacity_two,ullage_two,capacity_three,ullage_three)
	 VALUES('$lastid','$capacity_one_value','$ullage_one','$capacity_two','$ullage_two','$capacity_three','$ullage_three')";
	 	$result1 = mysqli_query($connect,$sql2)or die(mysqli_error($connect));
	 
				}
	  
	if($result1){
		 
				  $message .=  '<h4 class="alert alert-success" >Chart Uploaded successfully!</h4>';
				 //header("location:../index.php");
				  
				 
	}else{
		$message .=  '<h4 class="alert alert-danger" >Error with registeration!</h4>';
		exit;
	}
}
}

}

?>





    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->        

        <!-- Main content -->
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
<h2 class="text-center text-warning"><strong><em>Calibration Chart Form</em></strong></h2>
</div>
</div>
  
<form action="" method="post"> 
 <div class="row">
 <!-- first column--->
   <div class="col-sm-6">
				
				<div class="form-group">
				<label>Client Name</label> 
				<input type="text" class="form-control" name="client" placeholder="click to edit">
				</div>
				

				<div class="form-group">
				<label>Transporter</label> 
				<input type="text" class="form-control" name="transporter" placeholder="click to edit">
				</div>
				

				<div class="form-group">
				<label>Date Of Issue</label> 
				<input type="date" class="form-control" name="dis">
				</div>
				


   </div>
	<!-- SECOND column--->
		<div class="col-sm-6">
		
					<div class="form-group">
					<label>Nominal Volume</label> 
					<input type="text" class="form-control" name="nominal_volume" placeholder="click to edit"> 
					</div>

					<div class="form-group">
					<label>Truck Reg. No</label> 
					<input type="text" class="form-control" name="truck_reg" placeholder="click to edit">
					</div>
					


					<div class="form-group">
					<label>Truck Make</label> 
					<input type="text" class="form-control" name="truck_make" placeholder="click to edit">
					</div>
		

		</div>			
	</div>
<div class="row"><h3 class="text-center text-warning">TRUCK TANK CALIBRATION CERTIFICATE</h3></div>
	<div class="row">	
	<!-- first column--->
				<div class="col-sm-4">							
					<div class="form-group">
					<label>Compartment #1</label> 
					<input type="text" class="form-control" name="cmp1" placeholder="click to edit">
					</div>
					

					<div class="form-group">
					<label>Overall Height</label> 
					<input type="text" class="form-control" name="oheight1" placeholder="click to edit">
					</div>
					

					<div class="form-group">
					<label>M/H Neck Height</label> 
					<input type="text" class="form-control" name="mhn_height1" placeholder="click to edit">
					</div>
					

					<div class="form-group">
					<label>Liquid Height</label> 
					<input type="text" class="form-control" name="l_height1" placeholder="click to edit">
					</div>
					
				</div>
<!-- second column--->
				<div class="col-sm-4">
							<div class="form-group">
							<label>Compartment #2</label> 
							<input type="text" class="form-control" name="cmp2" placeholder="click to edit">
							</div>
							

							<div class="form-group">
							<label>Overall Height</label> 
							<input type="text" class="form-control" name="oheight2" placeholder="click to edit">
							</div>
							

							<div class="form-group">
							<label>M/H Neck Height</label> 
							<input type="text" class="form-control" name="mhn_height2" placeholder="click to edit">
							</div>
							

							<div class="form-group">
							<label>Liquid Height</label> 
							<input type="text" class="form-control" name="l_height2" placeholder="click to edit">
							</div>							
				
				</div>
				<!-- third column--->
				<div class="col-sm-4">
				    <div class="form-group">
					<label>Compartment #3</label> 
					<input type="text" class="form-control" name="cmp3" placeholder="click to edit">
					</div>
					

					<div class="form-group">
					<label>Overall Height</label> 
					<input type="text" class="form-control" name="oheight3" placeholder="click to edit">
					</div>
					

					<div class="form-group">
					<label>M/H Neck Height</label> 
					<input type="text" class="form-control" name="mhn_height3" placeholder="click to edit">
					</div>
					

					<div class="form-group">
					<label>Liquid Height</label> 
					<input type="text" class="form-control" name="l_height3" placeholder="click to edit">
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
		   <tr>
		   <td><input type="text" name="capacity_one[]"/></td>
				<td><input type="text"  name="ullage_one[]"/></td>
				<td><input type="text" name="capacity_two[]"/></td>
				<td><input type="text" name="ullage_two[]"/></td>
				<td><input type="text" name="capacity_three[]"/></td>
		        <td><input type="text" name="ullage_three[]"/></td>				 
				<td><button type="button" name="" onclick="deleteRow();" class="btn btn-default">X</button></td>
				
		   </tr>
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
						 <select class="form-control" name="air">
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
						 <select class="form-control" name="spring">
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
						 <select class="form-control" name="product">
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
						 <select class="form-control" name="validity">
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
						 <input type="date" class="form-control" name="expiry_date">
						 </div>
						 <div class="col-sm-2"></div>
		   </div><!-- end of Expire Date ROW--->
<br>
         <div class="row">
		 <div class="col-sm-4"></div>
		 <div class="col-sm-4">
		 <button class="btn btn-success btn-lg btn-block" type="submit" name="insert"><em>INSERT CHART</em></button>
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