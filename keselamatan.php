<?php
session_start();
$LOGIN=$_SESSION['idadmin'];
if(!isset($_SESSION['idadmin'])){
header('Location: index.php');
exit();}
?>