<!-- MODUL PEMENANG -->
<?php
require 'tetapan.php';
require 'keselamatan.php';
include 'header.php';
?>

<html>
<body>
<center>
<h2><U>PEMARKAHAN MENGIKUT PERTANDINGAN</U></h2>
</center>
<table width="80%" border=0 align="center">
<tr><td colspan="4" valign="middle" align="right"><b>
<a href="index2.php">HOME</a></b></td></tr>
<tr>
<td><b>BIL</b></td>
<td><b>PERTANDINGAN</b></td>
<td><b>TINDAKAN</b></td>
</tr>
<?php
$no=1;
$jum=0;
$COMP=mysqli_query($con,"SELECT * FROM markah AS t1
INNER JOIN pertandingan AS t3 ON t1.idtanding=t3.idtanding
GROUP BY t1.idtanding ORDER BY t3.pertandingan ASC");
while ($row=mysqli_fetch_array($COMP)){
?>
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $row['pertandingan']; ?></td>
<td><a href="pemenang_list.php?id=<?php echo $row
['idtanding'];?>"><button>PEMENANG</button></a></td>
</tr>
<?php $no++; } ?>
</table><br>
<center><font style='font-size:14px'>
* Senarai Tamat *<br />Jumlah Rekod:<?php echo $no-1; ?>
</font></center>
</body>
</html>