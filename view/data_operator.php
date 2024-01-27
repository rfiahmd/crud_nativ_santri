<?php
include '../layout/header.php';
include '../function/koneksi.php';

$query = mysqli_query($kon, "SELECT * FROM data_operator");
?>

<div class="card">
    <div class="card-header">
        Data Santri
    </div>
    <div class="card-body">
        <a href="../function/tambah_operator.php" class="btn btn-primary btn-sm mb-3">+ Tambah Data Operator</a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Email</th>
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
                        <td><?= $get['nama_operator'] ?></td>
                        <td><?= $get['email_operator'] ?></td>
                        <td>
                            <a href="../function/edit_operator.php?id_operator=<?= $get['id_operator'] ?>" class="badge bg-primary">
                                Edit
                            </a>
                            <a href="../function/hapus_operator.php?id=<?= $get['id_operator'] ?>" onclick="return confirm('Hapus Data?')" class="badge bg-danger">
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