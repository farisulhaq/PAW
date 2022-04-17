<?php
include($_SERVER["DOCUMENT_ROOT"] . '/php/paw/uts/config/connect.php');
// cek auth
require($_SERVER['DOCUMENT_ROOT'] . '/php/paw/uts/auth/auth.php');
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $kelas = htmlspecialchars($_POST['kelas']);
    $kasus = htmlspecialchars($_POST['kasus']);
    $guru = htmlspecialchars($_POST['guru']);
    $sql = "INSERT INTO trx_kasus (guru_id, kasus_id, siswa_id) VALUES (:guru, :kasus, :siswa)";
    $stmt = $conn->prepare($sql);
    $params = array(
        ':guru' => $guru,
        ':kasus' => $kasus,
        ':siswa' => $kelas
    );
    $save = $stmt->execute($params);
    if ($save) {
        $_SESSION['message'] = 'Data pelanggaran berhasil ditambahkan';
        header('Location: index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php $title = "Form Pelanggaran" ?>
<?php include('../template/head.inc') ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include('../template/navbar.inc') ?>
        <?php include('../template/sidebar.inc') ?>
        <div class="content-wrapper">
            <section class="content">
                <div class="row">
                    <div class="col-auto mr-auto">
                        <div class="card-body">
                            <h3 class="">Form Pelanggaran</h3>
                        </div>
                    </div>
                </div>
                <!-- form start -->
                <form action="" method="post">
                    <div class="card-body">
                        <!-- select siswa -->
                        <?php
                        $sql = "SELECT * FROM siswa";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $siswaAll = $stmt->fetchAll(PDO::FETCH_OBJ);
                        ?>
                        <div class="form-group">
                            <label>Nama</label>
                            <select class="form-control" name="kelas">
                                <option value="0"> --Pilih Siswa-- </option>
                                <?php foreach ($siswaAll as $siswa) : ?>
                                    <option value="<?= $siswa->siswa_id ?>"><?= ucwords($siswa->nama_siswa) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- select kasus -->
                        <?php
                        $sql = "SELECT * FROM kasus";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $kasusAll = $stmt->fetchAll(PDO::FETCH_OBJ);
                        ?>
                        <div class="form-group">
                            <label>Kasus</label>
                            <select class="form-control" name="kasus">
                                <option value="0"> --Pilih Kasus-- </option>
                                <?php foreach ($kasusAll as $kasus) : ?>
                                    <option value="<?= $kasus->kasus_id ?>"><?= ucwords($kasus->nama_kasus) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- select guru -->
                        <?php
                        $sql = "SELECT * FROM guru";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $guruAll = $stmt->fetchAll(PDO::FETCH_OBJ);
                        ?>
                        <div class="form-group">
                            <label>Guru</label>
                            <select class="form-control" name="guru">
                                <option value="0"> --Pilih Guru-- </option>
                                <?php foreach ($guruAll as $guru) : ?>
                                    <option value="<?= $guru->guru_id ?>"><?= ucwords($guru->nama_guru) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>
            </section>
        </div>
        <!-- include footer -->
        <?php include('../template/footer.inc') ?>
    </div>
</body>

</html>