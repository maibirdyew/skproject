<!-- MODUL UTAMA SISTEM -->
<?php
if ($_SESSION['aras']=="ADMIN"){
?>
<center>
<h2>DASHBOARD ADMIN</h2>
<a href="index.php">HOME</a></br>
<a href="setup_papar.php">TETAPAN PERTANDINGAN</a></br>
<a href="pertandingan.php">PERTANDINGAN</a></br>
<a href="hakim.php">HAKIM</a></br>
<a href="peserta.php">PESERTA</a></br>
<a href="pemenang.php">PEMENANG</a></br>
<a href="logout.php">KELUAR</a></br>
</center>
<?php
}else{
?>
<center>
<h2>DASHBOARD HAKIM</h2>
<a href="index2.php">HOME</a></br>
<a href="pemarkahan.php">PEMARKAHAN</a></br>
<a href="logout.php">KELUAR</a></br>
</center>
<?php
}
?>