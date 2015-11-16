<?php
require_once 'connection.php';

if(isset($_POST['downlocation']) and isset($_POST['downsupplier'])and isset($_POST['downstart'])and isset($_POST['downend']))
{ 
$location = $_POST['downlocation']; 
$supplier = $_POST['downsupplier'];
$start = $_POST['downstart'];
$end = $_POST['downend'];
$id=0;

if(empty($location) and empty($supplier)and empty($start) and empty($end)){
echo 'Please fill in all details';
echo "<form action=index.php>";
echo "<input type=submit value=ok>";
echo "</form>";
exit;
}
else{

$query="insert into occurrences(id,supplier_id,location_id,start,end) values('".$id."',(select id from suppliers where supplier='".$supplier."'),(select id from locations where area='".$location."'),'".$start."','".$end."');";
$result=$conn->query($query);
if(!$result){
echo 'oops something just went wrong, contact administrator '.mysqli_error();
exit;
}
else{
echo 'Data has been succesfully sent';
echo "<form action=index.php>";
echo "<input type=submit value=ok>";
echo "</form>";
}
}

}
?>
