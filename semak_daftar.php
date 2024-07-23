<!-- MODUL PESERTA -->
<?PHP
include 'tetapan.php';
include 'setup.php';
if($date1 > $date2){
echo"<script>alert('PENDAFTARAN MASIH DIBUKA');
window.location='individu_signup.php'</script>";
#JIKA HARI TIDAK KURANG DARI TARIKH HAKIM
}else{
echo "<script>alert('PENDAFTARAN TELAH DITUTUP');
window.location='individu_login.php'</script>";
}
?>