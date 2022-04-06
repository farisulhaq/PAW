<!-- Modul III PHP Variable dan Tipe Data -->
<?php
print("<h2>2. Modul III PHP Variable dan Tipe Data</h2>");
$nama = "Ahmad Farisul Haq";
$nim = "200411100171";
print("Nama/NRP : $nama/$nim <br>"); 
// membuat variabel dengan tipe data integer
$x = 7;
$y = 5;
print("Nilai x = $x <br>");
print("Nilai y = $y");
// penjumlahan
$z = $x + $y;
print("<br>Hasil penjumlahan $x + $y = $z");
// pengurangan
$z = $x - $y;
print("<br>Hasil pengurangan $x - $y = $z");
// perkalian
$z = $x * $y;
print("<br>Hasil perkalian $x * $y = $z");
// pembagian
$z = $x / $y;
print("<br>Hasil pembagian $x / $y = $z");
?>
<!-- Variable Local dan Global -->
<?php 
// variable global
print("<h2>3. Variable Global dan Local</h2>");
$nama = "Ahmad Farisul Haq";
// variable local
function tampil_nama() {
    // mengambil variabel global
    global $nama;
    $nim = "200411100171";
    print("<br>Nama Saya : $nama <br>Nim : $nim");
}
// memanggil fungsi tampil_nama
tampil_nama();
?>
<!-- Modul IV PHP Looping -->
<?php
print("<h2>4. Modul IV PHP Looping</h2>");
$nama = "Ahmad Farisul Haq";
$nim = "200411100171";
print("Nama/NRP : $nama/$nim <br>");
for ($a = 1; $a <= 5; $a++) {
    print("Data ke : $a = $a <br>");
}
?>
<!-- Modul V PHP Kondisional -->
<?php 
print("<h2>5. Modul V PHP Kondisional</h2>");
$nama = "Ahmad Farisul Haq";
$nim = "200411100171";
print("Nama/NRP : $nama/$nim <br><br>");
// Fungsi Hari
function hari($hari) {
    if($hari == 1) {
        return "Senin";
    } else if($hari == 2) {
        return "Selasa";
    } else if($hari == 3) {
        return "Rabu";
    } else if($hari == 4) {
        return "Kamis";
    } else if($hari == 5) {
        return "Jumat";
    } else if($hari == 6) {
        return "Sabtu";
    } else {
        return "Minggu";
    } 
};
// Fungsi Bulan
function bulan($bulan) {
    if($bulan == 1) {
        return "Januari";
    } else if($bulan == 2) {
        return "Februari";
    } else if($bulan == 3) {
        return "Maret";
    } else if($bulan == 4) {
        return "April";
    } else if($bulan == 5) {
        return "Mei";
    } else if($bulan == 6) {
        return "Juni";
    } else if($bulan == 7) {
        return "Juli";
    } else if($bulan == 8) {
        return "Agustus";
    } else if($bulan == 9) {
        return "September";
    } else if($bulan == 10) {
        return "Oktober";
    } else if($bulan == 11) {
        return "November";
    } else {
        return "Desember";
    }
};
print("Sekarang Hari " . hari(date("N")) . " : Tanggal " . date("j") . " " . bulan(date("n")) . " " . date("Y"));
?>