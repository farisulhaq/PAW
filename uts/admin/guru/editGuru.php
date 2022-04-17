<?php
include($_SERVER['DOCUMENT_ROOT'] . '/php/paw/uts/config/connect.php');
// cek auth
require($_SERVER['DOCUMENT_ROOT'] . '/php/paw/uts/auth/auth.php');
// mengupdate data guru ke database
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $guru_id = $_POST['guru_id'];
    $nip = htmlspecialchars($_POST['nip']);
    $nama = htmlspecialchars($_POST['nama']);
    $ttl = htmlspecialchars($_POST['ttl']);
    $jk = htmlspecialchars($_POST['jk']);
    $noHP = htmlspecialchars($_POST['no_hp']);
    $sql = "UPDATE guru SET jk_id = :jk_id, nip = :nip, nama_guru = :nama_guru, ttl_guru = :ttl_guru, nohp_guru = :nohp_guru WHERE guru_id = :guru_id";
    $stmt = $conn->prepare($sql);
    $params = array(
        ':guru_id' => $guru_id,
        ':jk_id' => $jk,
        ':nip' => $nip,
        ':nama_guru' => $nama,
        ':ttl_guru' => $ttl,
        ':nohp_guru' => $noHP
    );
    $save = $stmt->execute($params);
    if ($save) {
        $_SESSION['message'] = 'Data Guru berhasil diedit';
        header('Location: ../guru.php');
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
                            <h3 class="">Edit Guru</h3>
                        </div>
                    </div>
                </div>
                <!-- form start -->
                <?php
                $id = $_GET['id'];
                $sql = "SELECT * FROM guru WHERE guru_id = :guru_id";
                $stmt = $conn->prepare($sql);
                $params = array(
                    ':guru_id' => $id
                );
                $stmt->execute($params);
                $guru = $stmt->fetch(PDO::FETCH_OBJ);
                ?>
                <form action="" method="post">
                    <input type="hidden" name="guru_id" value="<?= $guru->guru_id ?>">
                    <div class="card-body">
                        <!-- select -->
                        <div class="form-group">
                            <label>NIP</label>
                            <input type="text" class="form-control" name="nip" placeholder="NIP" required value="<?= $guru->nip ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama" required value="<?= ucwords($guru->nama_guru) ?>">
                        </div>
                        <div class="form-group">
                            <label>Tempat Tanggal Lahir</label>
                            <input type="text" class="form-control" name="ttl" placeholder="Tempat Tanggal Lahir" required value="<?= ucwords($guru->ttl_guru) ?>">
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
                            <select class="form-control" name="jk">
                                <?php foreach ($result as $row) : ?>
                                    <option value="<?= $row->jk_id ?>" <?= ($guru->jk_id == $row->jk_id) ? 'selected' : ''  ?> ><?= ucwords($row->nama_jk) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>No HP</label>
                            <input type="text" class="form-control" name="no_hp" placeholder="No HP" required value="<?= $guru->nohp_guru ?>">
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