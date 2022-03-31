<?php
include('include/connect.php');
// ambil id yang akan di hapus
$nim = $_GET['id'];
// delete data
$sql = "DELETE FROM tbl_171 WHERE nim = :nim";
$data = $conn->prepare($sql);
$save = $data->execute(array(':nim' => $nim));
if($save) {
    session_start();
    $_SESSION['message'] = 'Data berhasil dihapus';
    header('Location: index.php');
}
