<?php

namespace ArtisanCMS\Widgets;

class Facade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return 'artisancms.widget';
    }

    /**
     * Get the widget group object.
     *
     * @param $name
     *
     * @return WidgetGroup
     */
    public static function group($name)
    {
        return app('artisancms.widget-group-collection')->group($name);
    }
}
