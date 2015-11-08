<?php
$uploadedstatus=0;
if(isset($_POST['submit'])){
if(isset($_FILES['file')){
if($_FILES['file']['error']>0){
echo "return code".$_FILES['file']['error'];
}
else{
if(file_exists($_FILES['file']['name'])){
unlink($_FILES['file']['name']);
}
$storagename="";
move_uploaded_file($_FILES['file']['temp_name'],$storagename);
$uploadedstatus=1;
}
}
else{
echo 'no files selected';
}
}
?>
<?php
if($uploadedstatus==1)
{
echo "<table><tr><td>file uploaded</td>></tr>";
echo "<tr><td>do u want to <a href=''>hee</a></td></tr></table>";
}
?>