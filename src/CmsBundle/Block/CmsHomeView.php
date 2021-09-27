<?php

declare(strict_types=1);

namespace CmsBundle\Block;

class CmsHomeView extends CmsView
{
    public function getEpisodes(): array
    {
        return [
            [
                'title'    => '002 - Hyvä: The Magento 2 frontend revolution!',
                'link'     => $this->getUrl('episode/002-hyva-the-magento-2-frontend-revolution'),
                'date'     => '09/27/2021',
                'duration' => '14:48s',
            ],
            [
                'title'    => '001 - Your contribution is important to the Magento Community',
                'link'     => $this->getUrl('episode/001-your-contribution-is-important-to-the-magento-community'),
                'date'     => '09/23/2021',
                'duration' => '9:18s',
            ],
            [
                'title'    => '000 - Introduction',
                'link'     => $this->getUrl('episode/000-introduction'),
                'date'     => '09/23/2021',
                'duration' => '2:07s',
            ],
        ];
    }
}
