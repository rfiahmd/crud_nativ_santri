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
        Form Operator
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3 form-label">
                <label for="nama_operator">Nama Operator</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" id="nama_operator" name="nama_operator" placeholder="Masukkan Nama Operator ...">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 form-label">
                <label for="email_operator">Email Operator</label>
            </div>
            <div class="col-lg-9">
                <input type="email" class="form-control" id="email_operator" name="email_operator">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 form-label">
                <label for="password_operator">Password Operator</label>
            </div>
            <div class="col-lg-9">
                <input type="password" class="form-control" id="password_operator" name="password_operator" placeholder="Masukkan Password Operator ...">
            </div>
        </div>
        <div class="card-footer">
            <button name="simpan" class="btn btn-success">Simpan Data</button>
            <a href="../view/data_operator.php" class="btn btn-danger">Kembali</a>
        </div>
</form>

<?php

if (isset($_POST['simpan'])) {
    include '../function/koneksi.php';

    $namaOperator = $_POST['nama_operator'];
    $emailOperator = $_POST['email_operator'];
    $passwordOperator = $_POST['password_operator'];

    $hashedPassword = password_hash($passwordOperator, PASSWORD_DEFAULT);

    $simpan = mysqli_query($kon, "INSERT INTO data_operator
        VALUES (null, '$namaOperator', '$emailOperator', '$hashedPassword', null)");

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

    mysqli_close($kon);
}

include '../layout/footer.php';
?>