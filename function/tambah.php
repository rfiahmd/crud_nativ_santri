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
        Form Santri
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3 form-label">
                <label for="nis">NIS</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS ...">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 form-label">
                <label for="nama_sntri">Nama Santri</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" id="nama_sntri" name="nama_sntri" placeholder="Masukkan Nama ...">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 form-label">
                <label for="alamat_sntri">Alamat Santri</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" id="alamat_sntri" name="alamat_sntri" placeholder="Masukkan Alamat ...">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 form-label">
                <label for="tgl_lhr_sntri">Tanggal Lahir</label>
            </div>
            <div class="col-lg-9">
                <input type="date" class="form-control" id="tgl_lhr_sntri" name="tgl_lhr_sntri">
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
                    include "../function/koneksi.php";

                    $query = mysqli_query($kon, "SELECT * FROM data_jurusan");

                    while ($data = mysqli_fetch_array($query)) {
                        echo "<option value='{$data['id_jurusan']}'>{$data['nama_jurusan']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 form-label">
                <label for="jns_klmn">Jenis Kelamin</label>
            </div>
            <div class="col-lg-9">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jns_klmn" value="Laki-Laki" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Laki-Laki
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jns_klmn" value="Perempuan" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Perempuan
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button name="simpan" class="btn btn-success">Simpan Data</button>
        <a href="../view/data_santri.php" class="btn btn-danger">Kembali</a>
    </div>
</form>

<?php
include '../function/koneksi.php';

$nisValue = '';

if (isset($_POST['simpan'])) {
    $nis = $_POST['nis'];

    $cekNIS = mysqli_query($kon, "SELECT * FROM data_santri WHERE nis = '$nis'");
    if (mysqli_num_rows($cekNIS) > 0) {
        $nisValue = $nis;
    } else {
        $namaSantri = $_POST['nama_sntri'];
        $alamatSantri = $_POST['alamat_sntri'];
        $tgllhrSantri = $_POST['tgl_lhr_sntri'];
        $jurusan = $_POST['jurusan'];
        $jnsKlmn = isset($_POST['jns_klmn']) ? $_POST['jns_klmn'] : '';

        $simpan = mysqli_query($kon, "INSERT INTO data_santri
            VALUES (null, '$nis', '$namaSantri', '$alamatSantri', '$tgllhrSantri', '$jurusan', '$jnsKlmn')");

        if (!$simpan) {
            echo '<script>
            alert("Gagal menyimpan data santri.");
            window.location.href="../view/data_santri.php";
            </script>';
            exit;
        } else {
            echo '<script>
            alert("Data santri berhasil disimpan.");
            window.location.href="../view/data_santri.php";
          </script>';
            exit;
        }
    }
}

mysqli_close($kon);
?>

<?php if (!empty($nisValue)) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Data Gagal Disimpan! </strong> NIS <strong><?= $nisValue ?> </strong>Sudah digunakan.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php include '../layout/footer.php'; ?>