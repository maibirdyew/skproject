<!-- MODUL HAKIM -->
<?php
require 'keselamatan.php';
include 'header.php';
$IDHAKIM = $_GET['id'];
$dataHakim = mysqli_query($con, "SELECT * FROM admin AS t1
WHERE t1.idadmin='$IDHAKIM'");
$INFOHakim = mysqli_fetch_array($dataHakim);
#TERIMA VALUE YANG DI POST
if (isset($_POST['hantar'])) {
$idhakim = $_POST['id'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$game = $_POST['tanding'];
$item = $_POST['item'];
$result = mysqli_query($con, "UPDATE admin SET password='$password', nama='$nama', aras=aras WHERE idadmin='$idhakim'");
$tugasan = mysqli_query($con, "INSERT INTO hakim
(idtanding,iditem,idadmin)
VALUES ('$game','$item','$idhakim')");
    echo "<script>alert('KEMASKINI MAKLUMAT BERJAYA');
window.location='hakim.php'</script>";
}
?>

<html>
<link rel="stylesheet" type="text/css" href="style.css" />
<body>
    <div id="container">
    <center>
        <h2>KEMASKINI MAKLUMAT HAKIM / AGIH TUGASAN</h2>
    </center>
    <table width="70%" border="0" align="center">
        <tr>
            <td>
                <form method="POST">


                    KOD HAKIM<br><input type="text" name="id" value="<?php echo $INFOHakim['idadmin']; ?>" readonly><br>
                    KATALALUAN<br><input type="text" name="password" size="45" value="<?php echo $INFOHakim['password']; ?>" autofocus><br>
                    NAMA HAKIM<br><input type="text" name="nama" size="60" value="<?php echo $INFOHakim['nama']; ?>" style="text-transform: uppercase"><br>
                    PERTANDINGAN<br>
                    <select name="tanding" class="tanding" required>
                        <option onchange="">-PILIH-</option>
                        <?php
                        #PILIH ITEM YANG BELUM DIAMBIL
                        $pilihan = mysqli_query($con, "SELECT idtanding,pertandingan
FROM pertandingan as t2 WHERE NOT EXISTS
(SELECT * FROM hakim as t1 WHERE t1.idtanding =
t2.idtanding
AND t1.idadmin ='$IDHAKIM')");
                        while ($row = mysqli_fetch_assoc($pilihan)) {
                            $id = $row['idtanding'];
                            $game = $row['pertandingan'];
                            #PILIHAN
                            echo "<option value='" . $id . "'>" . $game . "</option>";
                        }
                        ?>
                    </select><br />
                    <br>
                    ITEM PEMARKAHAN:<br>
                    <select name="item" class="item">
                        <option>-PILIH-</option>
                    </select><br>
                    <font color='blue'>*Paparan item adalah yang belum diagih
                        lagi.</font>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $(".tanding").change(function() {
                                var idtanding = $(this).val();
                                var post_id = 'id=' + idtanding;
                                $.ajax({
                                    type: "POST",
                                    url: "hakim_item.php",
                                    data: post_id,
                                    cache: false,
                                    success: function(cat2) {
                                        $(".item").html(cat2);
                                    }
                                });
                            });
                        });
                    </script><br><br>
                    <button name="hantar" class="button" type="submit">SIMPAN</button>
                    <button type="reset" class="button">RESET</button></button><br>
                </form>
                <div><input type="button" class="button" onclick="location.href='index2.php';" value="HOME" />
            </td>
        </tr>
    </table>
                    </div>
</body>

</html>