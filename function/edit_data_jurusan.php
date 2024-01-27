<?php
include '../function/koneksi.php';
include '../layout/header.php';

if (isset($_GET['id_jurusan'])) {
    $id = $_GET['id_jurusan'];

    $query = mysqli_query($kon, "SELECT * FROM data_jurusan WHERE id_jurusan = '$id'");

    if (!$query) {
        die('Error in query: ' . mysqli_error($kon));
    }

    $get = mysqli_fetch_array($query);

    if (!$get) {
        echo '<script>
        alert("Data tidak ditemukan");
        window.location.href="../view/data_santri.php";
        </script>';
        exit;
    }
} else {
    echo '<script>
    alert("Parameter id tidak ditemukan");
    window.location.href="../view/data_santri.php";
    </script>';
    exit;
}

?>

<style>
    .form-label {
        margin-bottom: 5px;
    }

    .form-control,
    .form-select,
    .form-check {
        margin-bottom: 10px;
        margin-left: -20px;
    }

    .card-footer {
        margin-top: 10px;
    }
</style>

<form class="card" method="POST" action="">
    <div class="card-header">
        Form Jurusan
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3 form-label">
                <label for="nama_jurusan">Nama Jurusan</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" value="<?= $get['nama_jurusan'] ?>" id="nama_jurusan" name="nama_jurusan" placeholder="Masukkan Nama Jurusan ...">
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button name="simpan" class="btn btn-success">Simpan Data</button>
        <a href="../view/data_jurusan.php" class="btn btn-danger">Kembali</a>
    </div>
</form>

<?php

if (isset($_POST['simpan'])) {
    $namaJurusan = mysqli_real_escape_string($kon, $_POST['nama_jurusan']);

    $simpan = mysqli_query($kon, "UPDATE data_jurusan SET nama_jurusan='$namaJurusan' WHERE id_jurusan='$id'");

    if (!$simpan) {
        echo '<script>
            alert("Gagal Menyimpan Data: ' . mysqli_error($kon) . '");
            </script>';
    } else {
        echo '<script>
            alert("Data Berhasil Disimpan");
            window.location.href="../view/data_jurusan.php";
            </script>';
    }
}

mysqli_close($kon);

include '../layout/footer.php';

?>