<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/php/paw/uts/config/connect.php');
$id = $_GET['id'];
$sql = "DELETE FROM guru WHERE guru_id = :guru_id";
$stmt = $conn->prepare($sql);
$save = $stmt->execute(array('guru_id' => $id));
if ($save) {
    $_SESSION['message'] = 'Data berhasil dihapus';
    header('Location: ../guru.php');
}
?>