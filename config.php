<?php
    $host = "localhost";
    $user = "root";
    $pw = "";
    $db = "daftar_ekskul";

    $mysqli = mysqli_connect($host, $user, $pw, $db);

    if (!$mysqli) die("Gagal menyambung: " . mysqli_connect_error());
?>