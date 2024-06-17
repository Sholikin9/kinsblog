<?php 
require 'function.php';
require 'ceksession.php';
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kins Blog | Artikel</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/x-icon" href="../assets/xing-squarmain.svg">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- ck editor -->
    <style type="text/css">
    .ck-editor__editable[role="textbox"] {
                /* Editing area */
                min-height: 350px;
            }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fab fa-xing-square"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Kins Blog</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item :hover">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="artikel.php">
                    <i class="bi bi-newspaper"></i>
                    <span>Artikel</span></a>
            </li>
            <li class="nav-item :hover">
                <a class="nav-link" href="kategori.php">
                    <i class="bi bi-bookmarks"></i>
                    <span>Kategori</span></a>
            </li>
            <li class="nav-item :hover">
                <a class="nav-link" href="penulis.php">
                    <i class="bi bi-person-square"></i>
                    <span>Penulis</span></a>
            </li>
            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <div class="d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-title">
                        <h1 class="h3 mb-0 text-gray-800">Artikel</h1>
                    </div><!-- 
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>-->
                    
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        
<!-- 
                        <div class="topbar-divider d-none d-sm-block"></div> -->

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo "Anda Login sebagai ".$_SESSION["username"]; ?>
                                    </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <!-- <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                <div class="container-fluid">
                    <div class=container>
                        Silahkan kelola artikel<br><br>
                    </div>

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>
 -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                                <button class="btn btn-primary" name="btn_artikel_baru" id="btn_artikel_baru"
                                data-bs-toggle="modal" data-bs-target="#modalFormArtikel">
                                <i class="bi bi-newspaper"></i> &nbsp Tambah Artikel</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <!-- <table class="table table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0"> -->
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Penulis</th>
                                            <th>Gambar</th>
                                            <th style="width: 15%;">Aksi</th> <!-- Menetapkan lebar relatif -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $sql = "SELECT
                                                    k.id_kontributor,
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
                                                ORDER BY id_kontributor DESC";
                                        $result = $conn->query($sql);
                                        $nomortbl = 0;
                                        if ($result->num_rows > 0) {
                                          // output data of each row
                                          while($row = $result->fetch_assoc()) {
                                            $nomortbl ++;
                                            $data_tanggal = $row['tanggal'];
                                            $data_judul = $row['judul'];
                                            $data_kategori = $row['nm_kategori'];
                                            $data_penulis = $row['username'];
                                            $data_gambar = $row['gambar'];
                                            $data_id_kontributor = $row['id_kontributor'];
                                            $data_idkategori = $row['id_kategori'];
                                            $data_isi = $row['isi'];
                                        ?>
                                        <tr>
                                            <td><?php echo $nomortbl; ?></td>
                                            <td><?php echo $data_tanggal; ?></td>
                                            <td><?php echo $data_judul; ?></td>
                                            <td><?php echo $data_kategori; ?></td>
                                            <td><?php echo $data_penulis; ?></td>
                                            <td><?php echo $data_gambar; ?></td>
                                            <td>
                                            <button class="btn btn-info btn-sm" name="btn_ubah" data-bs-toggle="modal" data-bs-target="#modalUbahArtikel<?php echo $data_id_kontributor; ?>">Ubah</button>
                                            <button class="btn btn-danger btn-sm" name="btn_hapus" data-bs-toggle="modal" data-bs-target="#modalHapusArtikel<?php echo $data_id_kontributor; ?>">Hapus</button>
                                            </td>
                                        </tr>
                                        <!-- Modal Hapus Artikl-->
                                            <div class="modal fade" id="modalHapusArtikel<?php echo $data_id_kontributor; ?>" data-bs-backdrop="static">
                                              <div class="modal-dialog">
                                                <div class="modal-content">

                                                  <!-- Modal Header -->
                                                  <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Artikel?</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                  </div>

                                                  <!-- Modal body -->
                                                  <form method="POST">
                                                    <div class="modal-body mb-1">
                                                        Apakah anda yakin menghapus artikel dengan judul : <?php echo "<b>".$data_judul."</b> ?"; ?>
                                                        <div class="mb-1 mt-3 d-flex justify-content-end gap-2">
                                                          <button class="btn btn-danger" name="btn_hapus_artikel">Hapus</button>
                                                            <input type="hidden" name="id_hapus_artikel" value="<?php echo $data_id_kontributor; ?>">
                                                          <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        </div>
                                                     </div>
                                                  </form>      
                                                <!-- modal hapus footr  -->                             
                                                </div>
                                              </div>
                                            </div>

                                        <!-- Modal Form Ubah Artikel -->
                                            <div class="modal fade" id="modalUbahArtikel<?php echo $data_id_kontributor; ?>" data-bs-backdrop="static">
                                              <div class="modal-dialog modal-xl">
                                                <div class="modal-content">

                                                  <!-- Modal Header -->
                                                  <div class="modal-header">
                                                    <h4 class="modal-title">Ubah Artikel</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                  </div>

                                                  <!-- Modal Form Ubah Artikel -->
                                                  <div class="modal-body">
                                                     <form method="POST" enctype="multipart/form-data">
                                                        
                                                      <div class="mb-3 mt-3">
                                                        <label for="tanggal" class="form-label">Tanggal :</label>
                                                        <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?php echo $data_tanggal; ?>" readonly>
                                                      </div>
                                                      <div class="mb-3 mt-3">
                                                        <label for="judul" class="form-label">Judul:</label>
                                                        <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $data_judul ?>">
                                                      </div>
                                                      <div class="mb-3 mt-3">
                                                        <label for="kategori" class="form-label">Kategori:</label>
                                                            <select class="form-select" id="kategori" name="kategori">
                                                                <?php 
                                                                    $sql_kategori = "SELECT id_kategori, nm_kategori FROM kategori";
                                                                    $hasil = mysqli_query($conn, $sql_kategori);

                                                                    if (mysqli_num_rows($hasil) > 0) {
                                                                      // output data of each row
                                                                      while($row = mysqli_fetch_assoc($hasil)) {
                                                                        $data_id_kategori = $row['id_kategori'];
                                                                        $data_nm_kategori = $row['nm_kategori'];
                                                                ?>
                                                                    <option value="<?php echo $data_id_kategori; ?>"><?php echo $data_nm_kategori; ?></option>  
                                                                <?php 
                                                                      }
                                                                    } else {
                                                                      echo "0 results";
                                                                    }
                                                                ?>
                                                                <option value="<?php echo $data_idkategori; ?>" selected><?php echo $data_kategori; ?></option>
                                                            </select>
                                                      </div>
                                                      <div class="mb-3 mt-3">
                                                           <label for="isi">Isi Artikel :</label>
                                                           <textarea class="form-control" rows="5" id="ubah_isi" name="isi"><?php echo $data_isi ?></textarea> 
                                                      </div>
                                                      <div class="mb-3 mt-3">
                                                          <label for="gambar" class="form-label">Gambar</label>
                                                          <input class="form-control" type="file" id="gambar" name="gambar">
                                                      </div>
                                                      <div>
                                                          <input type="hidden" name="id_kontributor_ubah" value="<?php echo $data_id_kontributor; ?>">
                                                      </div>
                                                      <div class="mb-3 mt-3 d-flex justify-content-end gap-2">
                                                        <button class="btn btn-secondary" data-bs-dismiss="modal" >Batal</button>
                                                        <button type="submit" class="btn btn-primary" name="btn_ubah_artikel">Ubah</button>
                                                      </div>
                                                    </form> 
                                                  </div>

                                                  <!-- Modal footer -->

                                                </div>
                                              </div>
                                            </div>

                                        <?php
                                            
                                          }
                                        } else {
                                          echo "0 results";
                                        }
                                         ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
              
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Kins Blog 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logot.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <!-- import cdn ck editor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/super-build/ckeditor.js"></script>

    <!-- Modal Form Simpan Artikel -->
    <div class="modal fade" id="modalFormArtikel" data-bs-backdrop="static">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Tambah Artikel</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal Form Artikel -->
          <div class="modal-body">
             <form method="POST" enctype="multipart/form-data">
                <?php 
                date_default_timezone_set('Asia/Jakarta');
                    $hari = date("l");
                    $hariId = hariIndnisia($hari);
                    $tahun = date("Y");
                    $bulan = date("m");
                    $nama_bulan = namaBulan($bulan);
                    $tanggal = date("d");
                    $tanggal_lengkap = $tanggal . " " . $nama_bulan . " " . $tahun;
                    $hari_tanggal = $hariId .", ".$tanggal_lengkap;
                    $waktu = date("H:i");
                    $hari_tanggal_waktu = $hari_tanggal ." | ". $waktu;
                 ?>
              <div class="mb-3 mt-3">
                <label for="tanggal" class="form-label">Tanggal :</label>
                <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?php echo $hari_tanggal_waktu; ?>" readonly>
              </div>
              <div class="mb-3 mt-3">
                <label for="judul" class="form-label">Judul:</label>
                <input type="text" class="form-control" id="judul" name="judul">
              </div>
              <div class="mb-3 mt-3">
                <label for="kategori" class="form-label">Kategori:</label>
                    <select class="form-select" id="kategori" name="kategori">
                        <?php 
                            $sql = "SELECT id_kategori, nm_kategori FROM kategori";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                              // output data of each row
                              while($row = mysqli_fetch_assoc($result)) {
                                $data_id_kategori = $row['id_kategori'];
                                $data_nm_kategori = $row['nm_kategori'];
                        ?>
                            <option value="<?php echo $data_id_kategori; ?>"><?php echo $data_nm_kategori; ?></option>  
                        <?php 
                              }
                            } else {
                              echo "0 results";
                            }
                        ?>
                    </select>
              </div>
              <div class="mb-3 mt-3">
                   <label for="isi">Isi Artikel :</label>
                   <textarea class="form-control" rows="5" id="isi" name="isi"></textarea> 
              </div>
              <div class="mb-3 mt-3">
                  <label for="gambar" class="form-label">Gambar</label>
                  <input class="form-control" type="file" id="gambar" name="gambar">
              </div>

              <div class="mb-3 mt-3 d-flex justify-content-end gap-2">
                <button class="btn btn-secondary" data-bs-dismiss="modal" >Batal</button>
                <button type="submit" class="btn btn-primary" name="btn_simpan">Submit</button>
              </div>
            </form> 
          </div>

          <!-- Modal footer -->

        </div>
      </div>
    </div>



    <!-- ck editor simpan artikl -->
    <script>
            // This sample still does not showcase all CKEditor&nbsp;5 features (!)
            // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
            CKEDITOR.ClassicEditor.create(document.getElementById("isi"), {
                // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                toolbar: {
                    items: [
                        'exportPDF','exportWord', '|',
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                        'textPartLanguage', '|',
                        'sourceEditing'
                    ],
                    shouldNotGroupWhenFull: true
                },
                // Changing the language of the interface requires loading the language file using the <script> tag.
                // language: 'es',
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                    ]
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                placeholder: 'Silahkan tulis artikel disini....',
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                fontSize: {
                    options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                    supportAllValues: true
                },
                // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                htmlSupport: {
                    allow: [
                        {
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        }
                    ]
                },
                // Be careful with enabling previews
                // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                htmlEmbed: {
                    showPreviews: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                mention: {
                    feeds: [
                        {
                            marker: '@',
                            feed: [
                                '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                                '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                                '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                                '@sugar', '@sweet', '@topping', '@wafer'
                            ],
                            minimumCharacters: 1
                        }
                    ]
                },
                // The "superbuild" contains more premium features that require additional configuration, disable them below.
                // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                removePlugins: [
                    // These two are commercial, but you can try them out without registering to a trial.
                    // 'ExportPdf',
                    // 'ExportWord',
                    'AIAssistant',
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                    // Storing images as Base64 is usually a very bad idea.
                    // Replace it on production website with other solutions:
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                    // 'Base64UploadAdapter',
                    'MultiLevelList',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                    // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                    'MathType',
                    // The following features are part of the Productivity Pack and require additional license.
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents',
                    'PasteFromOfficeEnhanced',
                    'CaseChange'
                ]
            });
    </script>

        <!-- ck editor ubah artikl-->
    <script>
            // This sample still does not showcase all CKEditor&nbsp;5 features (!)
            // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
            CKEDITOR.ClassicEditor.create(document.getElementById("ubah_isi"), {
                // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                toolbar: {
                    items: [
                        'exportPDF','exportWord', '|',
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                        'textPartLanguage', '|',
                        'sourceEditing'
                    ],
                    shouldNotGroupWhenFull: true
                },
                // Changing the language of the interface requires loading the language file using the <script> tag.
                // language: 'es',
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                    ]
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                placeholder: 'Silahkan tulis artikel disini....',
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                fontSize: {
                    options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                    supportAllValues: true
                },
                // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                htmlSupport: {
                    allow: [
                        {
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        }
                    ]
                },
                // Be careful with enabling previews
                // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                htmlEmbed: {
                    showPreviews: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                mention: {
                    feeds: [
                        {
                            marker: '@',
                            feed: [
                                '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                                '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                                '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                                '@sugar', '@sweet', '@topping', '@wafer'
                            ],
                            minimumCharacters: 1
                        }
                    ]
                },
                // The "superbuild" contains more premium features that require additional configuration, disable them below.
                // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                removePlugins: [
                    // These two are commercial, but you can try them out without registering to a trial.
                    // 'ExportPdf',
                    // 'ExportWord',
                    'AIAssistant',
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                    // Storing images as Base64 is usually a very bad idea.
                    // Replace it on production website with other solutions:
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                    // 'Base64UploadAdapter',
                    'MultiLevelList',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                    // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                    'MathType',
                    // The following features are part of the Productivity Pack and require additional license.
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents',
                    'PasteFromOfficeEnhanced',
                    'CaseChange'
                ]
            });
    </script>



</body>

</html>