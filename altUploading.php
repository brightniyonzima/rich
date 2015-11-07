
<?php
include 'connection.php';
    if(isset($_POST['file'])){$path = $_POST['file'];}
    $queryArray = array();
    $objPHPExcel = PHPExcel_IOFactory::load($path);
    $flag=true;
	foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
  $queryArray = array();
    foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
        $worksheetTitle     = $worksheet->getTitle();
        if($flag)
        {
            $highestRow         = 0;
            $highestColumn      = 'A';
            $flag= false;
        }
        $curRow         = $worksheet->getHighestRow(); 
        $curColumn      = $worksheet->getHighestColumn(''); 
        $curColumnIndex = PHPExcel_Cell::columnIndexFromString($curColumn);
        $highestRow = ($highestRow<$curRow)?$curRow:$highestRow;
        $highestColumn = ($highestColumn<=$curColumn)?$curColumn:$highestColumn;
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
        $nrColumns = ord($highestColumn) - 64;
        echo "<br>The worksheet ".$worksheetTitle." has ";
        echo $nrColumns . ' columns (A-' . $highestColumn . ') ';
        echo ' and ' . $curRow . ' row.';
        echo '<br>Data: <table border="1"><tr>';
        for ($row = 1; $row <= $curRow;$row++) {
            echo '<tr>';
            for ($col = 0; $col < $curColumnIndex; $col++) {
                $cell = $worksheet->getCellByColumnAndRow($col, $row);
                $val = $cell->getCalculatedValue();
                $queryArray[$row][$col] = (string)$val;
                echo '<td>'.$val.'<br></td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }   
          $sql = 'INSERT INTO occurences VALUES';
  $value = NULL;
  foreach($queryArray as $v)
  {
      $value .=  '(';
      foreach ($v as $check)
          $value .= '\''.$check.'\',';
      $value = substr($value,0,-1);
      $value .= '),';
  }
  $sql.=substr($value,0,-1).';';
  //mysql_query($sql) or die('Invalid query: ' . mysql_error());
}
		?>