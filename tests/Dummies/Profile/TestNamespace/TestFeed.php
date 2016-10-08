<?php

namespace ArtisanCMS\Widgets\Test\Dummies\Profile\TestNamespace;

use ArtisanCMS\Widgets\AbstractWidget;

class TestFeed extends AbstractWidget
{
    protected $slides = 6;

    public function run()
    {
        return 'Feed was executed with $slides = '.$this->slides;
    }
}
