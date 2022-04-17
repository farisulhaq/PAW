<?php
include($_SERVER["DOCUMENT_ROOT"] . '/php/paw/uts/config/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php $title = "Daftar Kasus" ?>
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
                            <h3 class="">Daftar Kasus</h3>
                        </div>
                    </div>
                    <!-- <div class="col-auto">
                        <div class="card-body">
                            <a href="" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i> Tambah</a>
                        </div>
                    </div> -->
                </div>

                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="col-1">No</th>
                                            <th class="col-2">Kode</th>
                                            <th class="col-2">Nama Kasus</th>
                                            <th class="col-2">Poin</th>
                                            <!-- <th class="col-1">Action</th> -->
                                        </tr>
                                    </thead>
                                    <?php
                                    $sql = "SELECT * FROM kasus";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();
                                    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                                    ?>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($result as $row) : ?>
                                            <tr class="text-center">
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->kasus_id ?></td>
                                                <td><?= $row->nama_kasus ?></td>
                                                <td><?= $row->poin_kasus ?></td>
                                                <!-- <td class="text-center">
                                                <a href="edit.php?id=" style="color: #FFC107;"><i class="material-icons">&#xE254;</i></a>
                                                <a href="delete.php?id=" style="color: #E34724;"><i class="material-icons">&#xE872;</i></a>
                                            </td> -->
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