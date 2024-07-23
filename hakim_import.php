<!-- MODUL HAKIM -->
<?php
#ELAK SISTEM DARI BYPASS
require 'keselamatan.php';
#PAPARAN HEADER SISTEM
include 'header.php';
?>


<html>
<body>
<center><h2>IMPORT NAMA HAKIM DARI FAIL CSV</h2></center>
<table width="70%" border=0 align="center">
<tr>
<td colspan="5" valign="middle" align="right"><b>
<a href="hakim.php">HAKIM</a> |
<a href="index2.php">HOME</a></b></td>
</tr>
<tr>
<td>
<label>Kemudahan untuk daftar nama hakim secara berkelompok</label><br>
<label>Pilih lokasi fail CSV/Excel:</label>
<!-- FAIL IMPORT CSV UTK LAKSANAKAN ARAHAN IMPORT -->
<form action="hakim_csv.php" method="post"
enctype="multipart/form-data">
<input type="file" name="file" id="file"
accept=".csv"><br>

<button type="submit" id="submit" name="import" >UPLOAD
</button></center>

</form>

*Cipta fail dalam Ms Excel dan save as csv mengikut 
aturan lajur seperti di bawah:

<table width="70%" border="1" align="center">
<tr>
<td>HAKIM001</td>
<td>1234</td>
<td>NUR ATHIRAH BINTI SUHAIMI</td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>