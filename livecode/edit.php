<?php
require('connect.php');
// tangkep id yang akan di edit
$id = $_GET['id'];
$sql = "SELECT * FROM tbl_faris WHERE id_faris=:id";
$data = $conn->prepare($sql);
$data->execute(array(':id' => $id));
$data = $data->fetch(PDO::FETCH_OBJ);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

    <title>Edit Mahasiswa</title>
</head>

<body>
    <div class="container p-5">
        <!-- For demo purpose -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-6 font-weight-bold">Edit Mahasiswa</h1>
            </div>
        </div> <!-- End -->
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card ">
                    <div class="card-header">
                        <!-- Credit card form content -->
                        <div class="tab-content">
                            <!-- credit card info-->
                            <div class="tab-pane fade show active pt-3">
                                <form action="update.php" method="post">
                                    <input type="hidden" name="id" value="<?= $data->id_faris ?>">
                                    <div class="form-group">
                                        <label for="nama">
                                            <h6>Nama</h6>
                                        </label>
                                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Anda" required value="<?= $data->nama_faris ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">
                                            <h6>Email</h6>
                                        </label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required value="<?= $data->email_faris ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">
                                            <h6>Alamat</h6>
                                        </label>
                                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat Lengkap" required value="<?= $data->alamat_faris ?>">
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" name="submit" class="subscribe btn btn-primary btn-block shadow-sm" value="Tambah">
                                        <!-- <a type="button" name="submit" class="subscribe btn btn-primary btn-block shadow-sm">Tambah</a> -->
                                    </div>
                                </form>
                            </div>
                        </div> <!-- End -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>