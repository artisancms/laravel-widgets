<?php

namespace ArtisanCMS\Widgets;

use ArtisanCMS\Widgets\Console\WidgetMakeCommand;
use ArtisanCMS\Widgets\Factories\AsyncWidgetFactory;
use ArtisanCMS\Widgets\Factories\WidgetFactory;
use ArtisanCMS\Widgets\Misc\LaravelApplicationWrapper;
use Illuminate\Console\AppNamespaceDetectorTrait;
use Illuminate\Support\Facades\Blade;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    use AppNamespaceDetectorTrait;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/config.php', 'laravel-widgets'
        );

        $this->app->bind('artisancms.widget', function () {
            return new WidgetFactory(new LaravelApplicationWrapper());
        });

        $this->app->bind('artisancms.async-widget', function () {
            return new AsyncWidgetFactory(new LaravelApplicationWrapper());
        });

        $this->app->singleton('artisancms.widget-group-collection', function () {
            return new WidgetGroupCollection(new LaravelApplicationWrapper());
        });

        $this->app->singleton('command.widget.make', function ($app) {
            return new WidgetMakeCommand($app['files']);
        });

        $this->commands('command.widget.make');

        $this->app->alias('artisancms.widget', 'ArtisanCMS\Widgets\Factories\WidgetFactory');
        $this->app->alias('artisancms.async-widget', 'ArtisanCMS\Widgets\Factories\AsyncWidgetFactory');
        $this->app->alias('artisancms.widget-group-collection', 'ArtisanCMS\Widgets\WidgetGroupCollection');
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('laravel-widgets.php'),
        ]);

        $routeConfig = [
            'namespace'  => 'ArtisanCMS\Widgets\Controllers',
            'prefix'     => 'artisancms',
            'middleware' => $this->app['config']->get('laravel-widgets.route_middleware', []),
        ];

        if (!$this->app->routesAreCached()) {
            $this->app['router']->group($routeConfig, function ($router) {
                $router->get('load-widget', 'WidgetController@showWidget');
            });
        }

        $omitParenthesis = version_compare($this->app->version(), '5.3', '<');

        Blade::directive('widget', function ($expression) use ($omitParenthesis) {
            $expression = $omitParenthesis ? $expression : "($expression)";

            return "<?php echo app('artisancms.widget')->run{$expression}; ?>";
        });

        Blade::directive('asyncWidget', function ($expression) use ($omitParenthesis) {
            $expression = $omitParenthesis ? $expression : "($expression)";

            return "<?php echo app('artisancms.async-widget')->run{$expression}; ?>";
        });

        Blade::directive('widgetGroup', function ($expression) use ($omitParenthesis) {
            $expression = $omitParenthesis ? $expression : "($expression)";

            return "<?php echo app('artisancms.widget-group-collection')->group{$expression}->display(); ?>";
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['artisancms.widget', 'artisancms.async-widget'];
    }
}
