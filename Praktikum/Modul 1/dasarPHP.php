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
function hari($ind) {
    $hari = array(
        1 => "Senin",
        "Selasa",
        "Rabu",
        "Kamis",
        "Jumat",
        "Sabtu",
        "Minggu"
    );
    return $hari[$ind];
};
// Fungsi Bulan
function bulan($ind) {
    $bulan = array(
        1 => "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember"
    );
    return $bulan[$ind];
};
print("Sekarang Hari " . hari(date("N")) . " : Tanggal " . date("j") . " " . bulan(date("n")) . " " . date("Y"));
?>