<?php 
require 'admin/function.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>KINS BLOG | Kategori</title>
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/x-icon" href="assets/xing-squar2.svg">
    <link href="css/styles.css" type="text/css" rel="stylesheet" />
    <style type="text/css">
        .tentang {
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
    </style>
</head>
<body>
    <!-- Responsive navbar-->
    <nav class="navbar hover navbar-expand-lg navbar-dark" style="background-color: #3399ff;">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fs-4 fw-bold sidebar-brand-text mx-3" href="index.php">
                <i class="fab fa-xing-square" style="font-size: 1.5em; transform: rotate(-15deg);"></i>
                &nbsp KINS BLOG
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
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
    <header class="bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <?php           
                        // Dapatkan ID kategori dari permintaan GET
                        $id_kategori_terpilih = $_GET['id_kategori'];

                        // Dapatkan kata kunci pencarian jika ada
                        $search_keyword = isset($_GET['search']) ? $_GET['search'] : '';

                        // Dapatkan informasi kategori
                        $category_info = getCategoryInfo($conn, $id_kategori_terpilih);
                        if ($category_info) {
                            $data_nama = $category_info['nm_kategori'];
                            $data_keterangan = $category_info['keterangan'];
                        } else {
                            header("Location: kategori.php");
                            exit;
                        }

                        // Dapatkan artikel berdasarkan kategori dan kata kunci pencarian
                        $articles = getArticlesByCategoryAndSearch($conn, $id_kategori_terpilih, $search_keyword);

                        // Dapatkan semua kategori
                        $all_categories = getAllCategories($conn);
                    ?>
                <h1 class="fw-bolder">Selamat datang di KinsBlog</h1>
                <p class="lead mb-0">Saatnya Berbagi Inspirasi dan Wawasan di Kins Blog!<br><br></p>
                <h4 class="fw-bold">Menampilkan artikel dengan kategori: <?php echo $data_nama; ?></h4>
            </div>
        </div>
    </header>

    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <?php 
                if ($articles->num_rows > 0) {
                    while($row = $articles->fetch_assoc()) {
                        $data_tanggal = $row['tanggal'];
                        $data_judul = $row['judul'];
                        $data_gambar = $row['gambar'];
                        $data_id_kontributor = $row['id_kontributor'];
                        $data_id_kategori = $row['id_kategori'];
                        $data_isi = $row['isi'];
                        $data_potongan_artikel = potong_kalimat($data_isi, 260);
                ?>
                <div class="card mb-4">
                    <a href="detail.php?id_kontributor=<?php echo $data_id_kontributor; ?>&id_kategori=<?php echo $data_id_kategori; ?>"><img class="card-img-top" src="admin/<?php echo $data_gambar; ?>" alt="..." /></a>
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
                    ?>
                        <p style="text-align: center;" ><b>Tidak ada hasil yang ditemukan untuk pencarian "<?php echo $search_keyword ?>" pada kategori: <?php echo $data_nama; ?>.</b></p>
                        <?php
                }
                ?>
            </div>

            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header"><b>Pencarian pada kategori ini</b></div>
                    <div class="card-body">
                        <form action="kategori.php" method="get">
                            <div class="input-group">
                                <input type="hidden" name="id_kategori" value="<?php echo $id_kategori_terpilih; ?>">
                                <input class="form-control" type="text" name="search" placeholder="Apa yang ingin anda cari?..." value="<?php echo htmlspecialchars($search_keyword); ?>" aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-outline-primary" id="button-search" type="submit">Go!</button>
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
                                    if (mysqli_num_rows($all_categories) > 0) {
                                        while($row = mysqli_fetch_assoc($all_categories)) {
                                            $data_id_kategori = $row['id_kategori'];
                                            $data_nama = $row['nm_kategori'];
                                    ?>
                                    <a href="kategori.php?id_kategori=<?php echo $data_id_kategori; ?>" class="list-group-item list-group-item-action"><?php echo $data_nama; ?></a>
                                    <?php 
                                        }
                                    } else {
                                        echo "<p>No categories found.</p>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side widget-->
                <div class="card mb-4">
                    <div id="tentang" class="card-header"><b>Tentang Kategori</b></div>
                    <div class="card-body tentang">
                        <?php echo $data_keterangan; ?>
                    </div>
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
