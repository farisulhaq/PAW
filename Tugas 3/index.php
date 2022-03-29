<?php 
include('include/connect.php');
$sql = "SELECT * FROM tbl_171";
$data = $conn->prepare($sql);
$data->execute();
$datas = $data->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="en">
<?php include('template/head.php') ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include('template/navbar.php') ?>
        <?php include('template/sidebar.php') ?>
        <div class="content-wrapper">
            <section class="content">

                <div class="card-header">
                    <h3 class="card-title">Data Mahasiswa</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"></div>
                            <div class="col-sm-12 col-md-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="col-1">No</th>
                                            <th class="col-2">NIM</th>
                                            <th class="col-3">Nama</th>
                                            <th class="col-3">Alamat</th>
                                            <th class="col-1">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1 ?>
                                        <?php foreach($datas as $data) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center"><?= $data->nim ?></td>
                                            <td><?= $data->nama ?></td>
                                            <td><?= $data->alamat ?></td>
                                            <td class="text-center">
                                                <a href="edit.php?id=" style="color: #FFC107;"><i class="material-icons">&#xE254;</i></a>
                                                <a href="delete.php?id=" style="color: #E34724;"><i class="material-icons">&#xE872;</i></a>
                                            </td>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

            </section>
        </div>
        <?php include('template/footer.php') ?>
    </div>
    <!-- <script>
        Swal.fire({
            icon: 'success',
            title: "{{session()->get('success')}}",
            showConfirmButton: false,
            timer: 1500
        });
    </script> -->
</body>

</html>