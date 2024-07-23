<!-- MODUL PESERTA -->
<?php 
include 'header.php';
session_start();
$PESERTA=$_SESSION["idpeserta"];
if($date1 < $date3){
	echo "<script> alert('SILA SEMAK SELEPAS TARIKH $tunjukdate');
	window.location='dashboard.php'</script>";
}
$papar=mysqli_query($con,"SELECT * FROM peserta AS t1 INNER JOIN daftar AS t2 ON t1.idpeserta=t2.idpeserta INNER JOIN pertandingan AS t3 ON t3.idtanding=t2.idtanding WHERE t1.idpeserta='$PESERTA'");
$info1=mysqli_fetch_array($papar);
$WINNER=mysqli_query($con,"SELECT * FROM pemenang WHERE idpeserta='$PESERTA'");
$win=mysqli_fetch_array($WINNER);
?>

<html>
<center>
<div><h2>DASHBOARD PESERTA</h2></div>
<table width="80%" border=0 align="center">
<tr>
<td colspan="5" valign="middle" align="right"><b>
<a href="dashboard.php">HOME</a> |
<a href="logout.php">KELUAR</a></b></td>
</tr>
<tr><td colspan="5">
<hr>
NAMA: <?php echo $info1['nama'];?><br>
NOM.KP: <?php echo $info1['idpeserta'];?><br>
NOM.HP: <?php echo $info1['nomhp'];?><br>
</td>
</tr>
<tr><td colspan="5"><hr><td></tr>
<tr>
<td><b>BIL</b></td>
<td><b>PERTANDINGAN</b></td>
<td><b>KEPUTUSAN</b></td>
</tr>
<?php
$no=1;
$jum=0;
#PAPAR REKOD DARI TABLE KATEGORI
$GAME=mysqli_query($con,"SELECT *,t1.idtanding
FROM daftar AS t1
INNER JOIN pertandingan AS t2
ON t1.idtanding=t2.idtanding
WHERE t1.idpeserta='$info1[idpeserta]'
ORDER BY t2.pertandingan ASC");
while ($TAD=mysqli_fetch_array($GAME)){
$WINNER=mysqli_query($con,"SELECT * 
FROM pemenang WHERE idpeserta='$TAD[idpeserta]'
AND idtanding='$TAD[idtanding]'");
$win=mysqli_fetch_array($WINNER);
?>
<tr>
<td width="5%"><?php echo $no; ?></td>
<td><?php echo $TAD['pertandingan']; ?></td>
<?php if($win==NULL){ ?>
<td>KANDAS</td>
<?php
}else{
	?>
	<td><?php echo $win['tempat']; ?></td>
<?php } ?>
</tr>
<?php $no++; } ?>
</table>
</html>