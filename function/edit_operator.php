<?php

include '../function/koneksi.php';
include '../layout/header.php';

if (isset($_GET['id_operator'])) {
    $id = $_GET['id_operator'];

    $query = mysqli_query($kon, "SELECT * FROM data_operator WHERE id_operator = '$id'");

    if (!$query) {
        die('Error in query: ' . mysqli_error($kon));
    }

    $get = mysqli_fetch_array($query);

    if (!$get) {
        echo '<script>
        alert("Data tidak ditemukan");
        window.location.href="../view/data_operator.php";
        </script>';
        exit;
    }
} else {
    echo '<script>
    alert("Parameter id tidak ditemukan");
    window.location.href="../view/data_operator.php";
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
                <label for="nama_operator">Nama Operator</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" id="nama_operator" value="<?= $get['nama_operator'] ?>" name="nama_operator" placeholder="Masukkan Nama Operator ...">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 form-label">
                <label for="email_operator">Email Operator</label>
            </div>
            <div class="col-lg-9">
                <input type="email" class="form-control" id="email_operator" value="<?= $get['email_operator'] ?>" name="email_operator" placeholder="Masukkan Email Operator ...">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 form-label">
                <label for="password_operator">Password Operator</label>
            </div>
            <div class="col-lg-9">
                <input type="password" class="form-control" id="password_operator" value="<?= $get['password_operator'] ?>" name="password_operator" placeholder="Masukkan Password Operator ...">
            </div>
        </div>
        <div class="card-footer">
            <button name="simpan" class="btn btn-success">Simpan Data</button>
            <a href="../view/data_operator.php" class="btn btn-danger">Kembali</a>
        </div>
</form>

<?php

include '../function/koneksi.php';

if (isset($_POST['simpan'])) {
    $namaOperator = $_POST['nama_operator'];
    $emailOperator = $_POST['email_operator'];
    $pwdOperator = $_POST['password_operator'];


    $simpan = mysqli_query($kon, "UPDATE data_operator SET 
    nama_operator='$namaOperator',
    email_operator='$emailOperator',
    password_operator='$pwdOperator'
    WHERE id_operator='$id'");

    if ($simpan) {
        echo '<script>
            alert("Data Berhasil Disimpan");
            window.location.href="../view/data_operator.php";
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