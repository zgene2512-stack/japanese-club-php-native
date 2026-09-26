<?php
include "config.php";
/** @var mysqli $mysqli */

$class = "SELECT * FROM kelas ORDER BY nama_kelas ASC";
$res = mysqli_query($mysqli, $class);
$divisi = "SELECT * FROM divisi";
$res_div = mysqli_query($mysqli, $divisi);

if (isset($_POST['submit'])) {

    $nama = $_POST['nama'];
    $id_kelas = $_POST['kelas'];
    $divisi = $_POST['divisi'];
    $noTelp = $_POST['no_telp'];
    $tglLahir = $_POST['tgl_lahir'];
    $kab = $_POST['kab'];
    $kec = $_POST['kec'];
    $kel = $_POST['kel'];
    $rtrw = $_POST['rt-rw'];


    mysqli_query($mysqli, "
        INSERT INTO alamat (kabupaten, kecamatan, kelurahan, rt_rw)
        VALUES ('$kab', '$kec', '$kel', '$rtrw')
    ");
    $id_alamat = mysqli_insert_id($mysqli);

    mysqli_query($mysqli, "
        INSERT INTO siswa (nama_siswa, id_kelas, no_telepon, tanggal_lahir, id_alamat)
        VALUES ('$nama', '$id_kelas', '$noTelp', '$tglLahir', '$id_alamat')
    ");

    $id_siswa_baru = mysqli_insert_id($mysqli);
    mysqli_query($mysqli, "INSERT INTO daftar (nis_siswa, id_divisi, tanggal_daftar) VALUES ('$id_siswa_baru', '$divisi', NOW())");


    header("Location: daftar.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <link rel="stylesheet" href="form.css">
</head>

<body>
    <a href="index.php" class="back-link">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
        Back
    </a>
    <section class="container">
        <h1>Tambah Siswa</h1>
        <form action="add.php" method="post" name="add">
            <div class="form-group">
                <label>Nama Siswa: </label>
                <input type="text" name="nama" id="nama_siswa">
            </div>
            <div class="form-group">
                <label>Kelas: </label>
                <select name="kelas">
                    <option disabled selected value="">Pilih Kelas</option>
                    <?php while ($kelas = mysqli_fetch_assoc($res)): ?>
                        <option value="<?= $kelas['id_kelas']; ?>"><?= $kelas['nama_kelas']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Divisi: </label>
                <select name="divisi">
                    <option disabled selected value="">Pilih Divisi</option>
                    <?php while ($divisi = mysqli_fetch_assoc($res_div)): ?>
                        <option value="<?= $divisi['id_divisi']; ?>"><?= $divisi['nama_divisi']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label>No. Telepon: </label>
                <input type="text" name="no_telp" id="no_telp">
            </div>
            <div class="form-group">
                <label>Tanggal Lahir: </label>
                <input type="date" name="tgl_lahir" id="tgl_lahir">
            </div>
            <h2>Alamat</h2>
            <div class="form-alamat">
                <label>Kabupaten: </label>
                <input type="text" name="kab" id="kab">
            </div>
            <div class="form-alamat">
                <label>Kecamatan: </label>
                <input type="text" name="kec" id="kec">
            </div>
            <div class="form-alamat">
                <label>Kelurahan: </label>
                <input type="text" name="kel" id="kel">
            </div>
            <div class="form-alamat">
                <label>RT/RW: </label>
                <input type="text" name="rt-rw" id="rt-rw">
            </div>
            <div class="form-button">
                <button type="submit" name="submit">Tambah</button>
            </div>
        </form>
    </section>
</body>

</html>

