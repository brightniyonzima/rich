<?php
include 'connection.php';
include 'locsupcon.php';
if(isset($_POST['submit']))
{
set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
include 'PHPExcel/IOFactory.php';
//file path
$path=$_FILES["file"]["name"];
try {
$objPHPExcel = PHPExcel_IOFactory::load($path);
}
catch(Exception $e){
die('error occured');
}
$allDataInSheet=$objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$arrayCount=count($allDataInSheet); //total count of rows in that sheet

for($i=2;$i<=$arrayCount;$i++){
$id=0;
$location=trim($allDataInSheet[$i]["A"]);
$supplier=trim($allDataInSheet[$i]["B"]);
$start=trim($allDataInSheet[$i]["C"]);
$stop=trim($allDataInSheet[$i]["D"]);

$query="select * from occurrences where location_id='".$location."' and supplier_id='".$supplier."' and start='".$start."' and end='".$stop."' ";
$sql=$conn->query($query);
$result=mysqli_fetch_array($sql);
$existId=$result['id'];
if($existId==""){
$insertTable="insert into occurences(location,supplier,start,stop) values('".$location."','".$supplier."','".$start."','".$stop."');";
$insertResult=$conn->query($insertTable);
echo 'data has been succesully added';
}
else{
echo 'data already exists';
}

}
}
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
<form method="post" enctype="multipart/form-data">
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
