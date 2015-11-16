<?php
require_once 'connection.php';

if(isset($_POST['location']) or isset($_POST['supplier']))
{ 
$location = $_POST['location']; 
$supplier = $_POST['supplier'];
$id=0;
if(empty($location) and empty($supplier) ){
echo 'No details were sent, Please fill in details';
echo "<form action=index.php>";
echo "<input type=submit value=ok>";
echo "</form>";
exit;
}
elseif(empty(!$location) and empty(!$supplier)){
$query="insert into suppliers values('".$id."','".$supplier."'');";
$queryz="insert into locations values('".$id."','".$location."');";
$resultz=$conn->query($queryz);
$result=$conn->query($query);
if($resultz and $result){
echo 'new location/supplier have been succesfully added';
echo "<form action=index.php>";
echo "<input type=submit value=ok>";
echo "</form>";
}
else{
echo 'database has been updated';
echo "<form action=index.php>";
echo "<input type=submit value=ok>";
echo "</form>";
}
exit;
}
elseif(empty(!$location)){
$queryz="insert into locations values('".$id."','".$location."');";
$resultz=$conn->query($queryz);
if($resultz){
echo 'new location has been succesfully added';
echo "<form action=index.php>";
echo "<input type=submit value=ok>";
echo "</form>";
}else{
echo 'location already exists';
echo "<form action=index.php>";
echo "<input type=submit value=ok>";
echo "</form>";
}
exit;
} 
elseif(empty(!$supplier)){
$query="insert into suppliers values('".$id."','".$supplier."');";
$result=$conn->query($query);
if($result){
echo 'new supplier has been succesfully added';
echo "<form action=index.php>";
echo "<input type=submit value=ok>";
echo "</form>";
}else{
echo 'supplier already exists';
echo "<form action=index.php>";
echo "<input type=submit value=ok>";
echo "</form>";
}
exit;
}
else{
echo'sorry, something went wrong';
echo "<form action=index.php>";
echo "<input type=submit value=ok>";
echo "</form>";
}

}
?>