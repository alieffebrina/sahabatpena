<?php 

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
<thead>
<tr>
	<th colspan="7"> Data Laporan Pembelian</th>
</tr>
<tr>
  <th>No</th>
  <th>Korwil</th>
  <th>Alamat</th>
  <th>Provinsi</th>
  <th>Kota</th>
  <th>Kecamatan</th>
  <th>Kode Korwil</th>
 </tr>
</thead>
<tbody>
<?php $i=1; foreach($excel as $user) { 
	?>
<tr>
 	<td><?php echo $i++; ?></td>
  <td><?php echo $user->namakorwil; ?></td>
  <td><?php echo $user->alamat; ?></td>
  <td><?php echo $user->name_prov; ?></td>
  <td><?php echo $user->name_kota; ?></td>
  <td><?php echo $user->kecamatan; ?></td>
  <td><?php echo $user->kodekorwil; ?></td>
 </tr>
<?php } ?>
</tbody>
</table>