<?php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('minutesBlocNumber', [$this, 'minutesBlocNumber']),
        ];
    }

    public function minutesBlocNumber(\App\Entity\SportPlanning $sportPlanning,int $minutesInterval)
    {
        $startDateTime = $sportPlanning->getStart()->format("H:i");
        $endDateTime = $sportPlanning->getEnd()->format("H:i");

        sscanf($startDateTime,"%d:%d", $startHours, $startMinutes);
        sscanf($endDateTime,"%d:%d", $endHours, $endMinutes);

        $startMinutes = intval($startHours) * 60 + intval($startMinutes);
        $endMinutes = intval($endHours) * 60 + intval($endMinutes);
        return ($endMinutes - $startMinutes) / $minutesInterval;
    }
}