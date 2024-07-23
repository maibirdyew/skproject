<!-- MODUL PERTANDINGAN -->
<?php
require 'keselamatan.php';
require 'tetapan.php';
if(isset($_POST['submit_row'])){
$comp=$_POST['comp'];
for($i=0;$i<count($comp);$i++){
if($comp[$i]!=""){
$comp2=$comp[$i];
$sql = "INSERT INTO pertandingan(pertandingan)
VALUES('".$comp2."')";
mysqli_query($con,$sql);
}
}
echo "<script>alert('TAMBAH PERTANDINGAN BERJAYA ');
window.location='pertandingan.php'</script>";
}
?>