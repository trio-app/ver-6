<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
$title = '[EXPORT]_STO_by-CATEGORY_' . date("Y-m-d");
header("Content-Disposition: attachment; filename=". $title .".xls");

?>

<table border="1">
	<tr>
		<th>Category</th>
		<th>Total Asset</th>
		<th>Scanned</th>
		<th>Not Scanned</th>
	</tr>
	<?php
	//koneksi ke database
	foreach($query as $key => $data){
		echo '
		<tr>
			<td>'.$data['AssetCategory'].'</td>
			<td>'.$data['TotalAsset'].'</td>
			<td>'.$data['AssetScanned'].'</td>
			<td>'.$data['AssetNotScan'].'</td>
		</tr>
		';
    
}
	?>
</table>