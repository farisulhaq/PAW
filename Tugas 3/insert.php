<?php 
include('include/connect.php');
if(isset($_POST['submit'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $sql = "INSERT INTO tbl_171 (nim, nama, alamat) VALUES (:nim, :nama, :alamat)";
    $data = $conn->prepare($sql);
    
    $params = array(
        ':nim' => $nim,
        ':nama' => $nama,
        ':alamat' => $alamat
    );

    $save = $data->execute($params);
    if($save){
        session_start();
        $_SESSION['message'] = 'Data berhasil ditambahkan';
        header('Location: index.php');
    }
}
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
                    <h3 class="card-title">Tambah Mahasiswa</h3>
                </div>
                <form action="" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="number" class="form-control" id="nim" name="nim" placeholder="nim">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat">
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