<?php

namespace ArtisanCMS\Widgets;

class AsyncFacade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return 'artisancms.async-widget';
    }
}
