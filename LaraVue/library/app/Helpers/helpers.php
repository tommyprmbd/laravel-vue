<?php 
	function convert_date($value) {
		return date('d M Y',strtotime($value));
	}

	function subtract_date($date1, $date2){
		$datetime1 = strtotime($date1);
		$datetime2 = strtotime($date2);

		$secs = $datetime2 - $datetime1;// == <seconds between the two times>
		$days = $secs / 86400;
		return $days;
	}
 ?>