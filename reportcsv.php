<?php
include 'connection.php';
$from=$_POST['datepickerfrom'];
$to=$_POST['datepickerto'];

$filename=strtotime("now").'csv';
$fp=fopen($filename,"w");

$query="select * from occurrences";
$result=$conn->query($query);

$num_rows=mysqli_num_rows($result);
if($num_rows>=1){
$row=mysqli_fetch_row($result);

$fp=fopen($filename,"w");
$seperator="\n";

fputs($fp,$seperator);

mysqli_data_seek($result,0);

while($row=mysqli_fetch_assoc($result))
{
$seperator="";
$comma="";
 foreach($row as $name => $value)
 {
 $seperator.=$comma.''.str_replace(' ','" "',$value);
 $comma=",";
 }
 $seperator.="\n";

 fputs($fp,$seperator);
 }
 fclose($fp);
 $dir=getcwd();
 echo 'check folder for generated report in '.$dir;
 echo "<form action=index.php>";
 echo "<input type=submit value=ok>";
 echo "</form>";
 //resource opendir(string $dir);
 //readdir(resource opendir);
 }
 else{
 echo 'No records to show';
 }
 
?>