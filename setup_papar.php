<!-- MODUL UTAMA SISTEM -->
<?php
include'header.php';
$dataSys=mysqli_query($con, "SELECT * FROM tetapan");
$INFOSys=mysqli_fetch_array($dataSys);

if(isset($_POST['update'])){
	$nama = $_POST['sys'];
	$kata1 = $_POST['nama'];
	$detail1 = $_POST['kat'];
	$kata2 = $_POST['sempena'];
	$detail2 = $_POST['tempat'];
	$end1 = $_POST['tutup'];
	$end2 = $_POST['umum'];
	$result=mysqli_query($con, "UPDATE tetapan SET namasys='$nama', kata1='$kata1', detail1='$detail1', kata2='$kata2', detail2='$detail2', tamat_daftar='$end1', tamat_hakim='$end2'");
	echo "<script>alert('KEMASKINI MAKLUMAT BERJAYA');
	window.location='index2.php'</script>";
}
?>

<html>
<body>
<center><h2>KEMASKINI MAKLUMAT SISTEM</h2></center>
<table width="70%" border=0 align="center">
<tr><td>
<form method="POST">
NAMA SISTEM<br>
<input type ="text" name="sys" size="60" value="<?php echo $namasys; ?>" autofocus>
<hr>
<br>
INFO PERTANDINGAN<br>
<input type="text" name="nama" size="60" value="<?php echo $kata1; ?>" style ="text-transform: uppercase"><br>
<br>
KETERANGAN<br>
<input type="text" name="kat" size="60" value="<?php echo $lanjut1; ?>" style ="text-transform: uppercase"><br>
<br>
ANJURAN<br>
<input type="text" name="sempena" size="60" value="<?php echo $kata2; ?>" style ="text-transform: uppercase"><br>
<br>	
TEMPAT<br>
<input type="text" name="tempat" size="60" value="<?php echo $lanjut2; ?>" style ="text-transform: uppercase"><br>
<br>
<hr>
TARIKH TUTUP PENDAFTARAN<br>
<input type="date" name="tutup" value="<?php echo $tamat_daftar; ?>"><br>
<br>
TARIKH PENGUMUMAN KEPUTUSAN<br>
<input type="date" name="umum" value="<?php echo $tamat_hakim; ?>"><br>
<br>
<button name="update" type="submit">SIMPAN</button>
<button type="reset">RESET</button>
</form>
<div><a href="index2.php"><button>HOME</button></a></div>
</td></tr>
</table>
</body>
</html>




	