<!-- MODUL PERTANDINGAN -->
<?php 
require 'keselamatan.php';
include 'header.php';
?>

<html>
<head>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
function add_row()
{
 $rowno=$("#pertandingan tr").length;
 $rowno=$rowno+1;
 
 $("#pertandingan tr:last").after("<tr id='row"+$rowno+"'><td><input type='text' name='comp[]'placeholder='Taip nama pertandingan di sini' size='95%'required></td><td><input type='button' class='button' value='X' onclick=delete_row('row"+$rowno+"')></td></tr>");
}
function delete_row(rowno)
{
 $('#'+rowno).remove();
}
</script>
</head>
<body>
<h2><strong><center>TAMBAH PERTANDINGAN BARU</center></strong></h2>
<form method="post" action="pertandingan_simpan.php">
<table id="pertandingan" align="center" border=0>
<tr size='80%'><td>NAMA PERTANDINGAN</td>
</tr>
<tr id="row1" size='70%'>
<td><input type="text" name="comp[]"
placeholder="Taip nama pertandingan di sini" size='95%'
required></td>
</tr>
</table><br>
<table align="center" border=0>
<tr><td>
<input type="button" onclick="add_row();" value="+ PERTANDINGAN">
<input type="submit" name="submit_row" value="SIMPAN">
</td></tr>
</table>
</form>
<center><a href="index2.php"><button>HOME</button></a>
</center>
</body>
</html>