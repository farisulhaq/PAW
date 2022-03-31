<?php
include('include/connect.php');
if(isset($_POST['submit'])) {
    // ambil data dari form
    $nimOld = $_POST['nimOld'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    // update data
    $sql = "UPDATE tbl_171 SET nim = :nim, nama = :nama, alamat = :alamat WHERE nim = :nimOld";
    $data = $conn->prepare($sql);
    
    $params = array(
        ':nim' => $nim,
        ':nama' => $nama,
        ':alamat' => $alamat,
        ':nimOld' => $nimOld
    );

    $save = $data->execute($params);
    if($save) {
        session_start();
        $_SESSION['message'] = 'Data berhasil diubah';
        header('Location: index.php');
    }
}