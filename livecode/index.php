<?php
include 'connect.php';
$sql = "SELECT * FROM tbl_faris";
$data = $conn->prepare($sql);
$data->execute();
$datas = $data->fetchAll(PDO::FETCH_OBJ);
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

    <title>Live Code UTS</title>
</head>

<body>
    <div class="container mt-5">
        <div class="success">
            <?php session_start() ?>
            <?php if (isset($_SESSION['message'])) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['message']; ?>
                </div>
                <?php unset($_SESSION['message']) ?>
                <?php header("Refresh:2; url=index.php") ?>
            <?php endif; ?>
        </div>
        <div class="table-title">
            <div class="row">
                <div class="col-sm-10">
                    <h2 class="font-weight-bold">Daftar Mahasiswa</h2>
                </div>
                <div class="col-sm-2 mb-1">
                    <a href="insert.php" type="button" class="btn btn-info add-new float-lg-right"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th class="col-1">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th class="col-1">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (sizeof($datas) === 0) : ?>
                    <tr>
                        <td colspan="5" class="text-center">Data Kosong</td>
                    </tr>
                <?php else : ?>
                    <?php $no = 1; ?>
                    <?php foreach ($datas as $data) : ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= ucwords($data->nama_faris) ?></td>
                            <td><?= ($data->email_faris) ?></td>
                            <td><?= ucwords($data->alamat_faris) ?></td>
                            <td class="text-center">
                                <a href="edit.php?id=<?= $data->id_faris ?>" style="color: #FFC107;"><i class="material-icons">&#xE254;</i></a>
                                <a href="delete.php?id=<?= $data->id_faris ?>" style="color: #E34724;"><i class="material-icons">&#xE872;</i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php endif; ?>
            </tbody>
        </table>
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