<!-- MODUL UTAMA SISTEM -->
<?php include 'header.php'; ?>

<html>
<body><center>
<div width= "70%">
<h2><b>DASHBOARD PERTANDINGAN</b></h2>
<p>Maklumat Pertandingan :
<?php echo $kata1;?></br>
Anjuran :
<?php echo $kata2;?></br>
Tempat :
<?php echo $lanjut2;?></br>
Tarikh Tutup Penyertaan :
<?php echo $tamat_daftar;?></br>
Tarih Pengumuman Keputusan :
<?php echo $tamat_hakim;?></p>
</div>
<hr>

<div><h2>PESERTA PERTANDINGAN</h2></div>
<div><a href="semak_daftar.php"><button>SIGN UP</button>
</a>
<a href="individu_login.php"><button>SIGN IN</button></a>
</div>
<hr>
<div><h2>ADMIN/HAKIM</h2></div>
<a href="hakim_intro.php"><button>SIGN IN</button></a>
</center></body>
</html>