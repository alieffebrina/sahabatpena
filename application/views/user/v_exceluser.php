<?php 

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
<thead>
<tr>
	<th colspan="13"> Data Laporan Pembelian</th>
</tr>
<tr>
  <th>No Anggota</th>
  <th>NIK</th>
  <th>Nama</th>
  <th>Alamat</th>
  <th>Provinsi</th>
  <th>Kota</th>
  <th>Kecamatan</th>
  <th>Email</th>
  <th>Tlp</th>
  <th>Status Anggota</th>
  <th>Tempat Lahir</th>
  <th>Tanggal Lahir</th>
  <th>Facebook</th>
  <th>Instagram</th>
  <th>Twitter</th>
  <th>Youtube</th>
 </tr>
</thead>
<tbody>
<?php $i=1; foreach($excel as $user) { 
	?>
<tr>
 	<td><?php echo $user->noanggota; ?></td>
  <td>&nbsp;<?php echo $user->nik; ?></td>
  <td><?php echo $user->nama; ?></td>
  <td><?php echo $user->alamat; ?></td>
  <td><?php echo $user->name_prov; ?></td>
  <td><?php echo $user->name_kota; ?></td>
  <td><?php echo $user->kecamatan; ?></td>
  <td><?php echo $user->email; ?></td>
  <td><?php echo $user->tlp; ?></td>
  <td><?php echo $user->statusanggota; ?></td>
  <td><?php echo $user->tempatlahir; ?></td>
  <td><?php echo $user->tgllahir; ?></td>
  <td><?php echo $user->facebook; ?></td>
  <td><?php echo $user->instagram; ?></td>
  <td><?php echo $user->twitter; ?></td>
  <td><?php echo $user->youtube; ?></td>
 </tr>
<?php } ?>
</tbody>
</table>