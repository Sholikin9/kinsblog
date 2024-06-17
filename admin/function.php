<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kinsblog";

// Buat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Cek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// ===== LOGIN ===== //
if (isset($_POST['btn_login'])) {
    $data_username = $_POST['username'];
    $data_password = md5($_POST['password']);

    $sql = "SELECT * FROM penulis WHERE username='$data_username' AND password='$data_password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION["username"] = $data_username;
            $_SESSION["password"] = $data_password;
            $_SESSION['idpenulis'] = $row['id_penulis'];
        }
        header('location: index.php');
    } else {
        // echo "0 rsults";
        // //$_SESSION['login_error'] = "Username atau password salah.";
        // echo '<script>alert("Username atau password salah.");</script>';
        // header('Location: login.php');
        // exit();
    }
}

if(isset($_POST['btn_hapus_artikel'])) {
    $id_hapus = $_POST['id_hapus_artikel'];
    // sql to delete a record
    $sql_hapus_artikel = "DELETE FROM artikel WHERE id_artikel IN (
                        SELECT id_artikel
                        FROM kontributor
                        WHERE id_kontributor = '$id_hapus'
                        )";
    $sql_hapus_kontributor = "DELETE FROM kontributor WHERE id_kontributor = '$id_hapus'";

    if (mysqli_query($conn, $sql_hapus_artikel)) {
        if (mysqli_query($conn, $sql_hapus_kontributor)) {
            header('location:artikel.php');
            } else {
              echo "Error deleting record: " . mysqli_error($conn);
            }
        } else {
          echo "Error deleting record: " . mysqli_error($conn);
        }
}

// fungsi btn simpan artikl
if(isset($_POST['btn_simpan'])) {
    $target_dir = "gambar/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check dulu gambar asli / palsu
      $check = getimagesize($_FILES["gambar"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }

    // Check apakah fil udah ada/ blum
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }

    // Check file size (untuk batasi ukuran fil (b))
    if ($_FILES["gambar"]["size"] > 50000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // mnntukan fil format yg diizinkan
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["gambar"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }

    $data_tanggal = $_POST['tanggal'];
    $data_judul = $_POST['judul'];
    $data_isi = $_POST['isi'];
    $data_kategori = $_POST['kategori'];
    $data_gambar = $target_file;

    $sql = "INSERT INTO artikel (tanggal, judul, isi, gambar)
    VALUES ('$data_tanggal', '$data_judul', '$data_isi', '$data_gambar')";
    if (mysqli_query($conn, $sql)) {

        $sql = "SELECT * FROM artikel ORDER BY id_artikel DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);

        $data_id_artikel = "";

        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
            $data_id_artikel = $row['id_artikel'];
          }
        } else {
          echo "0 results";
        }

        $data_id_penulis = $_SESSION['idpenulis'];

        $sql = "INSERT INTO kontributor (id_penulis, id_kategori, id_artikel)
        VALUES ('$data_id_penulis', '$data_kategori', '$data_id_artikel')";

        if (mysqli_query($conn, $sql)) {
            header('location:artikel.php');
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }


    } else {

    }
}


if(isset($_POST['btn_ubah_artikel'])) {
    $target_dir = "gambar/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check dulu gambar asli / palsu
      $check = getimagesize($_FILES["gambar"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }

    // Check apakah fil udah ada/ blum
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }

    // Check file size (untuk batasi ukuran fil (b))
    if ($_FILES["gambar"]["size"] > 50000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // mnntukan fil format yg diizinkan
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["gambar"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }

    $data_tanggal = $_POST['tanggal'];
    $data_judul = $_POST['judul'];
    $data_isi = $_POST['isi'];
    $data_kategori = $_POST['kategori'];
    $data_gambar = $target_file;
    $id_ubah = $_POST['id_kontributor_ubah'];

    $sql_update_artikel = "UPDATE artikel
                            INNER JOIN kontributor ON artikel.id_artikel = kontributor.id_artikel
                            SET artikel.judul = '$data_judul',
                                artikel.isi = '$data_isi',
                                artikel.gambar = '$data_gambar'
                            WHERE kontributor.id_kontributor = '$id_ubah'";

    $sql_update_kontributor = "UPDATE kontributor
                                SET
                                id_kategori = '$data_kategori'
                                WHERE
                                id_kontributor = '$id_ubah'";

    if (mysqli_query($conn, $sql_update_artikel)) {
        if (mysqli_query($conn, $sql_update_kontributor)) {
            header('location:artikel.php');
        } else {

        }
    } else {

    }
            
}


if(isset($_POST['btn_simpan_kategori'])) {
    $data_nama = $_POST['nama'];
    $data_keterangan = $_POST['keterangan'];

    $sql = "INSERT INTO kategori (nm_kategori, keterangan)
    VALUES ('$data_nama', '$data_keterangan')";

    if (mysqli_query($conn, $sql)) {
        header('location:kategori.php');
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}


if (isset($_POST['btn_ubah_kategori'])) {
    $data_nama = $_POST['nama'];
    $data_keterangan = $_POST['keterangan'];
    $data_id_kategori_ubah = $_POST['id_kategori_ubah'];

    $sql = "UPDATE kategori SET nm_kategori='$data_nama', keterangan='$data_keterangan' WHERE id_kategori='$data_id_kategori_ubah'";

    if (mysqli_query($conn, $sql)) {
      header('location:kategori.php');
    } else {
      echo "Error updating record: " . mysqli_error($conn);
    }
}

if (isset($_POST['btn_hapus_kategori'])) {
    $id_hapus = $_POST['id_hapus_kategori'];

    $sql = "DELETE FROM kategori WHERE id_kategori='$id_hapus'";

    if (mysqli_query($conn, $sql)) {
      header('location:kategori.php');
    } else {
      echo "Error deleting record: " . mysqli_error($conn);
    }
}

if (isset($_POST['btn_ubah_penulis'])) {
    $data_nama = $_POST['nama'];
    $data_email = $_POST['email'];
    $data_password = md5($_POST['password']);
    $data_id_penulis_ubah = $_POST['id_penulis_ubah'];

    $sql = "UPDATE penulis SET username='$data_nama',
                               email='$data_email',
                               password='$data_password'
                               WHERE id_penulis='$data_id_penulis_ubah'";

    if (mysqli_query($conn, $sql)) {
      header('location:penulis.php');
    } else {
      echo "Error updating record: " . mysqli_error($conn);
    }
}

if (isset($_POST['btn_hapus_penulis'])) {
    $id_hapus = $_POST['id_hapus_penulis'];

    $sql = "DELETE FROM penulis WHERE id_penulis='$id_hapus'";

    if (mysqli_query($conn, $sql)) {
      header('location:penulis.php');
    } else {
      echo "Error deleting record: " . mysqli_error($conn);
    }

}

if (isset($_POST['btn_simpan_penulis'])) {
    $data_nama = $_POST['nama'];
    $data_email = $_POST['email'];
    $data_password = md5($_POST['password']);

    $sql = "INSERT INTO penulis (username, email, password)
    VALUES ('$data_nama', '$data_email', '$data_password')";

    if (mysqli_query($conn, $sql)) {
        header('location:penulis.php');
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

//fungsi potong kalimat untuk mnampilkan sbagian isis artikl
function potong_kalimat($isi_artikl, $jml_karakter) {
    while ($isi_artikl[$jml_karakter] != " ") {
        --$jml_karakter;
    }
    $potongan_isi_artikl = substr($isi_artikl, 0, $jml_karakter);
    $isi_artikl_trpotong = $potongan_isi_artikl . " ....";
    return $isi_artikl_trpotong;
}

// fungsi cari
function searchArticles($conn, $query) {
    $query = mysqli_real_escape_string($conn, $query);
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
            WHERE a.judul LIKE '%$query%' OR a.isi LIKE '%$query%'
            ORDER BY id_kontributor DESC";
    return mysqli_query($conn, $sql);
}

// fungsi cari artikl katwgori
function getArticlesByCategoryAndSearch($conn, $id_kategori_terpilih, $search_keyword = '') {
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
            WHERE k.id_kategori='$id_kategori_terpilih'";

    if (!empty($search_keyword)) {
        $sql .= " AND (a.judul LIKE '%$search_keyword%' OR a.isi LIKE '%$search_keyword%')";
    }

    $sql .= " ORDER BY k.id_kontributor DESC";
    return $conn->query($sql);
}

function getCategoryInfo($conn, $id_kategori_terpilih) {
    $sql = "SELECT * FROM kategori WHERE id_kategori='$id_kategori_terpilih'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }
    return null;
}

function getAllCategories($conn) {
    $sql = "SELECT * FROM kategori ORDER BY id_kategori DESC";
    return mysqli_query($conn, $sql);
}

// fungsi trjmah hari ing-in
function hariIndnisia($namaHari) {
    $hari = $namaHari;
    switch ($hari) {
  case "Sunday":
    $hari = "Minggu";
    return $hari;
    break;
  case "Monday":
    $hari = "Senin";
    return $hari;
    break;
  case "Tuesday":
    $hari = "Selasa";
    return $hari;
    break;
  case "Wednesday":
    $hari = "Rabu";
    return $hari;
    break;
  case "Thursday":
    $hari = "Kamis";
    return $hari;
    break;
  case "Friday":
    $hari = "Jumat";
    return $hari;
    break;
  case "Saturday":
    $hari = "Sabtu";
    return $hari;
    break;
  default:
    $hari = "nama hari";
}
}

function namaBulan($bulan) {
    $nama_bulan = $bulan;
    switch ($nama_bulan) {
        case "01":
            return "Januari";
        case "02":
            return "Februari";
        case "03":
            return "Maret";
        case "04":
            return "April";
        case "05":
            return "Mei";
        case "06":
            return "Juni";
        case "07":
            return "Juli";
        case "08":
            return "Agustus";
        case "09":
            return "September";
        case "10":
            return "Oktober";
        case "11":
            return "November";
        case "12":
            return "Desember";
        default:
            return "Nama bulan tidak valid";
    }
}

?>