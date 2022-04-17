<?php 
// koneksi PDO
$host = "localhost";
$dbname = "tatib";
$username = "root";
$password = "";
// TRY PDO
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi Gagal : " . $e->getMessage();
}
?>