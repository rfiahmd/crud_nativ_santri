<?php include '../layout/header.php'; ?>

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
                <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" placeholder="Masukkan Nama Jurusan ...">
            </div>
        </div>
    <div class="card-footer">
        <button name="simpan" class="btn btn-success">Simpan Data</button>
        <a href="../view/data_jurusan.php" class="btn btn-danger">Kembali</a>
    </div>
</form>

<?php

include '../function/koneksi.php';

if (isset($_POST['simpan'])) {
    $namaJurusan = $_POST['nama_jurusan'];

    $simpan = mysqli_query($kon, "INSERT INTO data_jurusan
    VALUES (null, '$namaJurusan')");

    if ($simpan) {
        echo '<script>
            alert("Data Berhasil Disimpan");
            window.location.href="../view/data_jurusan.php";
            </script>';
    } else {
        echo '<script>
            alert("Gagal Menyimpan Data");
            </script>';
    }
}
mysqli_close($kon);

include '../layout/footer.php';

?>
