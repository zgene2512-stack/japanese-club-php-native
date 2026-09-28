<?php
 session_start();
 include 'config.php';
 /** @var mysqli $mysqli  */

//  if (!isset($_SESSION['login'])) {
//     header("Location: login.php");
//     exit(0);
//  }

 $query = "SELECT daftar.id_pendaftaran, siswa.nama_siswa, kelas.nama_kelas, divisi.nama_divisi, daftar.tanggal_daftar FROM daftar JOIN siswa ON daftar.id_siswa = siswa.id_siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas JOIN divisi ON daftar.id_divisi = divisi.id_divisi WHERE daftar.status='pending' ORDER BY kelas.nama_kelas ASC";
 $res = mysqli_query($mysqli, $query);

 if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($mysqli, $_GET['id']);
    if(isset($_GET['status']) && $_GET['status'] === 'diterima') {
        $status = mysqli_real_escape_string($mysqli, $_GET['status']);
        mysqli_query($mysqli, "UPDATE daftar SET status='$status' WHERE id_pendaftaran='$id'");
        header("Location: manajemen.php?keterangan=berhasil");
        exit(0);
    }
    if(isset($_GET['status']) && $_GET['status'] === 'ditolak') {
        $status = mysqli_real_escape_string($mysqli, $_GET['status']);
        mysqli_query($mysqli, "UPDATE daftar SET status='$status' WHERE id_pendaftaran='$id'");
        header("Location: hapus.php?id_siswa='$id'");
        header("Location: manajemen.php?keterangan=berhasil");
        exit(0);
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pendaftaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <section class="table-responsive">
            <h1 style="text-align: center; margin-bottom: 25px; border-bottom: 3px solid gray;">Permintaan Mendaftar</h1>
            <table>
                <thead>
                    <th>Tanggal</th> <th>Nama</th> <th>Kelas</th> <th>Divisi</th> <th>Terima</th> <th>Tolak</th>
                </thead>
                <tbody>
                    <?php 
                    if (mysqli_num_rows($res) > 0):
                        while ($data = mysqli_fetch_assoc($res)):
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($data['tanggal_daftar'])?></td>
                        <td><?php echo htmlspecialchars($data['nama_siswa'])?></td>
                        <td><?php echo htmlspecialchars($data['nama_kelas'])?></td>
                        <td><?php echo htmlspecialchars($data['nama_divisi'])?></td>
                        <td><a href="manajemen.php?id=<?php echo $data['id_pendaftaran'] ?>&status=diterima" class="btn-action btn-edit">Accept</a></td>
                        <td><a href="manajemen.php?id=<?php echo $data['id_pendaftaran'] ?>&status=ditolak" class="btn-action btn-hapus">Reject</a></td>
                    </tr>
                    <?php endwhile;
                    endif; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>