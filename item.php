<!-- MODUL UTAMA SISTEM -->
<?php
require 'keselamatan.php';
include 'header.php';
#DAPATKAN ID DARI URL
$IDTANDING= $_GET['id'];
$papar=mysqli_query($con,"SELECT* FROM pertandingan
WHERE idtanding='$IDTANDING'");
$info1=mysqli_fetch_array($papar);
?>
<html>
<body>
<center>
<h2><U>SENARAI ITEM PEMARKAHAN PERTANDINGAN
<?php echo $info1['pertandingan'];?></U></h2></center>
<table width="70%" border=0 align="center">
<tr><td colspan="4" valign="middle" align="right"><b>
<a href="item_tambah.php?id=<?php echo $IDTANDING;?>">
+ ITEM</a> |
<a href="index2.php">HOME</a>
</b></td></tr>
<tr>
<td><b>BIL</b></td>
<td><b>ITEM</b></td>
<td><b>MARKAH</b></td>
<td><b>TINDAKAN</b></td>
</tr>
<?php
$no=1;
$jum=0;
$data1=mysqli_query($con,"SELECT * FROM item
WHERE idtanding='$IDTANDING' ORDER BY markah DESC");
while ($info1=mysqli_fetch_array($data1)){
?>
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $info1['item']; ?></td>
<td><?php echo $info1['markah']; 
$jum+=$info1['markah'];?></td>
<td><a href="item_edit.php?id=<?php echo $info1
['iditem'];?>">
<button>EDIT/HAPUS</button></a></td></tr>
<?php $no++; } ?>
<tr><td colspan="2" align="right">JUMLAH MARKAH:</td>
<td><?php echo $jum;?></td>
</tr>
</table><br>
<center><font style='font-size:14px'>
* Senarai Tamat *<br />Jumlah Item:<?php echo $no-1; ?>
</font>
</center>
</body>
</html>