<?php
include($_SERVER["DOCUMENT_ROOT"] . '/php/paw/uts/config/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php $title = "Wali Kelas" ?>
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
                            <h3 class="">Data Wali kelas</h3>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="card-body">
                            <a href="wali/createWali.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i> Tambah</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="col-4">Kelas</th>
                                            <th class="col-4">Wali Kelas</th>
                                            <th class="col-4">Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $sql = "SELECT wk_id, nama_kelas, nama_guru FROM wali_kelas INNER JOIN guru USING(guru_id) INNER JOIN kelas USING(kelas_id)";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();
                                    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                                    ?>
                                    <tbody>
                                        <?php foreach ($result as $row ) : ?>
                                            <tr>
                                                <td class="text-center"><?= strtoupper($row->nama_kelas) ?></td>
                                                <td class="text-center"><?= ucwords($row->nama_guru) ?></td>
                                                <td class="text-center">
                                                    <!-- <a href="wali/editWali.php?id=<?= $row->wk_id ?>" style="color: #FFC107;"><i class="material-icons">&#xE254;</i></a> -->
                                                    <a href="wali/deleteWali.php?id=<?= $row->wk_id ?>" style="color: #E34724;"><i class="material-icons">&#xE872;</i></a>
                                                </td>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- include footer -->
        <?php include('../template/footer.inc') ?>
    </div>
    <!-- sweetAlert -->
    <?php if (isset($_SESSION['message'])) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: "<?= $_SESSION['message'] ?>",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
        <?php unset($_SESSION['message']) ?>
    <?php endif ?>
    <!-- end sweetAlert -->
</body>

</html>