<?php
include 'connection.php';
include 'locsupcon.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Down time</title>
<link href="css/mycss.css" rel="stylesheet" />
<script type="text/javascript">
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
<label>
        <span>Start: </span>
		<input type="text" placeholder=" &nbsp;  yyyy-mm-dd &nbsp; hh:mm" name="downstart" onkeyup="checkInput(this)"/>
		</label>
<label>
        <span>End: </span>
		<input type="text" placeholder=" &nbsp; yyyy-mm-dd &nbsp; hh:mm" name="downend" onkeyup="checkInput(this)"/>
		</label>
<label>
<span> &nbsp;</span>
<input type="submit" value="send" onclick="formatting()" onclick="clearinputs()"/><input type="reset" value="cancel"/>
</label>
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
		<!--
		<label>
		<span>From: </span>
		<input type="text" name="datepickerfrom" id="datepicker" />
		</label>
		<label>
        <span>To: </span>
		<input type="text" name="datepickerto" id="datepicker1" />
		</label>
		-->
<label>
<input type="submit" value="view report"/><input type="reset" value="cancel"/>
</label>
</form>

<form action="reportgeneral.php" method="post">
<input type="submit" value="view general report" />
</form>

</div>


</div>
</body>
</html>
<?php
include 'report.php';
?>
