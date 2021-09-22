<?php

declare(strict_types=1);

namespace CmsBundle\Block;

use DateTime;

class CmsAboutView extends CmsView
{
    public function getYearsOfExperience(): int
    {
        $startDate   = (DateTime::createFromFormat('Y-m-d H:i:s', '2011-01-01 00:00:00'));
        $currentDate = (new DateTime);
        $interval    = $startDate->diff($currentDate);
        return (int) $interval->format('%y');
    }
}
