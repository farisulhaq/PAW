<?php 
include($_SERVER["DOCUMENT_ROOT"] . '/php/paw/uts/config/connect.php');
// cek auth
require($_SERVER['DOCUMENT_ROOT'] . '/php/paw/uts/auth/auth.php');
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $siswa_id = $_POST['siswa_id'];
    $nis = htmlspecialchars($_POST['nis']);
    $nama_siswa = htmlspecialchars($_POST['nama_siswa']);
    $ttl_siswa = htmlspecialchars($_POST['ttl_siswa']);
    $jk_id = htmlspecialchars($_POST['jk_id']);
    $nohp_siswa = htmlspecialchars($_POST['nohp_siswa']);
    $sql = "UPDATE siswa SET nis=:nis, nama_siswa=:nama_siswa, ttl_siswa=:ttl_siswa, jk_id=:jk_id, nohp_siswa=:nohp_siswa WHERE siswa_id=:siswa_id";
    $stmt = $conn->prepare($sql);
    $params = array(
        ':siswa_id' => $siswa_id,
        ':nis' => $nis,
        ':nama_siswa' => $nama_siswa,
        ':ttl_siswa' => $ttl_siswa,
        ':jk_id' => $jk_id,
        ':nohp_siswa' => $nohp_siswa
    );
    $save = $stmt->execute($params);
    if ($save) {
        $_SESSION['message'] = 'Data Siswa berhasil diupdate';
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
                <?php 
                // ambil id yang mau di edit
                $id = $_GET['id'];
                $sql = "SELECT * FROM siswa WHERE siswa_id = :siswa_id";
                $stmt = $conn->prepare($sql);
                $stmt->execute(array(':siswa_id' => $id));
                $siswa = $stmt->fetch(PDO::FETCH_OBJ);            
                ?>
                <form action="" method="post">
                    <input type="hidden" name="siswa_id" value="<?= $siswa->siswa_id ?>">
                    <div class="card-body">
                        <!-- select -->
                        <div class="form-group">
                            <label>NIS</label>
                            <input type="text" class="form-control" name="nis" placeholder="NIS" value="<?= $siswa->nis ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama_siswa" placeholder="Nama" value="<?= ucwords($siswa->nama_siswa) ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tempat Tanggal Lahir</label>
                            <input type="text" class="form-control" name="ttl_siswa" placeholder="Tempat Tanggal Lahir" value="<?= ucwords($siswa->ttl_siswa) ?>" required>
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
                                    <option value="<?= $row->jk_id ?>" <?= ($siswa->jk_id == $row->jk_id) ? 'selected' : '' ?> ><?= ucwords($row->nama_jk) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>No HP</label>
                            <input type="text" class="form-control" name="nohp_siswa" placeholder="No HP" value="<?= $siswa->nohp_siswa ?>" required>
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