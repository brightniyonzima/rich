<?php
include 'connection.php';
$from=$_POST['datepickerfrom'];
$to=$_POST['datepickerto'];

$filename=strtotime("now").'csv';
$fp=fopen($filename,"w");
$query="select * from occurrences";

//$query="select * from occurrences where start >='".$from."' and end <='".$to."'";

$result=$conn->query($query);
if(!$result){
die('oops, something went wrong'.mysqli_error());
}
echo "<table border=1>";
echo "<caption>Down time occurrences</caption>";
echo "<tr><th>id</th><th>location</th><th>supplier</th><th>start time</th><th>end time</th></tr>";
while($row=mysqli_fetch_row($result)){
echo "<tr><td>";
echo $row[0];
echo "</td><td>";
echo $row[1];
echo "</td><td>";
echo $row[2];
echo "</td><td>";
echo $row[3];
echo "</td><td>";
echo $row[4];
echo "</td></tr>";
}
echo "</table>";
/*
$row=mysqli_fetch_assoc($result);
$seperator="";
$comma="";
 foreach($row as $name => $value)
 {
 echo $name;
 echo $value.'<br>';
 }
 */
?>