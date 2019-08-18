<?php
namespace App\Twig;

use App\Utils\DateUtils;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('minutesBlocNumber', [$this, 'minutesBlocNumber']),
            new TwigFilter('toMinutesSince', [$this, 'toMinutesSince']),
            new TwigFilter('toMinutes', [$this, 'toMinutes']),
        ];
    }

    public function minutesBlocNumber(\App\Entity\SportPlanning $sportPlanning,int $minutesInterval)
    {
        $dateUtils = new DateUtils();
        return $dateUtils->getMinutesInterval($sportPlanning->getEnd(),$sportPlanning->getStart()) / $minutesInterval;
    }

    public function toMinutesSince(\DateTime $dateTime,\DateTime $since)
    {
        $dateUtils = new DateUtils();
        return $dateUtils->getMinutes($dateTime) - $dateUtils->getMinutes($since);
    }
    public function toMinutes(\DateTime $dateTime)
    {
        $dateUtils = new DateUtils();
        return $dateUtils->getMinutes($dateTime) ;
    }
}