<?php
include '../layout/header.php';
include '../function/koneksi.php';

$id = $_GET['id_sntri'];

$query = mysqli_query($kon, "SELECT * FROM data_santri WHERE id_sntri = '$id'");
$get = mysqli_fetch_array($query);

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
        Form Santri
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3 form-label">
                <label for="nis">NIS</label>
            </div>
            <div class="col-lg-9">
                <input type="text" value="<?= $get['nis'] ?>" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS ...">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="nama_sntri">Nama Santri</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" value="<?= $get['nama_sntri'] ?>" name="nama_sntri" placeholder="Masukkan Nama ...">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="alamat_sntri">Alamat Santri</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" value="<?= $get['alamat_sntri'] ?>" name="alamat_sntri" placeholder="Masukkan Alamat ...">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="tgl_lhr_sntri">Tanggal Lahir</label>
            </div>
            <div class="col-lg-9">
                <input type="date" class="form-control" value="<?= $get['tgl_lhr_sntri'] ?>" name="tgl_lhr_sntri">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 form-label">
                <label for="jurusan">Jurusan</label>
            </div>
            <div class="col-lg-9">
                <select class="form-select" id="jurusan" aria-label="Default select example" name="jurusan">
                    <option value="" disabled selected>Pilih Jurusan</option>
                    <?php
                    include "../fungsi/koneksi.php";

                    $queryJurusan = mysqli_query($kon, "SELECT * FROM data_jurusan");

                    while ($dataJurusan = mysqli_fetch_array($queryJurusan)) {
                        $selected = ($dataJurusan['id_jurusan'] == $get['id_jurusan']) ? 'selected' : '';
                        echo "<option value='{$dataJurusan['id_jurusan']}' $selected>{$dataJurusan['nama_jurusan']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="jns_klmn">Jenis Kelamin</label>
            </div>
            <div class="col-lg-9">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jns_klmn" value="Laki-Laki" id="flexRadioDefault1" <?= ($get['jns_klmn'] == 'Laki-Laki') ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Laki-Laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jns_klmn" value="Perempuan" id="flexRadioDefault2" <?= ($get['jns_klmn'] == 'Perempuan') ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Perempuan
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button name="edit" class="btn btn-success">Edit Data</button>
        <a href="../view/data_santri.php" class="btn btn-danger">Kembali</a>
    </div>
</form>

<?php
include '../function/koneksi.php';

if (isset($_POST['edit'])) {
    $nis = $_POST['nis'];
    $namaSantri = $_POST['nama_sntri'];
    $alamatSantri = $_POST['alamat_sntri'];
    $tgllhrSantri = $_POST['tgl_lhr_sntri'];
    $jurusan = $_POST['jurusan'];
    $jnsKlmn = isset($_POST['jns_klmn']) ? $_POST['jns_klmn'] : '';

    $simpan = mysqli_query($kon, "UPDATE data_santri
    SET nis='$nis', nama_sntri='$namaSantri', alamat_sntri='$alamatSantri', tgl_lhr_sntri='$tgllhrSantri', id_jurusan=$jurusan, jns_klmn='$jnsKlmn'
    WHERE id_sntri='$id'");

    if ($simpan) {
        echo '<script>
        alert("Data Berhasil Diedit");
        window.location.href="../view/data_santri.php";
        </script>';
    } else {
        echo '<script>
        alert("Gagal Mengedit Data");
        </script>';
    }
}

mysqli_close($kon);
?>

<?php include '../layout/footer.php'; ?>