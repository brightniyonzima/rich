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
	
	//query get data
	$sql ="SELECT * FROM occurrences ORDER BY id ASC";
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


