<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
$title = '[EXPORT]_ASSET_' . date("Y-m-d");
header("Content-Disposition: attachment; filename=". $title .".xls");

?>

<table border="1">
	<tr>
		<th>Asset No</th>
		<th>Asset Name</th>
		<th>Asset Key</th>
		<th>No. Reg Dept</th>
		<th>Group</th>
		<th>Category</th>
		<th>Location</th>
		<th>Sub Location</th>
		<th>Cost Center</th>
		<th>PIC</th>
		<th>Condition</th>
		<th>Remark</th>
		<th>Aquisition Date</th>
		<th>Label</th>
		<th>Asset Info</th>
	</tr>
	<?php
	//koneksi ke database
	foreach($query as $key => $data){
		echo '
		<tr>
			<td>'.$data['AssetNo'].'</td>
			<td>'.$data['AssetName'].'</td>
			<td>'.$data['AssetKey'].'</td>
			<td>'.$data['AssetNoRegDept'].'</td>
			<td>'.$data['AssetGroup'].'</td>
			<td>'.$data['AssetCategory'].'</td>
			<td>'.$data['AssetLocation'].'</td>
			<td>'.$data['AssetSublocation'].'</td>
			<td>'.$data['AssetCost'].'</td>
			<td>'.$data['AssetPic'].'</td>
			<td>'.$data['AssetCondition'].'</td>
			<td>'.$data['AssetRemark'].'</td>
			<td>'.$data['AssetAquisitiondate'].'</td>
			<td>'.$data['AssetLabel'].'</td>
			<td>'.$data['AssetInfo'].'</td>
		</tr>
		';
    
}
	?>
</table>