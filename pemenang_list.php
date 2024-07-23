<!-- MODUL PEMENANG -->
<?php
require 'keselamatan.php';
include 'header.php';
$idTANDING = $_GET['id'];
$data1=mysqli_query($con,"SELECT * FROM pertandingan
WHERE idtanding='$idTANDING'");
$info1=mysqli_fetch_array($data1);
?>
<html>
<body>
<center><h2><U>SENARAI PEMENANG-3 TERATAS <br>
PERTANDINGAN <?php echo $info1['pertandingan'];?></U></h2>
</center>
<table width="70%" border="0" align="center">
<tr>
<td colspan="5" valign="middle" align="right"><b>
<a href="index2.php">HOME</a></b></td>
</tr>
<tr>
<td><b>BIL</b></td>
<td><b>NAMA PESERTA</b></td>
<td><b>JUMLAH MARKAH</b></td>
<td><b>KEDUDUKAN</b></td>
<td><b>TINDAKAN</b></td>
</tr>
<?php
$no=1;
$data2=mysqli_query($con,"SELECT *, SUM(m.markah) AS Jum
FROM peserta AS p INNER JOIN markah AS m
ON p.idpeserta=m.idpeserta INNER JOIN pertandingan AS t
ON t.idtanding=m.idtanding INNER JOIN item AS i
ON i.iditem=m.iditem WHERE t.idtanding='$idTANDING'
GROUP BY m.idpeserta ORDER BY JUM DESC LIMIT 0,3 ");
while ($info2=mysqli_fetch_array($data2)){
#TENTUKAN KEDUDUKAN PEMENANG BERDASARKAN SUSUNAN
if ($no==1){
$hadiah = "PERTAMA";
}else if($no==2){
$hadiah = "KEDUA";
}else{
$hadiah = "KETIGA";
}
?>
<form method="post" action="pemenang_sah.php">
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $info2['nama']; ?>
<input type="text" name="id[]"
value="<?php echo $info2['idpeserta']; ?>" hidden>
</td>
<td><?php echo $info2['Jum']; ?><input type="text"
name="jum[]"
value="<?php echo $info2['Jum']; ?>" hidden>
</td>
<td><?php echo $hadiah; ?><input type="text"
name="tempat[]"
value="<?php echo $hadiah; ?>" hidden>
</td>
<!-- ID PEMENANG HIDDEN -->
<input type="text" name="idtanding[]"
value="<?php echo $info1['idtanding']; ?>" hidden>
<input type="text" name="idtanding1"
value="<?php echo $info1['idtanding']; ?>" hidden>
<!-- TAMAT DI SINI -->
<td><a href="pemenang_laporan.php?id=<?php echo $info2
['idpeserta'];?>&rank=<?php echo $hadiah;?>">CETAK</a>
</td></tr>
<?php $no++; } ?>
<tr>
<td colspan="5" valign="middle" align="center">
<input type="submit" name="submit_row"
value="<< SAHKAN >>"
onclick="return confirm('ANDA PASTI?')">
</td>
</tr>
</form>
</table><br>
<center><font style='font-size:14px'>*Senarai Tamat*<br/>
Jumlah Pemenang:<?php echo $no-1; ?>
</font>
</center>
</body>
</html>