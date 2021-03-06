<?php include('assets/connection.php');?>  
<!DOCTYPE html>
<html>
<head>
<html>
  <head>
  <title>Ndusonservices | Users Portal</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
     <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
     
  </head>
  <body style="
     background-image: url('./images/dubg.jpg');
  background-repeat: no-repeat;
  background-size: cover;
  margin: 0;">
<div class="container">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">     
    <form method="post" style="margin-top: 90px;" action="">
        <div class="form-group">            
            <input class="form-control input-lg" style="height: 70px;border-radius:2em;" name="serial_no" type="text" placeholder="Input your serial number" />
          </div>         
            <button class=" btn btn-search btn-success btn-lg" name="go" style="width: 150px;border-radius:2em;" type="submit"><em>VERIFY</em></button>                 
      </form>
    </div>
    <div class="col-md-2"></div>
  </div>
<br><br>
    
  <?php

//$chk = date("d-m-Y");
echo $current;
//echo $expiry_date;
$message ='';
if(isset($_POST['go'])){ 

$search = mysqli_real_escape_string($connect, $_POST['serial_no']);
if(!empty($search)){

$sql = "SELECT * FROM caliberation_chart INNER JOIN caliberation_chart_capacity ON caliberation_chart_capacity.caliberation_chart_capacity_id = caliberation_chart.caliberation_chart_id WHERE  serial_no LIKE '%$search%' ";
$query = mysqli_query($connect,$sql)or die(mysqli_error($connect));
$foundno = mysqli_num_rows($query);
if($foundno > 0){	
  $chk = date("Y-M-d");
  $exp_date = strtotime($expiry_date);
  $current = strtotime($chk);
 if($exp_date <= $current){     	 
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
         
  
     //date formating
     $cdate = new DateTime($date); 
     $expiry_date = new DateTime($expiry_date); 
     $mydate = $cdate->format('l, j F Y');
     $mydate1 = $expiry_date->format('l, j F Y');

    $sn++;
  }
          ?>
 
  
  
<div class="row">
    <div class="col-md-1 col-sm-2 col-xs-2"></div>
  <div class="col-md-10">         
  <div class="panel panel-default"> 
  <div class="panel-body">			
  <div class="page-header" style="margin-top:5px;text-align:center;">  
<h2 class="text-center text-warning"><strong><em>CALIBRATION CHART DETAILS</em></strong></h2>
  </div>
  



<div class="row">
<p class="text-center">S/No: <b><?php echo $serial_no;?></b></p>

<div class="col-md-3">
<label>Client Name :</label><br/>
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
<h3 class="text-center text-warning">TANK TRUCK CALIBRATION CERTIFICATE</h3>
</div>



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


<p><label>Compartment # </label> 
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
<div class="col-md-1 col-sm-2 col-xs-2"></div>
</div>
 
<div class="table-responsive"> 
<table class="table table-stripped">

            <tr>
                <th>S/N</th>
                <th>Capacity(liters)</th>
                <th>Ullage(cm)</th>
                <th>Capacity(liters)</th>
                <th>Ullage(cm)</th>                     
                <th>Capacity(liters)</th>                     
                <th>Ullage(cm)</th> 
                                    
                                    
            </tr>
     
    <tbody>
            <?php
             $sn = 1;
            $sql = "SELECT * FROM caliberation_chart_capacity WHERE caliberation_chart_id ='$id' ";
            //$sql2 = " SELECT * FROM caliberation_chart WHERE caliberation_chart_id ='$id' AND caliberation_chart_capacity WHERE caliberation_chart_capacity_id ='$id' LIMIT 1 ";
            $query = mysqli_query($connect, $sql) or die(mysqli_error($connect));
            while($row = mysqli_fetch_array($query)){
                $capacity_one = $row['capacity_one'];
                $capacity_two = $row['capacity_two'];
                $capacity_three = $row['capacity_three'];
                $ullage_one = $row['ullage_one'];
                $ullage_two = $row['ullage_two'];
                $ullage_three = $row['ullage_three'];
                        
            ?>
    <tr>
    <td><?php echo $sn;?></td>	
    <td><?php echo $capacity_one.'litres'; ?></td>				  
    <td><?php echo $ullage_one.'cm'; ?></td>				  
    <td><?php echo $capacity_two.'litres'; ?></td>				  
    <td><?php echo $ullage_two.'cm'; ?></td>				  
    <td><?php echo $capacity_three.'litres'; ?></td>				  
    <td><?php echo $ullage_three.'cm'; ?></td>				  

         </tr>
         <?php
         $sn++;
            }
            ?>
    </tbody>
      
    </table>
    

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
 
<ul>
<li><b>This certificate of caliberation is not a certificate of quality. it is for use in determining the actual
volumes loaded when a nominal of &nbsp; &nbsp; 45000 liters is delivered</b>
</li>
<li><b>All caliberation with bottom lines full</b></li>
</ul>
 
</div>

<?php

          }else{
            $message .='<p class="alert alert-danger">Sorry this Serial Number Has Expired</p>';

          }		 
}else{
$message .='<p class="alert alert-danger">No Chart found for this Serial Number To verify</p>';

} 	
}else{
$message .='<p class="alert alert-danger">No Serial Number To verify</p>';
} 
} 


?>
</div>
</div>
</div>
</div>
<br><br>
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8"><?php echo $message;?></div>
  <div class="col-md-2"></div>
</div>


  

</div>
 
     
    <script src="assets/colorlib/js/extention/choices.js"></script>
	 
	
  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
