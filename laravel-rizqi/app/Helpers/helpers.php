<?php 

    function FormatTanggal($value){
        return date('d M Y - H:i:s', strtotime($value));
    }

?>