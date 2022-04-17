<?php
include($_SERVER["DOCUMENT_ROOT"] . '/php/paw/uts/config/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php $title = "Data Guru" ?>
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
                            <h3 class="">Data Guru</h3>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="card-body">
                            <a href="guru/createGuru.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i> Tambah</a>
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
                                            <th class="col-1">No</th>
                                            <th class="col-2">NIP</th>
                                            <th class="col-2">Nama</th>
                                            <th class="col-2">TTL</th>
                                            <th class="col-2">Jenis Kelamin</th>
                                            <th class="col-2">No. HP</th>
                                            <th class="col-1">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // query jenis kelamin
                                        $sql = "SELECT * FROM guru NATURAL JOIN jenis_kelamin order by guru_id";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();
                                        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                                        ?>
                                        <?php if (empty($result)) : ?>
                                            <tr>
                                                <td colspan="7" class="text-center">Data Kosong</td>
                                            </tr>
                                        <?php else : ?>
                                            <?php $no = 1;
                                            foreach ($result as $row) : ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++ ?></td>
                                                    <td class="text-center"><?= $row->nip ?></td>
                                                    <td><?= ucwords($row->nama_guru) ?></td>
                                                    <td><?= ucwords($row->ttl_guru) ?></td>
                                                    <td><?= ucwords($row->nama_jk) ?></td>
                                                    <td><?= ucwords($row->nohp_guru) ?></td>
                                                    <td class="text-center">
                                                        <a href="guru/editGuru.php?id=<?= $row->guru_id ?>" style="color: #FFC107;"><i class="material-icons">&#xE254;</i></a>
                                                        <a href="guru/deleteGuru.php?id=<?= $row->guru_id ?>" style="color: #E34724;"><i class="material-icons">&#xE872;</i></a>
                                                    </td>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
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