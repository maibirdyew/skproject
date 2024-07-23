<!-- MODUL KATEGORI -->
<?php
require 'keselamatan.php';
include 'header.php';
$IDcomp = $_GET['id'];
$dataA=mysqli_query($con,"SELECT * FROM pertandingan
WHERE idtanding='$IDcomp'");
$infoA=mysqli_fetch_array($dataA);
#DATA YANG DI POST DARI FORM
if(isset($_POST['update'])){
$com = $_POST['com'];
$idcom= $_POST['idcom'];
$result = mysqli_query($con,"UPDATE pertandingan
SET pertandingan='$com' WHERE idtanding='$idcom'");
echo "<script>alert('KEMASKINI PERTANDINGAN BERJAYA');
window.location='pertandingan.php'</script>";
}
#DATA YANG DI POST DARI FORM
if(isset($_POST['delete'])){
$idcom = $_POST['idcom'];
$hapuskan1 = mysqli_query($con, "DELETE FROM pertandingan
WHERE idtanding='$IDcomp'");
$hapuskan2 = mysqli_query($con, "DELETE FROM item
WHERE idtanding='$IDcomp'");
$hapuskan3 = mysqli_query($con, "DELETE FROM markah
WHERE idtanding='$IDcomp'");
$hapuskan4 = mysqli_query($con, "DELETE FROM daftar
WHERE idtanding='$IDcomp'");
echo "<script>alert('PERTANDINGAN BERJAYA DIHAPUSKAN');
window.location='pertandingan.php'</script>";
}
?>

<html>
<body>
<center><h2><U>SENARAI PERTANDIGNAN</U></h2></center>
<table width="70%" border="0" align="center">
<tr><td colspan="5" valign="middle" align="right"><b>
<a href="index2.php">HOME</a></b></td></tr>
<tr>
<td><b>BIL.</b></td>
<td><b>NAMA PERTANDIGNAN</b></td>
<td><b>TINDAKAN</b></td>
</tr>
<?php
$row=0;
#PAPAR REKOD TABLE KATEGORI
$cat = "SELECT * FROM pertandingan
WHERE idtanding='$IDcomp'";
$result = mysqli_query($con,$cat);
$sno = $row + 1;
while($infoD = mysqli_fetch_array($result)){
?>
<tr><td width='2%'><?php echo $sno; ?></td>
<form method="POST">
<td><input type="text" name="com" size="60"
value="<?php echo $infoD['pertandingan'];?>">
<input type="text" name="idcom"
value="<?php echo $infoD['idtanding'];?>" hidden></td>
<td>
<button type="submit" name="update">SIMPAN</button>
<button type="submit" name="delete" onclick="return confirm('Anda Pasti?')">HAPUS</button>
</form>
</td></tr>
<?php $sno ++; } ?>
</table>
</body>
</html>