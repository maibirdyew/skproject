<!-- MODUL PESERTA -->
<?php
require 'tetapan.php';
require 'keselamatan.php';
$IDHAPUS = $_GET['id'];
$del1 = mysqli_query($con,"DELETE FROM peserta WHERE
idpeserta='$IDHAPUS'");
$del2 = mysqli_query($con,"DELETE FROM markah WHERE
idpeserta='$IDHAPUS'");
$del3 = mysqli_query($con,"DELETE FROM pemenang WHERE
idpeserta='$IDHAPUS'");
clearstatcache();
echo "<script>alert('REKOD BERJAYA DIHAPUSKAN');
window.location='peserta.php'</script>";
?>