<?php

namespace ArtisanCMS\Widgets\Test\Dummies;

use ArtisanCMS\Widgets\AbstractWidget;

class Slider extends AbstractWidget
{
    protected $config = [
        'slides' => 6,
        'foo'    => 'bar',
    ];

    public function run()
    {
        return 'Slider was executed with $slides = '.$this->config['slides'].' foo: '.$this->config['foo'];
    }

    public function placeholder()
    {
        return 'Placeholder here!';
    }
}
