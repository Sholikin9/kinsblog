<?php 
require 'admin/function.php';
$query = isset($_GET['q']) ? $_GET['q'] : '';
$is_search = !empty($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>KINS BLOG | Beranda</title>
    <!-- Favicon-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/x-icon" href="assets/xing-squar2.svg">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <style type="text/css">
        .tentang{
            text-align: justify;
        }
        .nav-item.hover .nav-link:hover {
            font-size: 1.2em;
            font-weight: bold;
            color: #ffffff;
        }
        .navbar-nav .nav-link {
            color: white;
        }
        .fixed-image {
            width: 100%; /* Atur lebar gambar agar memenuhi lebar card */
            height: 200px; /* Atur tinggi gambar sesuai yang diinginkan */
            object-fit: cover; /* Agar gambar diatur untuk mengisi ruang tanpa merusak aspek rasio */
        }
    </style>
</head>
<body>
    <!-- Responsive navbar-->
    <nav class="navbar hover navbar-expand-lg navbar-dark" style="background-color: #3399ff;">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fs-4 fw-bold sidebar-brand-text mx-3" href="index.php">
                <i class="fab fa-xing-square" style="font-size: 1.5em; transform: rotate(-15deg);"></i>
                &nbsp;KINS BLOG
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item hover"><a class="nav-link" href="index.php">Beranda</a></li>
                    <li class="nav-item hover"><a class="nav-link" href="admin/login.php">Login</a></li>
                    <li class="nav-item hover"><a class="nav-link" href="#tentang">Tentang</a></li>
                    <li class="nav-item hover"><a class="nav-link" href="#kontak">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Selamat datang di KinsBlog</h1>
                <p class="lead mb-0">Saatnya Berbagi Inspirasi dan Wawasan di Kins Blog!</p>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <?php if (!$is_search): ?>
                <?php 
                $sql = "SELECT
                    k.id_kontributor,
                    k.id_kategori,
                    a.tanggal,
                    a.judul,
                    a.isi,
                    p.username,
                    c.nm_kategori,
                    c.id_kategori,
                    a.gambar
                    FROM kontributor AS k
                    JOIN artikel AS a ON k.id_artikel = a.id_artikel
                    JOIN penulis AS p ON k.id_penulis = p.id_penulis
                    JOIN kategori AS c ON k.id_kategori = c.id_kategori
                    ORDER BY id_kontributor DESC LIMIT 1";
                $result = $conn->query($sql);
                $nomortbl = 0;
                    if ($result->num_rows > 0) {
                        // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $nomortbl ++;
                        $data_tanggal = $row['tanggal'];
                        $data_judul = $row['judul'];
                        $data_kategori = $row['nm_kategori'];
                        $data_id_kategori = $row['id_kategori'];
                        $data_penulis = $row['username'];
                        $data_gambar = $row['gambar'];
                        $data_id_kontributor = $row['id_kontributor'];
                        $data_idkategori = $row['id_kategori'];
                        $data_isi = $row['isi'];
                        $data_potongan_artikel = potong_kalimat($data_isi, 260);
                 ?>
                <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="admin/<?php echo $data_gambar; ?>" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted"><?php echo $data_tanggal; ?></div>
                        <h2 class="card-title"><?php echo $data_judul; ?></h2>
                        <p class="card-text"><?php echo $data_potongan_artikel; ?></p>
                        <div class="d-flex justify-content-end">
                        <a class="btn btn-outline-primary" href="detail.php?id_kontributor=<?php echo $data_id_kontributor; ?>&id_kategori=<?php echo $data_id_kategori; ?>">Baca Artikel→</a>
                        </div>
                    </div>
                </div>
                <?php 
                    }
                } else {
                    }
                ?>
                <?php endif; ?>
                <!-- Nested row for non-featured blog posts-->
                <div class="row" id="results">
                <?php
                if ($is_search) {
                    $result_search = searchArticles($conn, $query);
                    if (mysqli_num_rows($result_search) > 0) { ?>
                        <p style="text-align: center;" ><b>Menampilkan hasil pencarian untuk "<?php echo $query;?>".</u></b></p>
                        <?php
                        while($row = mysqli_fetch_assoc($result_search)){
                            $data_tanggal = $row['tanggal'];
                            $data_judul = $row['judul'];
                            $data_kategori = $row['nm_kategori'];
                            $data_id_kategori = $row['id_kategori'];
                            $data_penulis = $row['username'];
                            $data_gambar = $row['gambar'];
                            $data_id_kontributor = $row['id_kontributor'];
                            $data_idkategori = $row['id_kategori'];
                            $data_isi = $row['isi'];
                            $data_potongan_artikel = potong_kalimat($data_isi, 200);
                ?>
                    <div class="col-lg-6">
                        <!-- Blog post-->
                        <div class="card mb-4">
                            <a href="#!"><img class="card-img-top fixed-image" src="admin/<?php echo $data_gambar; ?>" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted"><?php echo $data_tanggal; ?></div>
                                <h2 class="card-title h4"><?php echo $data_judul; ?></h2>
                                <p class="card-text"><?php echo $data_potongan_artikel; ?></p>
                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-outline-primary" href="detail.php?id_kontributor=<?php echo $data_id_kontributor; ?>&id_kategori=<?php echo $data_id_kategori; ?>">Baca Artikel→</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php 
                        }
                    } else {
                        ?>
                        <p style="text-align: center;" ><b>Tidak ada hasil yang ditemukan untuk pencarian "<?php echo $query;?>".</b></p>
                        <?php
                    }
                } else {
                    $sql = "SELECT
                            kontributor.id_kontributor,
                            kontributor.id_kategori,
                            artikel.tanggal,
                            artikel.judul,
                            artikel.isi,
                            penulis.username,
                            kategori.nm_kategori,
                            kategori.id_kategori,
                            artikel.gambar
                            FROM kontributor
                            JOIN artikel ON kontributor.id_artikel = artikel.id_artikel
                            JOIN penulis ON kontributor.id_penulis = penulis.id_penulis
                            JOIN kategori ON kontributor.id_kategori = kategori.id_kategori
                            WHERE kontributor.id_kontributor < (SELECT MAX(kontributor.id_kontributor) FROM kontributor)
                            ORDER BY kontributor.id_kontributor DESC";
                    $result = $conn->query($sql);
                    $nomortbl = 0;
                        if ($result->num_rows > 0) {
                            // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $nomortbl ++;
                            $data_tanggal = $row['tanggal'];
                            $data_judul = $row['judul'];
                            $data_kategori = $row['nm_kategori'];
                            $data_id_kategori = $row['id_kategori'];
                            $data_penulis = $row['username'];
                            $data_gambar = $row['gambar'];
                            $data_id_kontributor = $row['id_kontributor'];
                            $data_idkategori = $row['id_kategori'];
                            $data_isi = $row['isi'];
                            $data_potongan_artikel = potong_kalimat($data_isi, 200);
                ?>
                    <div class="col-lg-6">
                        <!-- Blog post-->
                        <div class="card mb-4">
                            <a href="#!"><img class="card-img-top fixed-image" src="admin/<?php echo $data_gambar; ?>" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted"><?php echo $data_tanggal; ?></div>
                                <h2 class="card-title h4"><?php echo $data_judul; ?></h2>
                                <p class="card-text"><?php echo $data_potongan_artikel; ?></p>
                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-outline-primary" href="detail.php?id_kontributor=<?php echo $data_id_kontributor; ?>&id_kategori=<?php echo $data_id_kategori; ?>">Baca Artikel→</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php 
                        }
                    } else {
                        }
                }
                ?>
                </div>

                <!-- Pagination-->
                <nav aria-label="Pagination">
                    <ul class="pagination justify-content-center my-4">
                        <li class="page-item"><a class="btn btn-outline-primary" href="index.php">← Lihat Lebih Sedikit</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header"><b>Pencarian</b></div>
                    <div class="card-body">
                        <form action="index.php" method="GET">
                            <div class="input-group">
                                <input class="form-control" name="q" id="search-input" type="text" placeholder="Apa yang ingin anda cari ?..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-outline-info" id="button-search" type="submit">Go!</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header"><b>Kategori</b></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="list-group">
                                <?php 
                                    $sql = "SELECT * FROM kategori ORDER BY id_kategori DESC";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        $nmrtbl = 0;
                                          // output data of each row
                                        while($row = mysqli_fetch_assoc($result)) {
                                        $nmrtbl++;
                                        $data_id_kategori = $row['id_kategori'];
                                        $data_nama = $row['nm_kategori'];
                                        $data_keterangan = $row['keterangan'];
                                ?>
                                    <a href="kategori.php?id_kategori=<?php echo $data_id_kategori; ?>" class="list-group-item list-group-item-action"><?php echo $data_nama; ?></a>

                                <?php 
                                        }
                                     } else {
                                        }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Side widget-->
                <div class="card mb-4">
                    <div id="tentang" class="card-header tentang"><b>Tentang</b></div>
                    <div class="card-body tentang">Selamat datang di Kins Blog! Kami adalah komunitas online yang bersemangat untuk berbagi inspirasi, wawasan, dan pengetahuan. Di sini, kami menawarkan beragam topik yang menginspirasi, mulai dari, teknologi, pendidikan, hiburan, wisata dan banyak lagi, yang pastinya akan menarik minat Anda. Kami percaya bahwa setiap cerita memiliki nilai, dan kami berkomitmen untuk menyajikan konten yang bermanfaat, positif, dan menghibur.</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="py-3" style="background-color: #3399ff;">
        <div id="kontak" class="container"><p class="m-0 text-center text-white">Copyright &copy; Kins Blog 2024</p></div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
</html>
