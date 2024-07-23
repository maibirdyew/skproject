<!-- MODUL PEMENANG -->
<?php
require 'tetapan.php';
require 'keselamatan.php';
require 'setup.php';
$IDPESERTA = $_GET['id'];
$KEDUDUKAN = $_GET['rank'];
$pemenang=mysqli_query($con,"SELECT* FROM peserta AS t1
INNER JOIN markah t2 ON t1.idpeserta=t2.idpeserta
INNER JOIN pertandingan t3 on t2.idtanding=t3.idtanding
WHERE t1.idpeserta='$IDPESERTA'");
$info1=mysqli_fetch_array($pemenang);
?>
<html>
<title><?php echo $namasys;?></title>
<body><table width="80%" border=0>
<tr><td colspan="2" valign="middle" align="center">
<h1>PERTANDINGAN <?php echo $info1['pertandingan'];?></h1>
<hr>
</td></tr>
<tr><td>
<h2><center>PEMENANG TEMPAT <?php echo $KEDUDUKAN;?>
</center></h2>
<center><?php echo $info1['nama'];?><br>
<?php echo $info1['idpeserta'];?><br>
KATEGORI TERBUKA<br></center></td>
</tr>
<tr><td>
<hr>
<table width="80%" border=0 align="center">
<tr>
<td><b>Bil.</b></td>
<td><b>Kriteria Pemarkahan</b></td>
<td><b>Markah</b></td>
</tr>
<?php 
$no=1;
$jum1=0;
$jum2=0;
$rekod=mysqli_query($con,"SELECT m.idpeserta, m.markah, i.item, i.markah AS FullM, m.markah FROM markah AS m INNER JOIN item AS i ON i.iditem=m.iditem WHERE m.idpeserta='$IDPESERTA'");
while ($infoRekod=mysqli_fetch_array($rekod)){
    ?>
    <tr>
<td><?php echo $no; ?></td>
<td><?php echo $infoRekod['item']; ?></td>
<td><?php echo $infoRekod['markah']; ?>
<?php $jum1+=$infoRekod['markah'];?>
/
<?php echo $infoRekod['FullM']; ?>
<?php $jum2+=$infoRekod['FullM']; ?>
</td>
</tr>
<?php $no++; } ?>
</td></tr>
<tr><td colspan="2" align="right">JUMLAH MARKAH:</td>
<td><?php echo $jum1;?>/<?php echo $jum2;?></td></tr>
</table>
<hr>
</td></tr>
<tr><td align="center">
<a href="index2.php">Home</a> |
<a href="javascript:window.print()">Cetak Laporan</a>|
<a href="logout.php">Logout</a>
</td></tr>
</table>
</body>
</html>
