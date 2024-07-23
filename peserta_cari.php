<!-- MODUL PESERTA -->
<?php
require 'keselamatan.php';
include 'header.php';
$jumpakp= $_POST['carikp'];

if($jumpakp==NULL) {
#PAPAR MESEJ JIKA NULL
echo "<script>alert('SILA TAIP NOM.KP');
window.location='peserta.php'</script>";
}
?>

<html>
<body>
<center><h2><U>SENARAI PESERTA</U></h2></center>
<table width="70%" border=0 align="center">
<tr>
<td colspan="6" valign="middle" align="right"><b>
<a href="index2.php">HOME</a>
<hr></b></td></tr>
<tr>
<td><b>BIL</b></td>
<td><b>NOM</b></td>
<td><b>NAMA</b></td>
<td><b>PERTANDINGAN</b></td>
</tr>
<?php
#PANGGIL TABLE PESERTA
$no=1;
$data1=mysqli_query($con,"SELECT * FROM daftar AS t1
INNER JOIN peserta AS t2 ON t1.idpeserta=t2.idpeserta
INNER JOIN pertandingan AS t3 on t1.idtanding=t3.idtanding
WHERE t1.idpeserta like '%$jumpakp%' ORDER BY t2.nama
ASC");
while ($info1=mysqli_fetch_array($data1)){
?>
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $info1['idpeserta']; ?></td>
<td><?php echo $info1['nama']; ?></td>
<td><?php echo $info1['pertandingan']; ?></td>
</tr>
<?php $no++; } ?>
</table><br>
<center><font style='font-size:14px'>
* Senarai Tamat *<br />Jumlah Peserta:<?php echo $no-1; ?>
</font></center>
</body>
</html> 