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
alert("file has been succesfully uploaded");
}
</script>
</head>

<body>

<div id="container" class="container">
<!-- <p align="left"><a href="report.php">View report</a></p> -->

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
<input type="submit" value="send"/><input type="reset" value="cancel"/>
</label>
</form>

</div>

<div id="upload_file">
<form method="post" enctype="multipart/form-data" class="elegant-aero" action="importcsv.php">
    <h1>Upload a file
        <span>upload an excel or csv file.</span>
    </h1>
    <label>
        <span>Upload file </span>
        <input type="file" name="file"/>
    </label>
      
     <label>
        <span>&nbsp;</span>
        <input type="submit" value="send" name="submit"/><input type="reset" value="cancel"/>
    </label>    
</form>
</div>


</div>
</body>
</html>
<?php
include 'report.php';
?>
