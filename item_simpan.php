<!-- MODUL ITEM PEMARKAHAN -->
<?php
require 'tetapan.php';
require 'keselamatan.php';
if(isset($_POST['submit_row'])){
	$item=$_POST['item'];
	$markah=$_POST['markah'];
	$com=$_POST['com'];
	for($i=0;$i<count($item);$i++){
		if($item[$i]!="" && $markah[$i]!="" && $com[$i]!="")
		{
		$item2=$item[$i];
		$markah2=$markah[$i];
		$com2=$com[$i];
		$sql = "INSERT INTO item(item,markah,idtanding)
		VALUES('".$item2."','".$markah2."','".$com2."')";
		mysqli_query($con,$sql);
		}
	}
	echo "<script>alert('TAMBAH ITEM BERJAYA');
	window.location='item.php?id=$com2'</script>";
}
?>