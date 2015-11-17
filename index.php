<?php
include 'connection.php';
include 'locsupcon.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Down time</title>

<!--
<link href="jquery-simple-datetimepicker-1.12.0/jquery.simple-dtpicker.css" rel="stylesheet">
<script src="jquery-simple-datetimepicker-1.12.0/jquery.simple-dtpicker.js"></script>
<script src="jquery-simple-datetimepicker-1.12.0/Gruntfile.js"></script>
-->
<script type="text/javascript" src="js/jquery-1.11.3.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>

<script type="text/javascript" src="js/jquery-ui-sliderAccess.js"></script>
<script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
<link type="text/css" href="js/jquery-ui-timepicker-addon.css" rel="stylesheet" />


<script type="text/javascript" src="js/jonthornton-jquery-timepicker-54dd222/jquery.timepicker.js"></script>
<script type="text/javascript" src="js/jonthornton-jquery-timepicker-54dd222/jquery.timepicker.min.js"></script>
<link type="text/css" href="js/jonthornton-jquery-timepicker-54dd222/jquery.timepicker.css" rel="stylesheet" />


<link href="css/mycss.css" rel="stylesheet" />
<script type="text/javascript">
$(function(){
         $('#tm').timepicker();
     });

$(function(){
         $( "#datepicker" ).datetimepicker();
     });

function sentFile(){
alert("file has been sent");
}
function clearinputs(){
var form1=document.getElementById("occurrences");
var form2=document.getElementByID("fileuploading");
var form3=document.getElementByID("locationreport");

form1.reset();
form2.reset();
form3.reset();
}
function checkInput(downstart) {
  var invalidChars = /[^0-9,^-,^:,^ ]/gi
  if(invalidChars.test(downstart.value)) {
            downstart.value = downstart.value.replace(invalidChars,"");
      }
	  }
</script>
</head>

<body>

<div id="container" class="container">
<!-- <p align="left"><a href="report.php">View report</a></p> -->

<div id="downtime_form">
<form method="post" enctype="multipart/form-data" class="my-elegant" action="occurrenceFeed.php" id="occurrences">
<h1>Register a new down time occurrence
        <span></span>
    </h1>
	
<label>
        <span>Location: </span>
		<select name="downlocation">
<?php
$query='select * from locations';
$result=$conn->query($query);
while($row=mysqli_fetch_array($result)){
echo "<option value='".$row[1]."'>".$row[1]."</option>";
}
?>
</select>
		</label>
        <span>Supplier: </span>
		<select name="downsupplier">
<?php
$query='select * from suppliers';
$result=$conn->query($query);
while($row=mysqli_fetch_array($result)){
echo "<option value='".$row[1]."'>".$row[1]."</option>";
}
?>
</select>
		</label>
		<p id="datepairExample">
<label>
        <span>Start: </span>
    <input type="text" class="date start" name="datestart" />
    <input type="text" class="time start" name="timestart" /> 

		</label>
<label>
        <span>End: </span>
		<input type="text" class="time end" name="timeend" />
        <input type="text" class="date end" name="dateend" />
		</label>
		
<label>
<span> &nbsp;&nbsp;&nbsp;</span>
<input type="submit" value="send" onclick="formatting()" onclick="clearinputs()"/><input type="reset" value="cancel"/>
</label>
</p>
</form>
</div>

<div id="new_location_supplier">
<form method="post" enctype="multipart/form-data" class="elegant-aero" action="locsupcon.php">
<h1>New location or supplier
        <span>Add a new location or internet supplier.</span>
    </h1>
<label>
        <span>Location: </span>
		<input type="text" placeholder="add new location" name="location"/>
		</label>
<label>
        <span>Supplier: </span>
		<input type="text" placeholder="add new supplier" name="supplier"/>
		</label>
<label>
<span> &nbsp;</span>
<input type="submit" value="send" onclick="clearinputs()"/><input type="reset" value="cancel"/>
</label>
</form>

</div>

<div id="upload_file">
<form method="post" enctype="multipart/form-data" class="elegant-aero" action="importcsv.php" id="fileuploading">
    <h1>Upload a file
        <span>upload an excel or csv file.</span>
    </h1>
    <label>
        <span>Upload file </span>
        <input type="file" name="file" onkeyup="clearinputs()"/>
    </label>
      
     <label>
        <span>&nbsp;</span>
        <input type="submit" value="send" name="submit" onclick="sentFile()"/><input type="reset" value="cancel"/>
    </label>    
</form>
</div>

<div id="report_file">
<form action="reportexcel.php" method="post" enctype="multipart/form-data" class="elegant-aero" id="locationreport">
<h1>Get report
        <span>generate report from location.</span>
    </h1>
<label>
        <span>Location: </span>
		<select name="reportlocation">
<?php
$query='select * from locations';
$result=$conn->query($query);
while($row=mysqli_fetch_array($result)){
echo "<option value='".$row[1]."'>".$row[1]."</option>";
}
?>
</select>
		</label>
<label>
<input type="submit" value="view report"/><input type="reset" value="cancel"/>
</label>
</form>

<form action="reportgeneral.php" method="post">
<input type="submit" value="view general report" />
</form>

</div>



<script type="text/javascript" src="datepair.js"></script>
<script type="text/javascript" src="jquery.datepair.js"></script>
<script>
    // initialize input widgets first
    $('#datepairExample .time').timepicker({
        'showDuration': true,
        'timeFormat': 'g:ia'
    });

    $('#datepairExample .date').datepicker({
        'format': 'yyyy-m-d',
        'autoclose': true
    });

    // initialize datepair
    $('#datepairExample').datepair();
</script>

</div>
</body>
</html>
<?php
include 'report.php';
?>
