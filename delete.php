<?php
include 'lib/library.php';
$nis = $_GET['nis'];

$sql = "DELETE FROM siswa WHERE nis = $nis";

$mysqli->query($sql) or die($mysqli->error);

header('location: index.php');