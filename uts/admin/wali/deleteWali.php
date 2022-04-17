<?php 
include($_SERVER["DOCUMENT_ROOT"] . '/php/paw/uts/config/connect.php');
// cek auth
require($_SERVER['DOCUMENT_ROOT'] . '/php/paw/uts/auth/auth.php');
// ambil id yang mau di hapus
$id = $_GET['id'];
$sql = "DELETE FROM wali_kelas WHERE wk_id = :wk_id";
$stmt = $conn->prepare($sql);
$save = $stmt->execute(array(':wk_id' => $id));
if ($save) {
    $_SESSION['message'] = 'Data Wali Kelas berhasil dihapus';
    header('Location: ../waliKelas.php');
}
?>