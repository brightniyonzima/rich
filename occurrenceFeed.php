<?php
require_once 'connection.php';

if(isset($_POST['downlocation']) and isset($_POST['downsupplier']) and isset($_POST['datestart'])and isset($_POST['timestart']) and isset($_POST['dateend']) and isset($_POST['timeend']))
{ 
$location = $_POST['downlocation']; 
$supplier = $_POST['downsupplier'];
$dstart = $_POST['datestart']." ".$_POST['timestart'];
$dend = $_POST['dateend']." ".$_POST['timeend'];

$date = new DateTime($dstart);
$start=$date->format('Y-m-d H:i:s');

$ddate = new DateTime($dend);
$end=$ddate->format('Y-m-d H:i:s');

$id=0;

if(empty($location) or empty($supplier) or empty($_POST['datestart']) or empty($_POST['timestart'])or empty($_POST['dateend'])or empty($_POST['timeend'])){
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
elseif(empty($_POST['downlocation']) or empty($_POST['downsupplier']) or empty($_POST['datestart']) or empty($_POST['timestart']) or empty($_POST['dateend']) or empty($_POST['timeend'])){
echo "no data sent,please fill in all details";
echo "<form action=index.php>";
echo "<input type=submit value=ok>";
echo "</form>";
}
else{
echo "no data sent,please fill in all details";
echo "<form action=index.php>";
echo "<input type=submit value=ok>";
echo "</form>";
}

?>
