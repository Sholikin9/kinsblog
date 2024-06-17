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
        <title>KINS BLOG | Baca Artikel</title>
        <!-- Favicon-->
        <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link rel="icon" type="image/x-icon" href="assets/xing-squar2.svg">
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
        <!-- <nav class="navbar navbar-expand-lg " style="background-color: #e3f2fd;"> -->
            <div class="container">
                <!-- <a class="navbar-brand" href="http://localhost/prowbs/prowblog/">KINS BLOG</a> -->
                <a class="navbar-brand d-flex align-items-center fs-4 fw-bold sidebar-brand-text mx-3" href="index.php"> <i class="fab fa-xing-square" style="font-size: 1.5em; transform: rotate(-15deg);"></i>
                 &nbsp KINS BLOG</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item hover"><a class="nav-link" href="index.php">Beranda</a></li>
                        <li class="nav-item hover"><a class="nav-link" href="admin/login.php">Login</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="http://localhost/prowbs/prowblog/">Beranda</a></li> -->
                        <li class="nav-item hover"><a class="nav-link" href="#tentang">Tentang</a></li>
                        <li class="nav-item hover"><a class="nav-link" href="#kontak">Kontak</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <?php 
                        $data_id_kontributor = $_GET['id_kontributor'];
                        $data_id_kategori = $_GET['id_kategori'];
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
                                WHERE k.id_kontributor='$data_id_kontributor' && k.id_kategori='$data_id_kategori'";
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
                         ?>
                        <!-- Post header-->
                        <header class=" bg-light border-bottom mb-4">
                            <div class="container">
                                <div class="text-center my-2">        
                                    <header class="mb-4">
                                        <!-- Post title-->
                                        <h1 class="fw-bolder mb-1"><?php echo $data_judul; ?></h1>
                                        <!-- Post meta content-->
                                        <div class="text-muted fst-italic mb-2">Diposting pada <?php echo $data_tanggal; ?> oleh <?php echo $data_penulis; ?></div>
                                        <!-- Post categories-->
                                        <a class="badge bg-primary border border-primary text-decoration-none link-light" href="kategori.php?id_kategori=<?php echo $data_id_kategori; ?>"><?php echo $data_kategori; ?></a>
                                    </header>
                                </div>
                            </div>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img style="width: 100%; height: auto;" class="img-fluid rounded" src="admin/<?php echo $data_gambar; ?>" alt="..." /></figure>
                        <!-- Post content-->
                        <section id="isi" class="mb-5">
                            <?php echo $data_isi; ?>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-outline-info" onclick="history.back()">Kembali</button>
                            </div>
                        </section>
                        <?php 
                                }
                            } else {
                                }
                        ?>
                    </article>
                    <!-- Comments section-->
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div id="tentang" class="card-header">Artikel Terkait</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="list-group">
                                        <?php 
                                            $data_id_kontributor = $_GET['id_kontributor'];
                                            $data_id_kategori = $_GET['id_kategori'];
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
                                                WHERE k.id_kategori='$data_id_kategori' && 
                                                k.id_kontributor!='$data_id_kontributor'
                                                -- k.id_kontributor<'$data_id_kontributor' =Psyauqi
                                                ORDER BY k.id_kontributor DESC";
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
                                            ?>
                                        <a href="detail.php?id_kontributor=<?php echo $data_id_kontributor; ?>&id_kategori=<?php echo $data_id_kategori; ?>" class="list-group-item list-group-item-action"><?php echo $data_judul; ?></a>
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
