<?php 
session_start(); // mulai session
session_destroy(); // hapus session
// pesan logout
$_SESSION['message'] = 'Anda berhasil logout';
header('Location: ../index.php');
?>