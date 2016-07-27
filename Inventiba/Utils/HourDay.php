<?php

class Inventiba_Utils_HourDay {

   public static function getHourDay($day) {
      
      $dtNow = new DateTime();
// Set a non-default timezone if needed
      $dtNow->setTimezone(new DateTimeZone('America/New_York'));
      $dtNow->setTimestamp($day);

      $beginOfDay = clone $dtNow;

// Go to midnight.  ->modify('midnight') does not do this for some reason
      $beginOfDay->modify('today');

      $endOfDay = clone $beginOfDay;
      $endOfDay->modify('tomorrow');
// adjust from the next day to the end of the day, per original question
      $endOfDay->modify('1 second ago');

      $day = array(
          'time' => $dtNow->format('Y-m-d H:i:s'),
          'start' => $beginOfDay->format('Y-m-d H:i:s'),
          'end' => $endOfDay->format('Y-m-d H:i:s'),
      );
      return $day;
   }

}
