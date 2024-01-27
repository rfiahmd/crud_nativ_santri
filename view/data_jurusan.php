<?php
include '../layout/header.php';
include '../function/koneksi.php';

$query = mysqli_query($kon, "SELECT * FROM data_jurusan");
?>

<div class="card">
    <div class="card-header">
        Data Santri
    </div>
    <div class="card-body">
        <a href="../function/tambah_jurusan.php" class="btn btn-primary btn-sm mb-3">+ Tambah Data Jurusan</a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Jurusan</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php $i = 1;
                        foreach ($query as $get) :
                            ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $get['nama_jurusan'] ?></td>
                        <td>
                            <a href="../function/edit_data_jurusan.php?id_jurusan=<?= $get['id_jurusan'] ?>" class="badge bg-primary">
                                Edit
                            </a>
                            <a href="../function/hapus_data_jurusan.php?id=<?= $get['id_jurusan'] ?>" onclick="return confirm('Hapus Data?')" class="badge bg-danger">
                                Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include '../layout/footer.php' ?>