<?php 
include('include/connect.php');
// ambil id yang akan di edit
$id = $_GET['id'];
// query data tbl_171 berdasarkan id yang dipilih
$sql = "SELECT * FROM tbl_171 WHERE nim = :nim";
$data = $conn->prepare($sql);
$data->execute(array(':nim' => $id));
$data = $data->fetch(PDO::FETCH_OBJ);
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
                    <h3 class="card-title">Edit Mahasiswa</h3>
                </div>
                <form action="update.php" method="post">
                    <div class="card-body">
                        <input type="hidden" name="nimOld" value="<?= $data->nim ?>">
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="number" class="form-control" id="nim" name="nim" placeholder="nim" value="<?= $data->nim ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $data->nama ?>">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" value="<?= $data->alamat ?>">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>
            </section>
        </div>
        <?php include('template/footer.php') ?>
    </div>
</body>
</html>