<?php
include '../layout/header.php';
include '../function/koneksi.php';

$query = mysqli_query($kon, "SELECT ds.*, dj.nama_jurusan FROM data_santri ds
                             INNER JOIN data_jurusan dj ON ds.id_jurusan = dj.id_jurusan");

?>

<div class="card">
    <div class="card-header">
        Data Santri
    </div>
    <div class="card-body">
        <a href="../function/tambah.php" class="btn btn-primary btn-sm mb-3">+ Tambah Data Santri</a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Jurusan</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($query as $get) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $get['nis'] ?></td>
                            <td><?= $get['nama_sntri'] ?></td>
                            <td><?= $get['alamat_sntri'] ?></td>
                            <td><?= $get['tgl_lhr_sntri'] ?></td>
                            <td><?= $get['jns_klmn'] ?></td>
                            <td><?= $get['nama_jurusan'] ?></td>
                            <td>
                                <a href="../function/edit_data_santri.php?id_sntri=<?= $get['id_sntri'] ?>" class="badge bg-primary">
                                    Edit
                                </a>
                                <a href="../function/hapus_data_santri.php?id=<?= $get['id_sntri'] ?>" onclick="return confirm('Hapus Data?')" class="badge bg-danger">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include '../layout/footer.php' ?>