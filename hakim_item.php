<!-- MODUL HAKIM -->
<?php 
require 'tetapan.php';
if($_POST['id']){
$id=$_POST['id'];
if($id==0){
echo "<option>PILIH ITEM</option>";
}else{
$pilih = mysqli_query($con,"SELECT * FROM item AS t2
WHERE t2.idtanding=$id AND NOT EXISTS (SELECT * FROM hakim as t1 WHERE t1.iditem=t2.iditem)");
while($row = mysqli_fetch_array($pilih)){
echo '<option value="'.$row['iditem'].'">'.$row['item'].'</option>';
}
}
}
?>