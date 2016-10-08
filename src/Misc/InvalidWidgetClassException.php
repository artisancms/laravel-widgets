<?php

namespace ArtisanCMS\Widgets\Misc;

use Exception;

class InvalidWidgetClassException extends Exception
{
    /**
     * Exception message.
     *
     * @var string
     */
    protected $message = 'Widget class must extend ArtisanCMS\Widgets\AbstractWidget class';
}
