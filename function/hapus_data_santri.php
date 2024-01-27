<?php
include '../function/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = mysqli_query($kon, "DELETE FROM data_santri WHERE id_sntri = '$id'");

    if ($query) {
        echo '<script>
        alert("Data Berhasil Dihapus");
        window.location.href="../view/data_santri.php";
        </script>';
    } else {
        echo '<script>
        alert("Gagal Menghapus Data");
        window.location.href="../view/data_santri.php";
        </script>';
    }
}
