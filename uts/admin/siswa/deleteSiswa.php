<?php 
include($_SERVER["DOCUMENT_ROOT"] . '/php/paw/uts/config/connect.php');
// cek auth
require($_SERVER['DOCUMENT_ROOT'] . '/php/paw/uts/auth/auth.php');
// ambil id yang mau di hapus
$id = $_GET['id'];
$sql = "DELETE FROM siswa WHERE siswa_id = :siswa_id";
$stmt = $conn->prepare($sql);
$save = $stmt->execute(array(':siswa_id' => $id));
if ($save) {
    $_SESSION['message'] = 'Data Siswa berhasil dihapus';
    header('Location: ../siswa.php');
}
?>