<!-- MODUL HAKIM -->
<?php
require 'keselamatan.php';
include 'header.php';
?>

<html>
<body>
<center><h2><U>SENARAI AGIHAN TUGAS HAKIM PERTANDINGAN
</U></h2></center>
<table width="70%" border=0 align="center">
<tr>
<td colspan="6" valign="middle" align="right"><b>
<a href="hakim.php">
HAKIM TIADA TUGAS</a> |
<a href="index2.php">
HOME<a/><b>
</td>
</tr>
<tr>
<td><b>BIL</b></td>
<td><b>ID HAKIM</b></td>
<td><b>NAMA</b></td>
<td><b>PERTANDINGAN</b></td>
<td><b>KRITERIA</b></td>
<td><b>TINDAKAN</b></td>
</tr>
<?php
$no=1;
$data1=mysqli_query($con,"SELECT * FROM hakim AS t1
RIGHT JOIN admin AS t2 ON t1.idadmin=t2.idadmin
INNER JOIN pertandingan AS t3 on t1.idtanding=t3.idtanding
INNER JOIN item AS t4 ON t1.iditem=t4.iditem
WHERE t2.aras='HAKIM' ORDER BY t3.pertandingan ASC ");

while ($info1=mysqli_fetch_array($data1))
{
?>
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $info1['idadmin']; ?></td>
<td><?php echo $info1['nama']; ?></td>
<td><?php echo $info1['pertandingan']; ?></td>
<td><?php echo $info1['item']; ?></td>
<td><a href="hakim_hapus.php?id=
<?php echo $info1['idadmin'];?>" onclick="return confirm
('Anda Pasti?')">HAPUS</a>
</td></tr>
<?php $no++; } ?>
</table><br>
<center><font style='font-size:14px'>
* Senarai tamat *<br />Jumlah Hakim:<?php echo $no-1; ?>
</font></center>
</body>
</html>
	