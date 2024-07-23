<!-- MODUL PESERTA -->
<?php 
include 'header.php';
$PESERTA= $_GET['id'];
$date1=date_create(date('Y-m-d'));
$date2=date_create($tamat_daftar);
#JIKA HARI TIDAK KURANG DARIPADA TARIKH TUTUP
if($date1 < $date2){
echo "<script>alert('PENDAFTARAN TELAH DITUTUP');
window.location='dashboard.php'</script>";
}

if (isset($_POST['hantar'])){
$idpeserta = $_POST['idpeserta'];
$game = $_POST['tanding'];
$daftar1= "INSERT INTO daftar (idpeserta,idtanding)
VALUES ('$idpeserta','$game')";
$hasil1= mysqli_query($con, $daftar1);
echo "<script>alert('PENDAFTARAN PERTANDINGAN BERJAYA');
window.location='dashboard.php'</script>";
}
?>

<html>
<body>
<center><h2>PENDAFTARAN PERTANDINGAN</h2></center>
<table width="70%" border="0" align="center">
<tr><td>
<form method="POST">
NOM K/P<br><input type="text" name="idpeserta"
value="<?php echo $PESERTA; ?>" readonly>
<br>PERTANDINGAN<br>
<select name="tanding" required>
<option value="">- PILIH -</option>
<?php
#PILIH ITEM YG BELUM DIAMBIL

$pilihan=mysqli_query($con,"SELECT idtanding,pertandingan
FROM pertandingan as t2 WHERE NOT EXISTS
(SELECT * FROM daftar as t1
WHERE t1.idtanding=t2.idtanding
AND t1.idpeserta =$PESERTA)");
while($row = mysqli_fetch_assoc($pilihan) ){
$id = $row['idtanding'];
$game = $row['pertandingan'];

#PILIHAN
echo "<option value='".$id."'>".$game."</option>";
}
?>
</select>
<br/>
<font color='blue'>*Papar pertandingan yang belum didaftar
lagi.</font><br>


<!-- BUTANG -->
<button name="hantar" type="submit">DAFTAR</button>
<button type="reset">RESET</button><br>

</form>
<div>
<a href="dashboard.php"><button>HOME</button></a>
</div>
</td></tr>
</table>
</body>
</html>