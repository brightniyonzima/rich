<table border="1">
    <tr>
    	<th>NO.</th>
		<th>location</th>
		<th>supplier</th>
		<th>start</th>
		<th>end</th>
	</tr>
	
<?php
	//connection to mysql
	include 'connection.php';
	$reportlocation=$_POST['reportlocation'];
	$from=$_POST['datepickerfrom'];
	$froms=date('Y-m-d', strtotime($from)); //date format
	$to=$_POST['datepickerto'];
	$tos=date('Y-m-d', strtotime($to)); //date format
	//query get data
	$sql ="SELECT * FROM occurrences,locations WHERE locations.area='".$reportlocation."' AND occurrences.start like'".$from."' AND occurrences.end like '".$to."'  ";
	//$sql="select * from occurrences";
	$result=$conn->query($sql);
	
	while($data = mysqli_fetch_row($result)){
		echo '
		<tr>
		    <td>'.$data[0].'</td>
			<td>'.$data[1].'</td>
			<td>'.$data[2].'</td>
			<td>'.$data[3].'</td>
			<td>'.$data[4].'</td>
		</tr>
		';
	}
	?>
	</table>


