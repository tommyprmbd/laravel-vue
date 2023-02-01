<?php
use App\Models\Transaction;

	function convert_date($value) {
		return date('H:i:s - d M Y', strtotime($value));
	}

	function menghitung_data() {
		return Transaction::where('status','=','belum')->count();
	}

?>