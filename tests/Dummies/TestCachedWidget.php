<?php

namespace ArtisanCMS\Widgets\Test\Dummies;

use ArtisanCMS\Widgets\AbstractWidget;

class TestCachedWidget extends AbstractWidget
{
    public $cacheTime = 60;

    protected $slides = 6;

    public function run()
    {
        return 'Feed was executed with $slides = '.$this->slides;
    }
}
