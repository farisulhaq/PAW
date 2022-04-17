<?php
include($_SERVER["DOCUMENT_ROOT"] . '/php/paw/uts/config/connect.php');
if (isset($_POST['submit'])) {
    $kelas = $_POST['kelas'];
    $guru = $_POST['guru'];
    $sql = "INSERT INTO wali_kelas (kelas_id, guru_id) VALUES (:kelas, :guru)";
    $stmt = $conn->prepare($sql);
    $params = array(
        ':kelas' => $kelas,
        ':guru' => $guru
    );
    $save = $stmt->execute($params);
    if ($save) {
        $_SESSION['message'] = 'Data Wali Kelas berhasil ditambahkan';
        header('Location: ../waliKelas.php');
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
                            <h3 class="">Tambah Wali Kelas</h3>
                        </div>
                    </div>
                </div>
                <!-- form start -->
                <form action="" method="post">
                    <div class="card-body">
                        <!-- select kelas -->
                        <?php
                        $sql = "SELECT * FROM kelas K WHERE K.kelas_id NOT IN (SELECT kelas_id FROM wali_kelas)";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                        ?>
                        <div class="form-group">
                            <label>Guru</label>
                            <select class="form-control" name="kelas">
                                <?php foreach ($result as $row) : ?>
                                    <option value="<?= $row->kelas_id ?>"><?= strtoupper($row->nama_kelas) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- select guru -->
                        <?php
                        $sql = "SELECT * FROM guru G WHERE G.guru_id NOT IN (SELECT guru_id FROM wali_kelas)";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                        ?>
                        <div class="form-group">
                            <label>Guru</label>
                            <select class="form-control" name="guru">
                                <?php foreach ($result as $row) : ?>
                                    <option value="<?= $row->guru_id ?>"><?= ucwords($row->nama_guru) ?></option>
                                <?php endforeach; ?>
                            </select>
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