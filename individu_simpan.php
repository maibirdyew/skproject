<!-- MODUL PESERTA -->
<?php
require 'tetapan.php';
if(isset($_POST['id'])){
$idpeserta = $_POST['id'];
$nama = $_POST['nama'];
$nomhp = $_POST['nomhp'];
	
$daftar1= "INSERT INTO peserta (idpeserta,nama,nomhp)
VALUES ('$idpeserta','$nama','$nomhp')";
$hasil1= mysqli_query($con, $daftar1);
if($hasil1){
session_start();
$_SESSION["idpeserta"]=$idpeserta;
echo "<script>alert('Pendaftaran berjaya');
window.location='dashboard.php'</script>";
}else{
echo"<script>alert('Pendaftaran gagal, Anda mungkin sudah mendaftar');
window.location='index.php'</script>";
}
}
?>