<?php

namespace ArtisanCMS\Widgets\Test\Dummies;

use ArtisanCMS\Widgets\AbstractWidget;

class TestWidgetWithParamsInRun extends AbstractWidget
{
    public function run($flag)
    {
        return 'TestWidgetWithParamsInRun was executed with $flag = '.$flag;
    }

    public function placeholder()
    {
        return 'Placeholder here!';
    }
}
