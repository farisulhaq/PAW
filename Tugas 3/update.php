<?php  
    require_once('connect.php');
    if(isset($_POST['submit'])) {
        $nimL = $_POST['nimL'];
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];

        $sql = "UPDATE mhs SET nim=:nim, nama=:nama, alamat=:alamat WHERE nim=:nimL";
        $data = $conn->prepare($sql);

        $param = array(
            ':nim' => $nim,
            ':nama' => $nama,
            ':alamat' => $alamat,
            ':nimL' => $nimL
        );

        $save = $data->execute($param);
        if($save) {
            header("Location: index.php");
        }
    }
?>