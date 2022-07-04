<?php

namespace Modules\Product\Providers;
use Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Modules\Product\Repositories\Contracts\ProductCategoryRepositoryInterface;
use Modules\Product\Repositories\ProductCategoryRepository;
use Modules\Product\Repositories\Contracts\ProductRepositoryInterface;
use Modules\Product\Repositories\ProductRepository;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * @var  string $moduleName
     */
    protected $moduleName = 'Product';

    /**
     * @var  string $moduleNameLower
     */
    protected $moduleNameLower = 'product';

    /**
     * Boot the application events.
     *
     * @return  void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));

        $this->app->singleton(ProductCategoryRepositoryInterface::class, ProductCategoryRepository::class);
        $this->app->singleton(ProductRepositoryInterface::class, ProductRepository::class);
    }

    /**
     * Register translations.
     *
     * @return  void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/Modules/'.$this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    /**
     * Register config.
     *
     * @return  void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower.'.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
        );
    }

    /**
     * Register views.
     *
     * @return  void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/Modules/'.$this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath,
        ], ['views', $this->moduleNameLower.'-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    private function getPublishableViewPaths()
    : array
    {
        $paths = [];
        foreach (Config::get('view.paths') as $path) {
            if (is_dir($path.'/Modules/'.$this->moduleNameLower)) {
                $paths[] = $path.'/Modules/'.$this->moduleNameLower;
            }
        }

        return $paths;
    }

    /**
     * Register the service provider.
     *
     * @return  void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return  array
     */
    public function provides()
    {
        return [];
    }
}
