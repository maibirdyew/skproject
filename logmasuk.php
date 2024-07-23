<?php
session_start();
require 'tetapan.php';
if (isset($_POST['id'])){
$user = mysqli_real_escape_string($con,$_POST['id']);
$pass = mysqli_real_escape_string($con,$_POST['pass']);
$query = mysqli_query($con, "SELECT * FROM admin
WHERE idadmin='$user' AND password='$pass'");
$row = mysqli_fetch_assoc($query);
if(mysqli_num_rows($query) == 0||$row['password']!=$pass)
{
echo "<script>alert('ID ADMIN @ Kata laluan yang salah');
window.location='index.php'</script>";
}else{
$_SESSION["idadmin"]=$row['idadmin'];
$_SESSION["aras"] = $row['aras'];
header("Location: index2.php");
}
}
?>