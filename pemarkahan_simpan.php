<!-- MODUL HAKIM BERI MARKAH -->
<?php 
require 'keselamatan.php';
require'tetapan.php';
if(isset($_POST['submit_row'])){
	$iditem=$_POST['iditem'];
	$markah=$_POST['markah'];
	$penuh=$_POST['penuh'];
	$idpeserta=$_POST['idpeserta'];
	$idhakim=$_POST['idadmin'];
	$idtanding=$_POST['idtanding'];
	$iddaftar=$_POST['iddaftar'];
if($markah>$penuh){
	echo "<script>alert('Nilai lebih dari markah penuh'0:
	window.location='pemarkahan_beri.php?id=$iddaftar'</script>";
}else{
	$sql = "INSERT INTO markah(markah,iditem,idpeserta,idadmin,idtanding)
	VALUES('$markah','$iditem','$idpeserta','$idhakim','$idtanding')";
	mysqli_query($con,$sql);
	echo "<script>alert('MARKAH BERJAYA DIREKODKAN');
	window.location='pemarkahan.php'</script>";
}
}
?>