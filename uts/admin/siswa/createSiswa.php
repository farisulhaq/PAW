<?php 
include($_SERVER["DOCUMENT_ROOT"] . '/php/paw/uts/config/connect.php');
// cek auth
require($_SERVER['DOCUMENT_ROOT'] . '/php/paw/uts/auth/auth.php');
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $nis = htmlspecialchars($_POST['nis']);
    $nama_siswa = htmlspecialchars($_POST['nama_siswa']);
    $ttl_siswa = htmlspecialchars($_POST['ttl_siswa']);
    $jk_id = htmlspecialchars($_POST['jk_id']);
    $nohp_siswa = htmlspecialchars($_POST['nohp_siswa']);
    $sql = "INSERT INTO siswa (jk_id, nis, nama_siswa, ttl_siswa, nohp_siswa) VALUES (:jk_id, :nis, :nama_siswa, :ttl_siswa, :nohp_siswa)";
    $stmt = $conn->prepare($sql);
    $params = array(
        ':jk_id' => $jk_id,
        ':nis' => $nis,
        ':nama_siswa' => $nama_siswa,
        ':ttl_siswa' => $ttl_siswa,
        ':nohp_siswa' => $nohp_siswa
    );
    $save = $stmt->execute($params);
    if ($save) {
        $_SESSION['message'] = 'Data Siswa berhasil ditambahkan';
        header('Location: ../siswa.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php $title = "Form Pelanggaran" ?>
<?php include($_SERVER["DOCUMENT_ROOT"] . '/php/paw/uts/template/head.inc') ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include($_SERVER["DOCUMENT_ROOT"] . '/php/paw/uts/template/navbar.inc') ?>
        <?php include($_SERVER["DOCUMENT_ROOT"] . '/php/paw/uts/template/sidebar.inc') ?>
        <div class="content-wrapper">
            <section class="content">
                <div class="row">
                    <div class="col-auto mr-auto">
                        <div class="card-body">
                            <h3 class="">Tambah Siswa</h3>
                        </div>
                    </div>
                </div>
                <!-- form start -->
                <form action="" method="post">
                    <div class="card-body">
                        <!-- select -->
                        <div class="form-group">
                            <label>NIS</label>
                            <input type="text" class="form-control" name="nis" placeholder="NIS" required>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama_siswa" placeholder="Nama" required>
                        </div>
                        <div class="form-group">
                            <label>Tempat Tanggal Lahir</label>
                            <input type="text" class="form-control" name="ttl_siswa" placeholder="Tempat Tanggal Lahir" required>
                        </div>
                        <div class="form-group">
                            <!-- query Jenis Kelamin -->
                            <?php
                            $sql = "SELECT * FROM jenis_kelamin";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                            ?>
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="jk_id">
                                <?php foreach ($result as $row) : ?>
                                    <option value="<?= $row->jk_id ?>"><?= ucwords($row->nama_jk) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>No HP</label>
                            <input type="text" class="form-control" name="nohp_siswa" placeholder="No HP" required>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
                    </div>
                </form>
            </section>
        </div>
        <!-- include footer -->
        <?php include($_SERVER["DOCUMENT_ROOT"] . '/php/paw/uts/template/footer.inc') ?>
    </div>
</body>

</html>