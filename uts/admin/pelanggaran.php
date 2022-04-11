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
                            <h3 class="">Data Guru</h3>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="card-body">
                            <a href="" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i> Tambah</a>
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
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-center">1000029293836</td>
                                            <td>Ahmad Farisul Haq</td>
                                            <td>Sumenep, 12 April 2002</td>
                                            <td>Laki-Laki</td>
                                            <td>081881735505</td>
                                            <td class="text-center">
                                                <a href="edit.php?id=" style="color: #FFC107;"><i class="material-icons">&#xE254;</i></a>
                                                <a href="delete.php?id=" style="color: #E34724;"><i class="material-icons">&#xE872;</i></a>
                                            </td>
                                            </td>
                                        </tr>
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
    <?php if ($_SESSION) : ?>
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