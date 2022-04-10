<?php 
    function hari($ind) {
        if($ind = 5){
            return "Jumat";
        }else if($ind = 6){
            return "Sabtu";
        }else{
            return "Minggu";
        }
    }
    function bulan($ind) {
        if($ind = 4 ){
            return "April";
        }else if($ind = 5){
            return "Mei";
        } else{
            return "Desember";
        }
    }

    print("Sekarang Hari " . hari(date('N')) . " : Tanggal " . date('j') . " " . bulan(date('n')) . " " . date('Y'))
?>