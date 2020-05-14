<?php
include "includes/connection.php";
include "includes/header.php";
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
                <li><a href="users" class="active">Users</a></li>
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
                    <div class="col-md-2 col-sm-4 col-xs-4"></div>
                    <div class="col-md-8 col-sm-4 col-xs-4">
					<h3 class="text-center"><em>Serial Number Verification Form</em></h3>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">						 
                            <input type="text" class="form-control" placeholder="Input Serial number for verification" name="serial_no" required>
                        </div>
						
						 
                         
						 
						</br>
                        <div class="form-group">
                            <p class="text-center"><button style="border:1px dotted white" type="submit" name="go" class="btn btn-success btn-lg">Verify</button></p>			
		  
                        </div>
                    </form>
                </div>
                 
                <div class="col-md-1 col-sm-4 col-xs-4"></div>
                <div class="col-md-10 col-sm-4 col-xs-4">
				 
  <?php

//$button = $_GET['submit'];

if(isset($_POST['go'])){ 
  
 $search = mysqli_real_escape_string($connect, $_POST['serial_no']);
if(!empty($search)){
	 $sql = "SELECT * FROM caliberation_chart WHERE  serial_no LIKE '%$search%'";
	 $query = mysqli_query($connect,$sql)or die(mysqli_error($connect));
	 $foundno = mysqli_num_rows($query);
	 if($foundno > 0){
		 	 
		 		 
		//echo 'Number of result(s) found!  '.$foundno;
		 		$sn = 1;
            while($row = mysqli_fetch_assoc($query)){
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
				//$date_modified = $row['DateModified'];
			
 				//date formating
				 $cdate = new DateTime($date); 
				 $expiry_date = new DateTime($expiry_date); 
				 $mydate = $cdate->format('l, j F Y');
				 $mydate1 = $expiry_date->format('l, j F Y');
 
				$sn++;
			}
              ?>
	 	
			
		  
  <div class="row">
			            
			 		 			
			<div class="page-header" style="margin-top:5px;align:center;">  
 <h2 class="text-center"><strong><em>CALIBERATION CHARTS</em></strong></h2>
  </div>
 

 
 <div class="row">
 <p class="text-center">S/No: <b><?php echo $serial_no;?></b></p>
    
  <div class="col-md-3">
<label>Client :</label><br/>
<label>Transporter :</label><br/>
<label>Date Of Issue :</label><br/>
</div>

 <div class="col-md-3">
 <?php echo $client; ?><br/>  
<?php echo $transporter; ?><br/>
<?php echo $mydate; ?><br/>
</div>

<div class="col-md-3">
<label>Nominal Volume :</label><br/>
<label>Truck Reg. :</label><br/>
<label>Truck Make :</label><br/>
</div>

<div class="col-md-3">
<?php echo $nominal_volume.' '.'Litres';?><br/>
<?php echo $truck_reg; ?><br/>
<?php echo $truck_make; ?>
</div>
</div>
 
 


<div class="row">
<div class="form-control-static">
<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TANK TRUCK CALIBERATION CERTIFICATE</h3>
</div>
</div>


 <div class="row">
<div class="col-md-4"> 
<p><label>Compartment #</label> 
<?php echo $cmp1; ?>
</p>

 
<p><label>Overall Height :</label> 
<?php echo $oheight1.'cm'; ?>
</p>

 
<p><label>M/H Neck Height :</label> 
<?php echo $mhn_height1.'cm'; ?>
</p>

 
<p><label>Liquid Height :</label> 
<?php echo $l_height1.'cm'; ?>
</p>
</div>

<div class="col-md-4"> 
<p><label>Compartment # </label> 
<?php echo $cmp2; ?>
</p>

 
<p><label>Overall Height :</label> 
<?php echo $oheight2.'cm'; ?>
</p>

 
<p><label>M/H Neck Height :</label> 
<?php echo $mhn_height2.'cm'; ?>
</p>

 
<p><label>Liquid Height :</label> 
<?php echo $l_height2.'cm';?>
</p>
</div>

 
<div class="col-md-4"> 
<p><b>Compartment # </b> 
<?php echo $cmp3; ?>
</p>

 
<p><label>Overall Height :</label> 
<?php echo $oheight3.'cm'; ?>
</p>

 
<p><label>M/H Neck Height :</label> 
<?php echo $mhn_height3.'cm'; ?>
</p>

 
<p><label>Liquid Height :</label> 
<?php echo $l_height3.'cm'; ?>
</p>

</div>
</div>
 
  
<div class="row">
 <div class="col-md-4 col-sm-2 col-xs-2">
 <label class="col-xs-8">Air Balloons Def</label>
<br/>
<br/>
<label class="col-xs-8">Spring</label>
<br/>
<br/>
<label class="col-xs-8">Product Used</label>
<br/>
<br/>
<label class="col-xs-8">Validity Period</label>
<br/>
<br/>
<label class="col-xs-8">Expiry Date</label>
 </div>
 <div class="col-md-5 col-sm-2 col-xs-2">
 <?php echo $air; ?>
 <br/>
<br/>
 <?php echo $spring; ?>
 <br/>
<br/>
 <?php echo $product_used; ?>
 <br/>
<br/>
 <?php echo $validity_period; ?>
 <br/>
<br/>
 <?php echo $mydate1; ?>
 
 
 </div>
 <div class="col-md-3 col-sm-2 col-xs-2"></div> 
 </div>

<div class="row">
<div class="form-control-static">
<ul>
<li><b>This certificate of caliberation is not a certificate of quality. it is for use in determining the actual
   volumes loaded when a nominal of 45000 liters is delivered</b>
 </li>
 <li><b>All caliberation with bottom lines full</b></li>
 </ul>
</div>
</div>
 
  
	

	
<?php
 
			 
	 } 	
 } 
 } 
 

?>
	
			 
				
				</div>
                <div class="col-md-1 col-sm-4 col-xs-4"></div>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
         
    </div>
    <!-- /.content-wrapper -->


<?php
include_once "includes/footer.php";
