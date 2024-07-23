<?php
session_start();
include 'header.php';
include 'tetapan.php';

#TERIMA VALUE YG DIPOSIT
if (isset($_POST['kp'])){
$user = mysqli_real_escape_string($con,$_POST['kp']);
$query = mysqli_query($con, "SELECT * FROM peserta
WHERE idpeserta='$user'");
$row = mysqli_fetch_assoc($query);
if(mysqli_num_rows($query) == 0){
echo "<script>alert('Nom.KP tidak ditemui');
window.location='individu_login.php'</script>";
}else{
$_SESSION["idpeserta"]=$row['idpeserta'];
#PAPAR MENU UTAMA
header("Location: dashboard.php");
}
}
?>

<html>
<body>
<center><div><h2>LOGIN PESERTA</h2></div>
<form method="post">
<div><input onblur="checkLength(this)" type="text"
name="kp" placeholder="Nom.KP tanpa tanda -"
maxLength='12' size='25' required autofocus />
<script>
function checkLength(el){
if (el.value.length < 12){
alert("Taip Nom.KP")
}
}
</script>
</div>
<div>
<button name="hantar" type="submit">LOGIN</button>
<button type ="reset">RESET</button>
</div>
</form>
</center></body>
</html>