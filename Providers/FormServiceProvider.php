<?php

namespace Modules\Form\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Modules\Form\Providers\Components\GroupFieldServiceProvider;
use Modules\Form\Providers\Components\HorizontalFieldServiceProvider;
use Modules\Form\Providers\Components\InlineFieldServiceProvider;
use Modules\Form\Providers\Components\LabelServiceProvider;
use Modules\Form\Providers\Components\NormalFieldServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Form';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'form';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerConfig();
        $this->registerPublicAssets();
        $this->registerTranslations();
        $this->registerViews();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(LabelServiceProvider::class);
        $this->app->register(HorizontalFieldServiceProvider::class);
        $this->app->register(GroupFieldServiceProvider::class);
        $this->app->register(InlineFieldServiceProvider::class);
        $this->app->register(NormalFieldServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(),
            [module_path($this->moduleName, 'Resources/views')]
        ), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [];
    }

    /**
     * Get the location of view paths on module
     *
     * @return array
     */
    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }

    /**
     * Register Asset Publish Exports on public folder
     *
     * @return void
     */
    public function registerPublicAssets()
    {
        $this->publishes([module_path($this->moduleName, 'Resources/assets') => public_path('modules/' . $this->moduleNameLower . '/assets'),
        ], $this->moduleNameLower . '-assets');
    }
}
