<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    require_once '../database/config.php';

    if (isset($_POST['tambah'])) {
        $kode_angkatan = trim(mysqli_real_escape_string($koneksi, $_POST['kodeangkatan']));
        $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));

        // Cek apakah kode_angkatan atau keterangan sudah ada
        $querycek = mysqli_query($koneksi, "SELECT * FROM tbl_angkatan WHERE kode_angkatan='$kode_angkatan' OR keterangan='$keterangan'") or die(mysqli_error($koneksi));

        $returnvalue = mysqli_num_rows($querycek);
        if ($returnvalue != 0) {
            echo '<script>
                    alert("Kode Angkatan atau Keterangan sudah ada");
                    window.location="../admin_master_angkatan/tambahangkatan.php";
                  </script>';
        } else {
            mysqli_query($koneksi, "INSERT INTO tbl_angkatan VALUES ('$kode_angkatan', '$keterangan')") or die(mysqli_error($koneksi));
            echo '<script>
                    alert("Data Angkatan berhasil ditambah");
                    window.location="../admin_master_angkatan";
                  </script>';
        }
    } else {
        $kd_pengguna = @$_GET['kd_pengguna']; {
            $kd_pengguna = @$_GET['kd_pengguna'];
            if ($kd_pengguna != null) {
                echo '<script>
                        alert("Data Pengguna dengan kode Pengguna [' . $kd_pengguna . '] berhasil dihapus");
                        window.location="../admin_pengguna";
                      </script>';
                $qrdelpengguna = mysqli_query($koneksi, "DELETE FROM tbl_login WHERE id='$kd_pengguna'") or die(mysqli_error($koneksi));
            }
            $reset = @$_GET['reset'];
            if ($reset == "reset_data") {
                $queryresetangkatan = mysqli_query($koneksi, "TRUNCATE TABLE tbl_angkatan") or die(mysqli_error($koneksi));
                echo '<script>
                        alert("Semua data berhasil direset");
                        window.location="../admin_master_angkatan";
                      </script>';
            } else {
                echo '<script>
                        alert("Tidak ada data yang terpilih, ngantuk ya bro????");
                        window.location="../admin_master_angkatan";
                      </script>';
            }
        }
    }
    ?>
</body>

</html>