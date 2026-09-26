<?php
include_once("config.php");
/** @var mysqli $mysqli */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include_once('header.php'); ?>
    <main>
        <section class="hero">
            <div class="content">
                <h1>Japanese Club</h1>
                <h2>SMK NEGERI 1 KATAPANG</h2>
                <div class="kutipan">
                    <p>Wadah berkreasi, bereksplorasi kebudaaan, serta memperdalam kemampuan berbahasa Jepang secara aktif, kreatif, dan berwawasan global.</p>
                </div>
                <a href="#profil" class="profil">Lihat Profil</a><a href="pendaftaran.php" class="daftar">Daftar Anggota</a>
            </div>
        </section>

        <!-- Section 1: Angkatan -->

        <section id="profil" class="container">
            <p class="hightlight"><span>NAMA ANGKATAN</span></p>
            <h2>Hoshi No Sora <span>(星の空)</span></h2>

            <div class="card grid pembina">
                <div class="gambar">
                    <img src="" alt="Foto Pembina">
                </div>
                <div class="informasi">
                    <p class="gelar"><span>Pembina / Guru B.Indonesia</span></p>
                    <h3>Iis Sari Mulyani, S.Pd.M.Pd</h3>
                    <hr>
                    <div class="pesan">
                        <p><i>"Bermain irama dan ketukan drum harus penuh tenaga, konsisten, dan tak pernah padam. Dalam tempo cepat maupun lambat, semangat dan jiwa harus tetap hidup, khususnya dalam menjaga ritme perjuangan agar tak kehilangan arah. Menjaga janji saya atas harapan para guru yang ada di pundak."</i></p>
                    </div>
                </div>
            </div>
        </section>

        <hr style="background:gray;">

        <!-- Section 2: KAICHO & FUKU KAICHOU -->
        <section class="container" id="KK">
            <h2>Ketua dan Wakil Ketua</h2>
            <div class="pemisah">
                <div class="card ketua padding">
                    <div class="gambar">
                        <img src="" alt="Foto Ketua">
                    </div>
                    <h4>Azka Tsuraya Fauziyah</h4>
                    <p>Ketua • XII RPL 2</p>
                </div>
                <div class="card wakil padding">
                    <div class="gambar">
                        <img src="" alt="Foto Wakil Ketua">
                    </div>
                    <h4>Sabrina Nurma Haffiza</h4>
                    <p>Wakil Ketua • XII PSPT 1</p>
                </div>
            </div>
        </section>

        <hr style="background:gray;">

        <!-- Section 3: Divisi -->
        <section class="container" id="divisi">
            <h2>Divisi Kegiatan</h2>
            <div class="seimbang">
                <div>
                    <div class="card hiasan">
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            <h3 style="color:orange; display:inline-block">Divisi Manga</h3>
                            <h4 class="japan">漫画</h4>
                        </div>
                        <p style="font-size: 22px; text-align: left;">Belajar dan Membuat Gambar Animasi Jepang dengan Genre yang Menarik.</p>
                    </div>
                    <div class="card hias">
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            <h3 style="color:orange; display:inline-block">Divisi Kaiwa</h3>
                            <h4 class="japan">会話</h4>
                        </div>
                        <p style="font-size: 22px; text-align: left;">Belajar Bahasa dengan Menguasai Aspek Berbicara, Mendengarkan, Membaca dan Mengucapkan Bahasa Jepang.</p>
                    </div>
                </div>
                <div class="gambar gambar2">
                    <img src="" alt="Foto Maskot">
                </div>
            </div>
        </section>

        <hr>

        <!-- Section 4: Kegiatan -->
        <section class="container" id="kegiatan">
            <h2>Kegiatan Ekstrakurikuler</h2>
            <div class="full">
                <div class="kaado satu">
                    <h4 style="color:salmon;">01</h4>
                    <h4 class="spacing atu">Belajar Bahasa Jepang</h4>
                    <p>Mempelajari tata bahasa, huruf (Hiragana, Katakana dan Kanji), serta melatih percakapan sehari-hari secara aktif dan menyenangkan</p>
                </div>
                <div class="kaado dua">
                    <h4 style="color:orange;">02</h4>
                    <h4 class="spacing ua">Makanan Jepang</h4>
                    <p>Seni seru mempraktikkan cara membuat hidangan populer khas Jepang secara langsung seperti membuat Takoyaki, Okonomiyaki dan Onigiri bersama anggota yang lain.</p>
                </div>
                <div class="kaado tiga">
                    <h4 style="color:lime;">03</h4>
                    <h4 class="spacing iga">Kebudayaan Jepang</h4>
                    <p>Mengenal lebih dalam kebudaaan Jepang lewat aktivitas bermain permainan tradisional Jepang dan merasakan pengelaman menggunakan baju tradisional Jepang.</p>
                </div>
                <div class="kaado empat">
                    <h4 style="color:lightseagreen;">04</h4>
                    <h4 class="spacing pat">Japan Time</h4>
                    <p>Ruang santa apresiasi seni dengan menyampaikan berbagai lagu hits dalam bahasa Jepang(J-Pop/Ani-Song)  #profilbersama untuk mengasah pelafalan berbahasa secara rileks.</p>
                </div>
            </div>
        </section>

        <section class="container">
            <a href="https://www.instagram.com/nikeiclub_smkn1katapang" target="_blank" class="link-ig" rel="noopener noreferrer"><span><img src="Aset/logoIg.png" alt="Log Instagram" width="40px"></span> Kunjungi Instagram @nikeiclub_smkn1katapang</a>
        </section>
    </main>
    <footer>
        <h4>&copy; 2026 Kelompok 3 - SMKN 1 Katapang. </h4>
    </footer>
   
</body>
</html>