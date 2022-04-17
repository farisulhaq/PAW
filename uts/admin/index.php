<?php
include($_SERVER["DOCUMENT_ROOT"] . '/php/paw/uts/config/connect.php');
// cek auth
require($_SERVER['DOCUMENT_ROOT'] . '/php/paw/uts/auth/auth.php');
// count guru
$sql = "SELECT COUNT(*) AS jumlah FROM guru";
$stmt = $conn->prepare($sql);
$stmt->execute();
$countGuru = $stmt->fetch(PDO::FETCH_OBJ);
// count siswa
$sql = "SELECT COUNT(*) AS jumlah FROM siswa";
$stmt = $conn->prepare($sql);
$stmt->execute();
$countSiswa = $stmt->fetch(PDO::FETCH_OBJ);
// count kelas
$sql = "SELECT COUNT(*) AS jumlah FROM kelas";
$stmt = $conn->prepare($sql);
$stmt->execute();
$countKelas = $stmt->fetch(PDO::FETCH_OBJ);
// count kasus  
$sql = "SELECT COUNT(*) AS jumlah FROM kasus";
$stmt = $conn->prepare($sql);
$stmt->execute();
$countKasus = $stmt->fetch(PDO::FETCH_OBJ);
?>
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
                                        <h3><?= $countGuru->jumlah ?></h3>
                                        <p>Guru</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="guru.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3><?= $countSiswa->jumlah ?></h3>
                                        <p>Siswa</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="siswa.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3><?= $countKelas->jumlah ?></h3>
                                        <p>Kelas</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="waliKelas.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3><?= $countKasus->jumlah ?></h3>
                                        <p>Data Kasus</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="kasus.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                                        <!-- ambil data siswa yang bermasalah -->
                                        <?php
                                        $sql = "SELECT * FROM trx_kasus INNER JOIN siswa USING(siswa_id) INNER JOIN kasus USING(kasus_id)";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();
                                        $siswaB = $stmt->fetchAll(PDO::FETCH_OBJ);
                                        ?>
                                        <!-- Tampilkan data -->
                                        <?php $no = 1;
                                        foreach ($siswaB as $siswa) : ?>
                                            <tr>
                                                <td class="text-center"><?= $no++ ?></td>
                                                <td class="text-center"><?= $siswa->nis ?></td>
                                                <td><?= $siswa->nama_siswa ?></td>
                                                <td><?= $siswa->nama_kasus ?></td>
                                                <td class="text-center"><?= $siswa->poin_kasus ?></td>
                                                <!-- <a href="edit.php?id=" style="color: #FFC107;"><i class="material-icons">&#xE254;</i></a>
                                                <a href="delete.php?id=" style="color: #E34724;"><i class="material-icons">&#xE872;</i></a> -->
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