<?php
session_start();
include 'config.php';
/** @var mysqli $mysqli */

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id_siswa'])) {
  $id = mysqli_real_escape_string($mysqli, $_GET['id_siswa']);

  $q = mysqli_query($mysqli, "SELECT id_alamat FROM siswa WHERE id_siswa='$id'");
  $d = $q ? mysqli_fetch_assoc($q) : null;
  $id_alamat = $d ? $d['id_alamat'] : null;

  mysqli_query($mysqli, "DELETE FROM daftar WHERE nis_siswa='$id'");
  mysqli_query($mysqli, "DELETE FROM siswa WHERE id_siswa='$id'");

  if (!empty($id_alamat)) {
    mysqli_query($mysqli, "DELETE FROM alamat WHERE id_alamat='$id_alamat'");
  }

  header("Location: daftar.php");
  exit;
} else {
  header("Location: daftar.php");
  exit;
}
?>