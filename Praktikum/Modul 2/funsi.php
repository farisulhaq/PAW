<?php 
// fungsi enter
function enter() {
    print('<br>');
}
// fungsi nama
function nama($nama, $nim){
    echo "Nama/NIM : $nama/$nim";
}
// fungsi penjumlahan
function jumlah($a, $b) {
    return $a + $b;
}
// fungsi perkalian
function kali($a, $b) {
    return $a * $b;
}
// fungsi pembagian
function bagi($a, $b) {
    return $a / $b;
}
print("<h2>Modul V PHP Fungsi</h2>");
// Memanggil fungsi nama
nama("Ahmad Farisul Haq", "200411100171");
enter();
// Penjumlahan
print("Penjumlahan");
enter();
print("Jumlah X + Y = " . jumlah(6,6));
enter();
print("Jumlah X + Y = " . jumlah(3,6));
enter();
print("Jumlah X + Y = " . jumlah(1,6));
enter();
// Perkalian
print("Perkalian");
enter();
print("Perkalian X * Y = " .kali(1,2));
enter();
print("Perkalian X * Y = " .kali(3,2));
enter();
print("Perkalian X * Y = " .kali(4,2));
enter();
// Pembagian
print("Pembagian");
enter();
print("Pembagian X / Y = " . bagi(7,3));
enter();
print("Pembagian X / Y = " . bagi(9,2));
enter();
print("Pembagian X / Y = " . bagi(5,2));
enter();
?>