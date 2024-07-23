<!-- MODUL PESERTA -->
<?php include 'header.php';?>

<html>
<body><center><h2>PENDAFTARAN PESERTA BARU</h2></center>
<table width="70%" border="0" align="center">
<tr><td>
<form method="POST" action="individu_simpan.php">
NOM.KAD PENGENALAN<br>
<input type="text" name="id" placeholder="TANPA TANDA -"
maxLength='12' size="45"
onkeypress='return event.charCode >= 48 && event.charCode
<= 57' required autofocus>
<br>NAMA<br>

<input type="text" name="nama" placeholder="NAMA ANDA"
size="60" style="text-transform: uppercase" required>
<br>NOM HP<br>
<input type="text" name="nomhp"
placeholder="TANPA TANDA -" maxLength='13'
size="45" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
<br><br>
<div><button name="hantar" type="submit">DAFTAR</button>
<button type="reset">RESET</button></div><br>
<font color='blue'>*Pastikan maklumat anda betul sebelum
membuat pendaftran.</font>
</form>
<div><a href="index.php"><button>HOME</button></a></div>

</td></tr>
</table>
</body>
</html>