<?php  
    require('connect.php');
    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];

        $sql = "UPDATE tbl_faris SET nama_faris=:nama, email_faris=:email, alamat_faris=:alamat WHERE id_faris=:id";
        $data = $conn->prepare($sql);

        $param = array(
            ':nama' => $nama,
            ':email' => $email,
            ':alamat' => $alamat,
            ':id' => $id
        );

        $save = $data->execute($param);
        if($save) {
            session_start();
            $_SESSION['message'] = "Data berhasil diubah";
            header("Location: index.php");
        }
    }
?>