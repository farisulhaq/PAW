<?php 
    require('connect.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_faris WHERE id_faris=:id";
    $data = $conn->prepare($sql);
    $save = $data->execute(array(':id' => $id));
    if($save) {
        session_start();
        $_SESSION['message'] = "Data berhasil dihapus";
        header("Location: index.php");
    }
