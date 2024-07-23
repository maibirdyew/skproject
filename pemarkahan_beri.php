<!-- MODUL HAKIM BERI MARKAH -->
<?php 
require 'keselamatan.php';
include 'header.php';
$IDdaftar=$_GET['id'];
$dataA=mysqli_query($con,"SELECT * FROM peserta AS t1
INNER JOIN daftar AS t2 ON t1.idpeserta=t2.idpeserta
INNER JOIN pertandingan AS t3 ON t2.idtanding=t3.idtanding
WHERE t2.iddaftar='$IDdaftar'");
$infoA=mysqli_fetch_array($dataA);
?>

<html>
<body>
<center><h2><U>PEMARKAHAN PESERTA</U></h2></center>
<table width="80%" border=0 align="center">
<tr><td colspan="5" valign="middle" align="right">
<a href="index2.php">HOME</a></td></tr>
<tr><td colspan="5" valign="middle" align="left">
Nama :<?php echo $infoA['nama'];?><br>
Nom.KP :<?php echo $infoA['idpeserta'];?><br>
Nom.HP :<?php echo $infoA['nomhp'];?><br>
Pertandingan :<?php echo $infoA['pertandingan'];?><br>
Kategori :TERBUKA<br>
<hr>
</td></tr>
<tr>
<td><b>ITEM</b></td>
<td><b>MARKAH PENUH</b></td>
<td><b>MARKAH ITEM INI</b></td>
</tr>
<?php
$data1=mysqli_query($con,"SELECT * FROM item AS i
INNER JOIN hakim AS a ON a.iditem=i.iditem
WHERE a.idadmin='$LOGIN'");
$info1=mysqli_fetch_array($data1)
?>
<form method="post" action="pemarkahan_simpan.php">
<tr><td><?php echo $info1['item']; ?></td>
<td><?php echo $info1['markah'];?></td>
<td><input type="text" maxLength='2' name="markah"
placeholder="X" size='5%' required autofocus />
</td></tr>
<input type "text" name="penuh" value="<?php
echo $info1['markah'];?>" hidden>
<input type "text" name="iditem" value="<?php
echo $info1['iditem'];?>" hidden>
<input type "text" name="idpeserta" value="<?php
echo $infoA['idpeserta'];?>" hidden>
<input type "text" name="idadmin" value="<?php
echo $LOGIN;?>" hidden>
<input type "text" name="idtanding" value="<?php
echo $infoA['idtanding'];?>" hidden>
<input type "text" name="iddaftar" value="<?php
echo $infoA['iddaftar'];?>" hidden>
<tr><td colspan="5" align="center">
<input type="submit" name="submit_row" value="SIMPAN">
<input type="reset" name="reset" value="RESET">
</td></tr>
</table>
</form>
</body>
</html>