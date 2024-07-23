<!-- MODUL PESERTA -->
<?php 
require 'tetapan.php';
require 'setup.php';
if($date1 < $date2){
echo "<script>alert('PENDAFTARAN TELAH DITUTUP');
window.location='dashboard.php'</script>";
}else{
#DAPAT ID DARI URL 
$IDHAPUS = $_GET['id'];
$del1 = mysqli_query($con, "DELETE FROM daftar WHERE iddaftar='$IDHAPUS'");
clearstatcache();
echo "<script>alert('REKOD BERJAYA DIHAPUSKAN');
window.location='dashboard.php'</script>";
}
?>