<?php

namespace ArtisanCMS\Widgets\Test;

use ArtisanCMS\Widgets\Test\Support\TestApplicationWrapper;
use ArtisanCMS\Widgets\Test\Support\TestCase;
use ArtisanCMS\Widgets\WidgetGroup;
use ArtisanCMS\Widgets\WidgetGroupCollection;

class WidgetGroupCollectionTest extends TestCase
{
    /**
     * @var WidgetGroupCollection
     */
    protected $collection;

    public function setUp()
    {
        $this->collection = new WidgetGroupCollection(new TestApplicationWrapper());
    }

    public function testItGrantsAccessToWidgetGroup()
    {
        $groupObject = $this->collection->group('sidebar');

        $expectedObject = new WidgetGroup('sidebar', new TestApplicationWrapper());

        $this->assertEquals($expectedObject, $groupObject);
    }
}
