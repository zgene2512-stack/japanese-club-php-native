<?php
include 'config.php';
/** @var mysqli $mysqli */

$query = "SELECT siswa.id_siswa, siswa.nama_siswa, kelas.nama_kelas, divisi.nama_divisi, siswa.no_telepon ,siswa.tanggal_lahir, daftar.tanggal_daftar FROM siswa LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas LEFT JOIN alamat ON alamat.id_alamat = siswa.id_alamat LEFT JOIN daftar ON daftar.nis_siswa = siswa.id_siswa LEFT JOIN divisi ON daftar.id_divisi = divisi.id_divisi ORDER BY kelas.nama_kelas ASC";
$res = mysqli_query($mysqli, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php' ?>
    <main>
        <section class="container">
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No</th> <th>Nama Siswa</th> <th>Kelas</th> <th>Divisi</th> <th>No.Telepon</th> <th>Tanggal Lahir</th>
                            <?php if(isset($_SESSION['login']) === true): ?>
                                <th>Tanggal Daftar</th> <th class="actions-cell">Edit</th> <th class="actions-cell">Hapus</th>
                                <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if (mysqli_num_rows($res) > 0):
                        
                            $no = 1;
                            
                            while ($daftar = mysqli_fetch_assoc($res)):
                                
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo htmlspecialchars($daftar['nama_siswa']) ?></td>
                                <td><?php echo htmlspecialchars($daftar['nama_kelas']) ?></td>
                                <td><?php echo htmlspecialchars($daftar['nama_divisi']) ?></td>
                                <td><?php echo htmlspecialchars($daftar['no_telepon']) ?></td>
                                <td><?php echo htmlspecialchars($daftar['tanggal_lahir']) ?></td>
                                <?php if(isset($_SESSION['login']) === true): ?>
                                <td><?php echo htmlspecialchars($daftar['tanggal_daftar']) ?></td>
                                <td class="actions-cell"><a href="edit.php?id_siswa=<?= $daftar['id_siswa'] ?>" class="btn-action btn-edit">Edit</a></td>
                                <td class="actions-cell"><a href="hapus.php?id_siswa=<?= $daftar['id_siswa'] ?>" class="btn-action btn-hapus" onclick="return confirm('Yakin mau hapus?')">Hapus</a></td>
                                <?php endif; ?>
                            </tr>
                            <?php 
                                endwhile;
                            endif;
                            ?>
                    </tbody>
                </table>
                </div>
        </section>
    </main>
    <script>
        const menu = document.getElementById("menu");
        const menuNav = document.getElementById("menuNav");
        const navigasi = document.getElementById("navigasi");
        const ketua = document.getElementById("ketua");
        const infoKet = document.getElementById("ket");
        const wakil = document.getElementById("wakil");
        const infoWak = document.getElementById("wak");

        menu.addEventListener("click", () => {
            menu.classList.add("hidden");
            navigasi.classList.remove("hidden");
        });

        menuNav.addEventListener("click", () => {
            menu.classList.remove("hidden");
            navigasi.classList.add("hidden");
        })

        ketua.addEventListener("click", () => {
            infoKet.classList.toggle("hidden");
        })

        wakil.addEventListener("click", () => {
            infoWak.classList.toggle("hidden");
        })
    </script>
</body>
</html>