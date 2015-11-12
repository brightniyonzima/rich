<?php
include 'connection.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/ui-lightness/jquery-ui-1.10.2.custom.css" rel="stylesheet">
<script src="js/jquery-1.9.1.js"></script>
	<script src="js/jquery-ui-1.10.2.custom.js"></script>
<script>
$(function() {
  $( "#datepicker" ).datepicker({dateFormat : 'yy-mm-dd'});
    $( "#datepicker1" ).datepicker({dateFormat : 'yy-mm-dd'});
});
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Down time</title>
</head>

<body>
<div id="container" class="container">
<!-- <p align="left"><a href="index.php">Home</a></p> -->

<div id="report_file">
<form action="reportexcel.php" method="post" enctype="multipart/form-data" class="elegant-aero">
<h1>Get report
        <span>generate a report from cacti.</span>
    </h1>
<label>
        <span>Location: </span>
		<select name="location">
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
		<span>From: </span>
		<input type="text" name="datepickerfrom" id="datepicker" />
		</label>
		<label>
        <span>To: </span>
		<input type="text" name="datepickerto" id="datepicker1" />
		</label>
<label>
<span> &nbsp;</span>
<input type="submit" value="send"/><input type="reset" value="cancel"/>
</label>
</form>
</div>

</div>
</body>
</html>

