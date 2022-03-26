<?php 
    require_once('connect.php');

    $nim = $_GET['id'];

    $sql = "DELETE FROM mhs WHERE nim=:nim";
    $data = $conn->prepare($sql);
    $save = $data->execute(array(':nim' => $nim));
    if($save) {
        header("Location: index.php");
    }

?>