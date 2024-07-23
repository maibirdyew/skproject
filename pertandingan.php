<!-- MODUL PERTANDINGAN -->
<?php
require 'keselamatan.php';
include 'header.php';
?>

<html>
<body>
<center><h2><U>SENARAI PERTANDINGAN</U></h2></center>
<table width="80%" border=0 align="center">
<tr><td colspan="3" valign="middle" align="right"><b>
<a href="pertandingan_tambah.php">+ PERTANDINGAN</a> |
<a href="index2.php">HOME</a></b></td>
</tr>
<tr><td><b>BIL</b></td>
<td><b>NAMA PERTANDINGAN</b></td>
<td><b>TINDAKAN</b></td>

<?php
$no=1;
$jum=0;
$Game=mysqli_query($con,"SELECT * FROM pertandingan
ORDER BY pertandingan ASC");
while ($InfoGame=mysqli_fetch_array($Game)){
?>
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $InfoGame['pertandingan']; ?></td>
<td><a href="item.php?id=
<?php echo $InfoGame['idtanding'];?>">PEMARKAHAN</a> |
<a href="pertandingan_edit.php?id=
<?php echo $InfoGame['idtanding'];?>">EDIT</a></td>
</tr>
<?php $no++;} ?>
</table>
<br>
<center><font style='font-size:14px'>
* Senarai Tamat *<br />Jumlah Pertandingan:
<?php echo $no-1;?>
</font></center>
</body>
</html>