<!DOCTYPE html>
<html lang="en">
<?php $title = "Dashboard" ?>
<?php include('../template/head.inc') ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include('../template/navbar.inc') ?>
        <?php include('../template/sidebar.inc') ?>
        <div class="content-wrapper">
            <section class="content">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">Dashboard</h3>
                </div>
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row mb-5">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>150</h3>

                                        <p>New Orders</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>53<sup style="font-size: 20px">%</sup></h3>

                                        <p>Bounce Rate</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>44</h3>

                                        <p>User Registrations</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>65</h3>

                                        <p>Unique Visitors</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <div class="row">
                            <div class="col">
                                <h3 class="font-weight-bold">Kasus Siswa</h3>
                            </div>
                            <div class="col-sm-12">
                                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="col-1">No</th>
                                            <th class="col-2">NIS</th>
                                            <th class="col-3">Nama Siswa</th>
                                            <th class="col-3">Kasus</th>
                                            <th class="col-3">Poin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-center">16697</td>
                                            <td>Ahmad Farisul Haq</td>
                                            <td>Telat Masuk</td>
                                            <td class="text-center">-</td>
                                            <!-- <a href="edit.php?id=" style="color: #FFC107;"><i class="material-icons">&#xE254;</i></a>
                                                <a href="delete.php?id=" style="color: #E34724;"><i class="material-icons">&#xE872;</i></a> -->
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