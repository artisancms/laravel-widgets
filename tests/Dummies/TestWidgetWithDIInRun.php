<?php

namespace ArtisanCMS\Widgets\Test\Dummies;

use ArtisanCMS\Widgets\AbstractWidget;

class TestWidgetWithDIInRun extends AbstractWidget
{
    public function run(TestMyClass $class)
    {
        return $class->foo;
    }

    public function placeholder()
    {
        return 'Placeholder here!';
    }
}

class TestMyClass
{
    public $foo = 'bar';
}
