<!-- MODUL HAKIM -->
<?php 
require 'tetapan.php';
require 'keselamatan.php';

$IDHAPUS = $_GET['id'];
$hapuskan1 = mysqli_query($con,"DELETE FROM admin
WHERE idadmin='$IDHAPUS'");
$hapuskan2 = mysqli_query($con,"DELETE FROM markah
WHERE idadmin='$IDHAPUS'");
$hapuskan3 = mysqli_query($con,"DELETE FROM hakim
WHERE idadmin='$IDHAPUS'");
clearstatcache();
#MSG POP UP JIKA BERJAYA
 echo "<script>alert('REKOD BERJAYA DIHAPUSKAN');
 window.location='hakim.php'</script>";
?>
