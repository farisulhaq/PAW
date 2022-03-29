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
                            <input type="number" class="form-control" id="nim" placeholder="nim">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" placeholder="alamat">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </section>
        </div>
        <?php include('template/footer.php') ?>
    </div>
    <script>
        Swal.fire({
            icon: 'success',
            title: "{{session()->get('success')}}",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
</body>

</html>