<?php
require_once 'connection.php';

if(isset($_POST['location']) or isset($_POST['supplier']))
{ 
$location = $_POST['location']; 
$supplier = $_POST['supplier'];
if(empty($location) and empty($supplier) ){
echo 'No details were sent, All details are required';
echo "<form action=index.php>";
echo "<input type=submit value=ok>";
echo "</form>";
}
else{
$query="insert into suppliers values('".$supplier."'')";
$query1="insert into locations values('".$location."'')";
$result=$conn->query($query);
$result1=$conn->query($query1);
echo 'new location/supplier have been succesfully added';
}

}
?>