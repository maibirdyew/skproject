<!-- MODUL HAKIM BERI MARKAH -->
<?php
require 'keselamatan.php';
include 'header.php';
$KEPAKARAN=mysqli_query($con,"SELECT* FROM hakim AS t1
INNER JOIN item AS t2 ON t1.iditem=t2.iditem
WHERE t1.idadmin='$LOGIN'");
$info1=mysqli_fetch_array($KEPAKARAN);
?>

<html>
<body>
<center><h2><U>SENARAI PESERTA BELUM DINILAI</U></h2>
<h4>Item:<?php echo $info1['item'];?></h4>
</center>
<table width="80%" border=0 align="center">
<tr><td colspan="5" valign="middle" align="right"><b>
<a href="index2.php">HOME</a></b></td>
</tr>
<tr>
<td><b>BIL</b></td>
<td><b>NAMA PESERTA</b></td>
<td><b>PERTANDINGAN</b></td>
<td><b>TINDAKAN</b></td>
</tr>
<?php 
#PAPAR REKOD YG BELUM DIBERIKAN MARKAH
$no=1;
$data1=mysqli_query($con,"SELECT* FROM peserta AS t2
INNER JOIN daftar AS t3 ON t2.idpeserta=t3.idpeserta
INNER JOIN pertandingan AS t4 on t3.idtanding=t4.idtanding
INNER JOIN hakim AS t6 ON t4.idtanding=t6.idtanding
AND NOT EXISTS (SELECT * FROM markah
WHERE idadmin='$LOGIN' AND idpeserta = t2.idpeserta)
WHERE t6.iditem='$info1[iditem]'
AND t6.idtanding='$info1[idtanding]'
ORDER BY t2.nama ASC");
while ($info1=mysqli_fetch_array($data1)){
?>
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $info1['nama']; ?></td>
<td><?php echo $info1['pertandingan']; ?></td>
<td><a href="pemarkahan_beri.php?id=
<?php echo $info1['iddaftar'];?>"><button>NILAIKAN
</button></a>
</td></tr>
<?php $no++; } ?>
</table>
<br><center><font style='font-size:14px'>
* Senarai Tamat *<br />Jumlah Peserta:<?php echo $no-1; ?>
</font></center>
</body>
</html>