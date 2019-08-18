<?php
/**
 * Created by PhpStorm.
 * User: mathisdelaunay
 * Date: 17/08/2019
 * Time: 12:03
 */

namespace App\Utils;


class DateUtils
{

    public function getMinutes($datetime) {
        $datetime = $datetime->format("H:i");
        sscanf($datetime,"%d:%d", $startHours, $startMinutes);
        $startMinutes = intval($startHours) * 60 + intval($startMinutes);
        return $startMinutes;
    }

    public function getMinutesInterval($firstDatetime, $secondDatetime) {
        return self::getMinutes($firstDatetime) - self::getMinutes($secondDatetime);
    }
}