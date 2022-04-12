<!DOCTYPE html>
<html lang="en">
<?php $title = "Form Pelanggaran" ?>
<?php include('../../../template/head.inc') ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include('../../../template/navbar.inc') ?>
        <?php include('../../../template/sidebar.inc') ?>
        <div class="content-wrapper">
            <section class="content">
                <div class="row">
                    <div class="col-auto mr-auto">
                        <div class="card-body">
                            <h3 class="">Form Pelanggaran</h3>
                        </div>
                    </div>
                </div>
                <!-- form start -->
                <form>
                    <div class="card-body">
                        <!-- select -->
                        <div class="form-group">
                            <label>Kelas</label>
                            <select class="form-control">
                                <option>option 1</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kasus</label>
                            <select class="form-control">
                                <option>option 1</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Guru</label>
                            <select class="form-control">
                                <option>option 1</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </section>
        </div>
        <!-- include footer -->
        <?php include('../../../template/footer.inc') ?>
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