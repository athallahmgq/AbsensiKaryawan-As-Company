<?php

require 'functions.php';

$id_karyawan = $_GET['id_karyawan'];
$query = "DELETE FROM karyawan WHERE id_karyawan = '$id_karyawan'";
$query2 = "DELETE FROM karyawan WHERE id_karyawan = '$id_karyawan'";
mysqli_query($connection, $query2);
mysqli_query($connection, $query);

header("Location: index.php");
