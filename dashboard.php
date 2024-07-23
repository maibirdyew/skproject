<!-- MODUL PESERTA -->
<?php
include 'header.php';
session_start();
$PESERTA=$_SESSION["idpeserta"];
#SEMAKAN LOGIN TELAH DIBUAT
if(!isset($PESERTA)){
header('Location: individu_login.php');
exit();}
#SAMBUNG KE DP
$papar=mysqli_query($con,"SELECT* FROM peserta
WHERE idpeserta='$PESERTA'");
$info1=mysqli_fetch_array($papar);

?>
<html>
<center><div><h2>DASHBOARD PESERTA</h2></div>
<table width="80%" border=0 align="center">
<tr>
<td colspan="5" valign="middle" align="right"><b>
<a href="dashboard.php">HOME</a> |
<a href="individu_daftar.php?id=<?php echo $PESERTA;
?>">DAFTAR PERTANDINGAN</a> |
<a href="individu_keputusan.php">SEMAK KEPUTUSAN</a> |

<a href="logout.php">KELUAR</a></b></td>
</tr>

<tr><td td colspan="5">
<hr>
NAMA: <?php echo $info1['nama'];?><br>
NOM.KP: <?php echo $info1['idpeserta'];?><br>
NOM.HP: <?php echo $info1['nomhp'];?><br>
<font color='red'>*Sila daftarkan pertandingan yang ingin 
disertai.</font>
</td></tr>
<tr><td colspan="5" align="center">
<hr>
<u>PERTANDINGAN YANG DIDAFTARKAN</u>
<td>
</tr>
<tr>
<td><b>BIL</b></td>
<td><b>NAMA PERTANDINGAN</b></td>
<td><b>TINDAKAN</b></td>
</tr>
<?php
$no=1;
$jum=0;
$Reg=mysqli_query($con,"SELECT * FROM DAFTAR AS t1
INNER JOIN pertandingan AS t2 ON t1.idtanding=t2.idtanding
WHERE t1.idpeserta=$PESERTA	
ORDER BY t2.pertandingan ASC");
while ($COMP=mysqli_fetch_array($Reg)){
?>
<tr>
<td width="5%"><?php echo $no; ?></td>
<td><?php echo $COMP['pertandingan']; ?></td>
<td><a href="individu_hapus.php?id=
<?php echo $COMP['iddaftar']; ?>"
onclick="return confirm('Anda Pasti?')">HAPUS</a>
</td>
</tr>
<?php $no++; } ?>
</table></center><br>
<center><font style='font-size:14px'>
* Senarai Tamat *<br />Jumlah Pertandingan:
<?php echo $no-1; ?>
</font></center>
</html>