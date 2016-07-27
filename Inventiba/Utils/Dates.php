<?php

class Inventiba_Utils_Dates {

    public function toDate($timeStamp) {
        return $date = date("d/m/Y", $timeStamp);
    }

    public function formatDayNew($date) {
        $day = date("l", $date);
        $mounth = date("F", $date);
        $d=date("j",$date);
        $year=date("o",$date);
        $format = $day . ", ".$mounth." ".$d.", ".$year;
        return $format;
    }

}

?>
