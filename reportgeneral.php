<?php
// The function header by sending raw excel
header("Content-type: application/vnd-ms-excel");
 
// Defines the name of the export file "brightrich-export.xls"
header("Content-Disposition: attachment; filename=brightrich-export.xls");

?>
<table border="1">
    <tr>
    	<th>NO.</th>
		<th>location</th>
		<th>supplier</th>
		<th>start</th>
		<th>end</th>
	</tr>
	
	<?php
    include 'connection.php';
	$sql="select * from occurrences";
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
