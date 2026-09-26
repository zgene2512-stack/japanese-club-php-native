<?php
include "config.php";
/** @var mysqli $mysqli */


if (!isset($_GET['id_siswa'])) {
    header("Location: daftar_siswa.php");
    exit;
}

$nis = mysqli_real_escape_string($mysqli, $_GET['id_siswa']);

$q_siswa = mysqli_query($mysqli, "SELECT siswa.*, alamat.kabupaten, alamat.kecamatan, alamat.kelurahan, alamat.rt_rw FROM siswa LEFT JOIN alamat ON siswa.id_alamat = alamat.id_alamat WHERE siswa.id_siswa = '$nis'
");
$siswa = mysqli_fetch_assoc($q_siswa);

if (!$siswa) {
    echo "<script>alert('Data siswa tidak ditemukan!'); window.location='daftar_siswa.php';</script>";
    exit;
}

$id_divisi_now = "";
$q_daftar = mysqli_query($mysqli, "SELECT id_divisi FROM daftar WHERE nis_siswa = '$nis'");
if ($q_daftar && $row = mysqli_fetch_assoc($q_daftar)) {
    $id_divisi_now = $row['id_divisi'];
}

$class = "SELECT * FROM kelas ORDER BY id_kelas ASC";
$res = mysqli_query($mysqli, $class);
$divisi = "SELECT * FROM divisi";
$res_div = mysqli_query($mysqli, $divisi);

if (isset($_POST['submit'])) {

    $nama    = mysqli_real_escape_string($mysqli, $_POST['nama']);
    $id_kelas = mysqli_real_escape_string($mysqli, $_POST['kelas']);
    $id_divisi = mysqli_real_escape_string($mysqli, $_POST['divisi']);
    $noTelp  = mysqli_real_escape_string($mysqli, $_POST['no-telp']);
    $tglLahir = mysqli_real_escape_string($mysqli, $_POST['tgl-lahir']);
    $kab     = mysqli_real_escape_string($mysqli, $_POST['kab']);
    $kec     = mysqli_real_escape_string($mysqli, $_POST['kec']);
    $kel     = mysqli_real_escape_string($mysqli, $_POST['kel']);

    $rtrw = mysqli_real_escape_string($mysqli,trim($_POST['rt-rw']));
    $id_alamat = $siswa['id_alamat'];

    mysqli_query($mysqli, "
        UPDATE alamat SET
            kabupaten = '$kab',
            kecamatan = '$kec',
            kelurahan = '$kel',
            rt_rw = '$rtrw'
        WHERE id_alamat = '$id_alamat'
    ");

    mysqli_query($mysqli, "
        UPDATE siswa SET
            nama_siswa = '$nama',
            id_kelas = '$id_kelas',
            no_telepon = '$noTelp',
            tanggal_lahir = '$tglLahir'
        WHERE id_siswa = '$nis'
    ");

    if ($q_daftar && mysqli_num_rows($q_daftar) > 0) {
        mysqli_query($mysqli, "UPDATE daftar SET id_divisi = '$id_divisi' WHERE nis_siswa = '$nis'");
    } else {
        mysqli_query($mysqli, "INSERT INTO daftar (nis_siswa, id_divisi, tanggal_daftar) VALUES ('$nis', '$id_divisi', NOW())");
    }

    header("Location: daftar.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    <link rel="stylesheet" href="form.css">
</head>

<body>
    <section class="container">
        <h1>Edit Siswa</h1>
        <form action="edit.php?id_siswa=<?= $siswa['id_siswa']; ?>" method="post" name="edit">
            <div class="form-group">
                <input type="hidden" value="<?= $siswa['id_siswa']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Nama Siswa: </label>
                <input type="text" name="nama" id="nama_siswa" value="<?= htmlspecialchars($siswa['nama_siswa']); ?>">
            </div>
            <div class="form-group">
                <label>Kelas: </label>
                <select name="kelas">
                    <option disabled value="">Pilih Kelas</option>
                    <?php while ($kelas = mysqli_fetch_assoc($res)): ?>
                        <option value="<?= $kelas['id_kelas']; ?>" <?= ($kelas['id_kelas'] == $siswa['id_kelas']) ? 'selected' : ''; ?>>
                            <?= $kelas['nama_kelas']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Divisi: </label>
                <select name="divisi">
                    <option disabled value="">Pilih Divisi</option>
                    <?php while ($div = mysqli_fetch_assoc($res_div)): ?>
                        <option value="<?= $div['id_divisi']; ?>" <?= ($div['id_divisi'] == $id_divisi_now) ? 'selected' : ''; ?>>
                            <?= $div['nama_divisi']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label>No. Telepon: </label>
                <input type="text" name="no-telp" id="no_telp" value="<?= $siswa['no_telepon']; ?>">
            </div>
            <div class="form-group">
                <label>Tanggal Lahir: </label>
                <input type="date" name="tgl-lahir" id="tgl_lahir" value="<?= $siswa['tanggal_lahir']; ?>">
            </div>

            <h2>Alamat</h2>
            <div class="form-alamat">
                <label for="kab">Kabupaten</label>
                <input type="text" name="kab" id="kab" value="<?= htmlspecialchars($siswa['kabupaten']); ?>">
            </div>
            <div class="form-alamat">
                <label for="kec">Kecamatan</label>
                <input type="text" name="kec" id="kec" value="<?= htmlspecialchars($siswa['kecamatan']); ?>">
            </div>
            <div class="form-alamat">
                <label for="kel">Kelurahan</label>
                <input type="text" name="kel" id="kel" value="<?= htmlspecialchars($siswa['kelurahan']); ?>">
            </div>
            <div class="form-alamat">
                <label for="rt-rw">RT/RW</label>
                <input type="text" name="rt-rw" id="rt-rw" value="<?= htmlspecialchars($siswa['rt_rw']); ?>">
            </div>
            <div class="form-button">
                <button type="submit" name="submit">Simpan</button>
                <a href="daftar.php" class="btn-secondary" onclick="return confirm('Yakin Mau Batal? Gak Usahlah.... Barang Siapa yang Menekan Tombol Batal. Maka Dia Tidak Akan Bisa Berubah.')">Batal</a>
            </div>
        </form>
    </section>
</body>

</html>


