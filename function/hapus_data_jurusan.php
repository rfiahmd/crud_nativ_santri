<?php
include '../function/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $checkUsage = mysqli_query($kon, "SELECT COUNT(*) as total FROM data_santri WHERE id_jurusan = '$id'");
    $result = mysqli_fetch_assoc($checkUsage);

    if ($result['total'] > 0) {
        echo '<script>
            alert("Jurusan masih digunakan oleh data santri. Tidak dapat dihapus.");
            window.location.href="../view/data_jurusan.php";
            </script>';
        exit;
    }

    $query = mysqli_query($kon, "DELETE FROM data_jurusan WHERE id_jurusan = '$id'");

    if ($query) {
        echo '<script>
        alert("Data Berhasil Dihapus");
        window.location.href="../view/data_jurusan.php";
        </script>';
    } else {
        echo '<script>
        alert("Gagal Menghapus Data");
        window.location.href="../view/data_jurusan.php";
        </script>';
    }
}
?>
