<?php
include 'connection.php';
include 'locsupcon.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Down time</title>
</head>

<body>
<p align="left"><a href="report.php"> View report</a></p>

<table align="center" id="new_location">
<tr><td><caption>Add location or supplier</caption></td><td></td></tr>
<form action="locsupcon.php" method="post"/>
<tr><td>Location:</td><td><input type="text" name="location"/></td></tr>
<tr><td>Supplier</td><td><input type="text" name="supplier"/></td></tr>
<tr><td></td><td><input type="submit" value="send"/><input type="reset" value="cancel"/></td></tr>
</form>
</table>

<table align="center" id="uploadingTable">
<tr><td><caption>Upload a file</caption></td><td></td></tr>
<form action="altUploading.php" method="post">
<tr>
<td></td>
<td><input type="file" name="file"/></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="send" name="submit"/><input type="reset" value="cancel"/></td>
</tr>
</form>
</table>
</body>
</html>
