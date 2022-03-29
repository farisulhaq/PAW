<?php 
    require_once('connect.php');

    $nim = $_GET['id'];

    $sql = "DELETE FROM mhs WHERE nim=:nim";
    $data = $conn->prepare($sql);
    $save = $data->execute(array(':nim' => $nim));
    if($save) {
        session_start();
        $_SESSION['message'] = "Data berhasil dihapus";
        header("Location: index.php");
    }

?>