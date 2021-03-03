<?php
function terbilang($nilai){
	$nilai = abs($nilai);
	$huruf = array("","satu","dua","tiga","empat","lima","enam","tujuh","delapan","sembilan","sepuluh","sebelas");

	$ksg = "";

	if($nilai < 12){
		$ksg = " ".$huruf[$nilai];
	}else if($nilai < 20){
		$ksg = terbilang($nilai - 10)." belas";
	}else if($nilai < 100){
		$ksg = terbilang($nilai / 10)." puluh ".terbilang($nilai % 10);
	}else if($nilai <200){
		$ksg = " seratus".terbilang($nilai - 100);
	}else if($nilai < 1000){
		$ksg = terbilang($nilai / 100). " ratus ".terbilang($nilai % 100);
	}else if($nilai < 2000){
		$ksg = " seribu".terbilang($nilai - 1000);
	}else if($nilai < 1000000){
		$ksg = terbilang($nilai / 1000)." ribu".terbilang($nilai % 1000);
	}else if($nilai < 1000000000){
		$ksg = terbilang($nilai / 1000000). " juta".terbilang($nilai % 1000000);
	}else if ($nilai < 1000000000000) {
		$ksg = terbilang($nilai/1000000000) . " milyar" . terbilang(fmod($nilai,1000000000));
	} else if ($nilai < 1000000000000000) {
		$ksg = terbilang($nilai/1000000000000) . " trilyun" . terbilang(fmod($nilai,1000000000000));
	}  

	return $ksg;
}

function sebut($nilai){
	if($nilai < 0){
		$hasil = "minus ".trim(terbilang($nilai));
	}else{
		$hasil = trim(terbilang($nilai));
	}

	return $hasil;
}
