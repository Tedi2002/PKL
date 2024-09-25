<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once '../database/config.php';

    if (isset($_POST['edit'])) {
        $nama = $_POST['nama'];
        $kontak = $_POST['kontak'];
        $alamat = $_POST['alamat'];

        $query = "UPDATE tbl_teknisi SET kontak='$kontak', alamat='$alamat' WHERE nama='$nama'";

        if (mysqli_query($koneksi, $query)) {
            echo '<script>alert("Data berhasil diperbarui");
            window.location.href="../admin_teknisi";
              </script>';
        } else {
            echo '<script>
                alert("Data gagal diperbarui");
                window.location.href="../admin_teknisi";
              </script>';
        }
    }
    ?>

</body>
</html>