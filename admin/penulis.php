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

    <title>Kins Blog | Penulis</title>

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
            <li class="nav-item :hover">
                <a class="nav-link" href="artikel.php">
                    <i class="bi bi-newspaper"></i>
                    <span>Artikel</span></a>
            </li>
            <li class="nav-item :hover">
                <a class="nav-link" href="kategori.php">
                    <i class="bi bi-bookmarks"></i>
                    <span>Kategori</span></a>
            </li>
            <li class="nav-item active">
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
                        <h1 class="h3 mb-0 text-gray-800">Penulis</h1>
                    </div>                    

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
                                    <!-- $_SESSION["username"] -->
                                    <?php echo "Anda Login sebagai ".$_SESSION["username"]; ?>
                                        
                                    </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
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
                        Silahkan kelola Penulis<br><br>
                    </div>
                    <!-- Page Heading -->

                    <!-- Content Row -->
                     <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button class="btn btn-primary" name="btn_penulis_baru" id="btn_penulis_baru"
                                data-bs-toggle="modal" data-bs-target="#modalFormPenulis">
                                <i class="bi bi-person-square"></i></i></i> &nbsp Tambah Penulis</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">No</th> <!-- Menetapkan lebar relatif -->
                                            <th>Nama Penulis</th> <!-- Biarkan lebar menyesuaikan -->
                                            <th>Email </th> <!-- Biarkan lebar menyesuaikan -->
                                            <th style="width: 15%;">Aksi</th> <!-- Menetapkan lebar relatif -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $sql = "SELECT * FROM penulis ORDER BY id_penulis DESC";
                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            $nmrtbl = 0;
                                              // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                            $nmrtbl++;
                                            $data_id_penulis = $row['id_penulis'];
                                            $data_nama = $row['username'];
                                            $data_email = $row['email'];
                                    ?>
                                        <tr>
                                            <td><?php echo $nmrtbl; ?></td>
                                            <td><?php echo $data_nama; ?></td>
                                            <td><?php echo $data_email; ?></td>
                                            <td>
                                                <button class="btn btn-info btn-sm" name="btn_ubah_penulis" data-bs-toggle="modal" data-bs-target="#modalUbahPenulis<?php echo $data_id_penulis; ?>">Ubah</button>
                                                <button class="btn btn-danger btn-sm" name="btn_hapus_penulis" data-bs-toggle="modal" data-bs-target="#modalHapusPenulis<?php echo $data_id_penulis; ?>">Hapus</button>
                                            </td>
                                        </tr>
                                        <!-- Modal Hapus Penulis-->
                                            <div class="modal fade" id="modalHapusPenulis<?php echo $data_id_penulis; ?>" data-bs-backdrop="static">
                                              <div class="modal-dialog">
                                                <div class="modal-content">

                                                  <!-- Modal Header -->
                                                  <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Penulis?</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                  </div>

                                                  <!-- Modal body -->
                                                  <form method="POST">
                                                    <div class="modal-body mb-1">
                                                        Apakah anda yakin menghapus penulis dengan nama <?php echo "<b>".$data_nama."</b>"; ?>
                                                        <div class="mb-1 mt-3 d-flex justify-content-end gap-2">
                                                          <button class="btn btn-danger" name="btn_hapus_penulis">Hapus</button>
                                                            <input type="hidden" name="id_hapus_penulis" value="<?php echo $data_id_penulis; ?>">
                                                          <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        </div>
                                                     </div>
                                                  </form>      
                                                <!-- modal hapus footr  -->                             
                                                </div>
                                              </div>
                                            </div>

                                        <!-- Modal Form Ubah Penulis-->
                                            <div class="modal fade" id="modalUbahPenulis<?php echo $data_id_penulis; ?>" data-bs-backdrop="static">
                                              <div class="modal-dialog">
                                                <div class="modal-content">

                                                  <!-- Modal Header -->
                                                  <div class="modal-header">
                                                    <h4 class="modal-title">Ubah Penulis</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                  </div>

                                                  <!-- Modal Body Ubah Penulis -->
                                                  <div class="modal-body">
                                                     <form method="POST">
                                                      <div class="mb-3">
                                                        <label for="nama" class="form-label">Nama Penulis:</label>
                                                        <input type="text" class="form-control" id="nama" value="<?php echo $data_nama; ?>" name="nama">
                                                      </div>
                                                      <div class="mb-3 mt-3">
                                                        <label for="email" class="form-label">Email Penulis:</label>
                                                        <input type="email" class="form-control" id="email" value="<?php echo $data_email; ?>" name="email">
                                                      </div>
                                                      <div class="mb-3 mt-3">
                                                        <label for="password" class="form-label">Password:</label>
                                                        <input type="password" class="form-control" id="password" placeholder="Isi dengan password lama atau ganti dengan yang baru" name="password">
                                                      </div>
                                                        <input type="hidden" name="id_penulis_ubah" value="<?php echo $data_id_penulis; ?>">
                                                      <div class="d-flex justify-content-end gap-2">
                                                          <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                          <button class="btn btn-primary" name="btn_ubah_penulis">Ubah</button>
                                                      </div>
                                                    </form> 
                                                  </div>

                                                  <!-- Modal footer -->
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

    <!-- Logot Modal-->
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

    <!-- Modal Form Tambah Penulis-->
    <div class="modal fade" id="modalFormPenulis" data-bs-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Tambah Penulis</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal Body Tambah Penulis -->
          <div class="modal-body">
             <form method="POST">
              <div class="mb-3">
                <label for="nama" class="form-label">Nama Penulis:</label>
                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Penulis...." name="nama">
              </div>
              <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email :</label>
                <input type="email" class="form-control" id="email" placeholder="Masukkan Email...." name="email">
              </div>
              <div class="mb-3 mt-3">
                <label for="password" class="form-label">Password :</label>
                <input type="password" class="form-control" id="password" placeholder="Masukkan Password...." name="password">
              </div>
              <div class="d-flex justify-content-end gap-2">
                  <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <button class="btn btn-primary" name="btn_simpan_penulis">Simpan</button>
              </div>
            </form> 
          </div>

          <!-- Modal footer -->
      </div>
    </div>

</body>

</html>