<?php
session_start();
include 'config.php';
?>

<header>
    <div class="nav hidden" id="navigasi">
        <p class="menu-nav" id="menuNav">&#9776;</p>
        <h3>Menu Utama</h3>
        <div class="nav-main">
            <?php
            if (isset($_SESSION['login']) === false):
                ?>
                <a href="pendaftaran.php">Form Pendaftaran</a>
            <?php else: ?>
                <a href="add.php">Tambah Anggota</a>
            <?php endif; ?>
            <a href="index.php">Beranda</a>
            <a href="daftar.php">Daftar Anggota</a>
        </div>
        <div class="nav-bottom">
            <?php if (isset($_SESSION['login']) === false): ?>
                <a href="login.php">Admin</a>
            <?php endif; ?>
            <?php if (isset($_SESSION['login']) === true): ?>
                <a href="logout.php">Logout</a>
            <?php endif; ?>
        </div>
    </div>
    <nav>
        <p class="menu" id="menu">&#9776;</p>
        <div class="judul">
            <p class="font-Japan">日本語のクラブ</p>
            <p class="translate">NikeiClub</p>
        </div>
    </nav>
    <hr style="background-color: balck;">
</header>

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