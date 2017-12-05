<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
$title = '[EXPORT]_REPORT-STO_' . date("Y-m-d");
header("Content-Disposition: attachment; filename=". $title .".xls");

?>

<table border="1">
	<tr>
		<th>Asset No</th>
		<th>Asset No Reg Dept</th>
		<th>Asset Key</th>
		<th>Asset Name</th>
                <th>Group</th>
                <th>Category</th>
                <th>PIC</th>
                <th>Location</th>
                <th>Location New</th>
                <th>Sub Location</th>
                <th>Condition</th>
                <th>Condition New</th>
                <th>Remark</th>
                <th>User NIK</th>
                <th>User Scan</th>
                <th>Scan Date</th>
                <th>Upload Date</th>
                <th>Asset Info</th>
	</tr>
	<?php
	//koneksi ke database
	foreach($query as $key => $data){
		echo '
		<tr>
			<td>'.$data['AssetNo'].'</td>
			<td>'.$data['AssetNoRegDept'].'</td>
			<td>'.$data['AssetKey'].'</td>
			<td>'.$data['AssetName'].'</td>
                        <td>'.$data['AssetGroup'].'</td>
                        <td>'.$data['AssetCategory'].'</td>
                        <td>'.$data['AssetPic'].'</td>
                        <td>'.$data['AssetLocation'].'</td>
                        <td>'.$data['AssetLocationNew'].'</td>
                        <td>'.$data['AssetSublocation'].'</td>
                        <td>'.$data['AssetCondition'].'</td>
                        <td>'.$data['AssetConditionNew'].'</td>
                        <td>'.$data['AssetRemark'].'</td>
                        <td>'.$data['AssetScanUser'].'</td>
                        <td>'.$data['AssetUsername'].'</td>
                        <td>'.$data['ScanDate'].'</td>
                        <td>'.$data['SystemDate'].'</td>
                        <td>'.$data['AssetInfo'].'</td>
		</tr>
		';
    
}
	?>
</table>