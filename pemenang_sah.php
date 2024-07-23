<!-- MODUL PEMENANG -->
<?php
require 'keselamatan.php';
require 'tetapan.php';
if(isset($_POST['submit_row'])){
$idtanding1=$_POST['idtanding1'];
$ITEM=mysqli_query($con,"SELECT COUNT(iditem) AS bil_item FROM item WHERE idtanding='$idtanding1'");

$Jum1=mysqli_fetch_array($ITEM);
$Total1=$Jum1['bil_item'];

$PESERTA=mysqli_query($con,"SELECT COUNT(idpeserta)
AS bil_peserta FROM daftar WHERE idtanding='$idtanding1'");
$Jum2=mysqli_fetch_array($PESERTA);
$Total2=$Jum2['bil_peserta'];

$MARKAH=mysqli_query($con,"SELECT COUNT(idmarkah)
AS bil_markah FROM markah WHERE idtanding='$idtanding1'");
$Jum3=mysqli_fetch_array($MARKAH);
$Total3=$Jum3['bil_markah'];

if($Total3 !=($Total2*$Total1)){
echo "<script>alert('SEMUA MARKAH BELUM DIMASUKKAN');
window.location='pemenang.php'</script>";

}else{
$idpemenang=$_POST['id'];
$jummarkah=$_POST['jum'];
$rank=$_POST['tempat'];
$idtanding=$_POST['idtanding'];
$idkat=$_POST['idkat'];

for($i=0;$i<count($idpemenang);$i++){

if($idpemenang[$i]!="" && $jummarkah[$i]!=""&&
$rank[$i]!="" && $idtanding[$i]!="" && $idkat[$i]!="")
{
	
$pemenang2=$idpemenang[$i];
$markah2=$jummarkah[$i];
$tempat2=$rank[$i];
$idtanding2=$idtanding[$i];
$idkat2=$idkat[$i];
$sql ="INSERT INTO pemenang(idpeserta,jum,tempat,idtanding,idkat)
VALUES('".$pemenang2."','".$markah2."','".$tempat2."','".$idtanding2."', '".$idkat2."')";
mysqli_query($con,$sql);
}
}
echo "<script>alert('PENGESAHAN MARKAH BERJAYA');
window.location='pemenang.php'</script>";
}
}
?>