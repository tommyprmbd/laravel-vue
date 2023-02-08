<?php
use App\Models\Product;

	function convert_date($value) {
		return date('H:i:s - d M Y', strtotime($value));
	}

	function menghitung_data() {
		return Transaction::where('status','=','belum')->count();
	}

	function tambah_no_didepan($value, $threshold = null){
		return sprintf("%0". $threshold . "s", $value);
	}
?>