<?php

namespace ArtisanCMS\Widgets\Test\Dummies;

use ArtisanCMS\Widgets\AbstractWidget;

class Exception extends AbstractWidget
{
    public function run()
    {
        return 'Exception widget was executed instead of predefined php class';
    }
}
