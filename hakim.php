<!-- MODUL HAKIM -->
<?php 
require 'keselamatan.php';
include 'header.php';
?>

<html>
<body>
<center><h2><U>SENARAI HAKIM BELUM ADA TUGASAN</U></h2></center>
<table width="70%" border=0 align="center">
<tr>
<td colspan="5" valign="middle" align="right"><b>
<a href="hakim_bertugas.php">TUGASAN HAKIM</a> |
<a href="hakim_tambah.php">+ HAKIM</a> |
<a href="hakim_import.php">IMPORT HAKIM</a> |
<a href="index2.php">HOME</a></b>
</td>
</tr>

<tr>
<td><b>BIL</b></td>
<td><b>NAMA</b></td>
<td><b>ID HAKIM</b></td>
<td><b>PASSWORD</b></td>
<td><b>TINDAKAN</b></td>
</tr>

<?php
$no=1;
$data1=mysqli_query($con,"SELECT idadmin,password,nama,aras FROM admin as t2
WHERE NOT EXISTS
(SELECT * FROM hakim as t1 WHERE t1.idadmin = t2.idadmin)
AND t2.aras='HAKIM' ORDER BY t2.nama ASC");
while ($info1=mysqli_fetch_array($data1))
{
?>
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $info1['nama']; ?></td>
<td><?php echo $info1['idadmin']; ?></td>
<td><?php echo $info1['password']; ?></td>
<td><a href="hakim_profil.php?id=
<?php echo $info1['idadmin'];?>">TUGASAN</a> |
<a href="hakim_hapus.php?id=
<?php echo $info1['idadmin'];?>" onclick="return confirm
('Anda Pasti?')">HAPUS </a></td>
</td>
</tr>

<?php $no++;} ?>
</table><br>
<center><font style='font-size:14px'>
* Senarai Tamat *<br />Jumlah Hakim:<?php echo $no-1; ?>
</font></center>
</body>
</html>