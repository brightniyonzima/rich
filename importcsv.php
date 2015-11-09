<?php
include 'connection.php';
if(isset($_POST['submit']))
{
$filename=$_FILES["file"]["name"];
echo ' file '.$filename;
$chk_ext=explode(".",$filename);

if(strtolower(end($chk_ext))=="csv")
{
$filename=$_FILES["file"]["tmp_name"];
$handle=fopen($filename,"r");
while(($data=fgetcsv($handle,1000,","))!==false)
{
$id=0;

//checking to see if record already exists befroe inserting into database //

$query="select * from occurrences where location_id='".$data[0]."' and supplier_id='".$data[1]."' and start='".$data[2]."' and end='".$data[3]."' ";
$sql=$conn->query($query);
$result=mysqli_fetch_array($sql);
$existId=$result['id'];
if($existId==""){

$sql="insert into occurrences values('".$id."','".$data[0]."','".$data[1]."','".$data[2]."','".$data[3]."');";
$result=$conn->query($sql);
}
else{
echo'records already exist';
exit;
}

}
fclose($handle);
echo ' succesfully imported';
}

elseif(strtolower(end($chk_ext))=="xlsx")
{
set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
include 'PHPExcel/IOFactory.php';
//file path
$filename=$_FILES["file"]["name"];
try {
$objPHPExcel = PHPExcel_IOFactory::load($filename);
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

//checking to see if record already exists befroe inserting into database //

$query="select * from occurrences where location_id='".$location."' and supplier_id='".$supplier."' and start='".$start."' and end='".$stop."' ";
$sql=$conn->query($query);
$result=mysqli_fetch_array($sql);
$existId=$result['id'];
if($existId==""){
$insertTable="insert into occurrences(id,location_id,supplier_id,start,end) values('".$id."','".$location."','".$supplier."','".$start."','".$stop."');";
$insertResult=$conn->query($insertTable);
echo ' data has been succesully added';
}
else{
echo 'data already exists';
}

}
}

else{
echo ' ,file must be excel or csv';
}

}
?>