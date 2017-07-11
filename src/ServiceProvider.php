<?php

namespace Reaction\SymlinkFaker;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $configPath = __DIR__ . '/../config/symlink-faker.php';
        $this->mergeConfigFrom($configPath, 'symlink-faker');
    }

    protected function shouldUse()
    {
        if ($this->app['config']->get('symlink-faker.enabled')) {
            $environments = $this->app['config']->get('symlink-faker.environments');
            if (count($environments)) {
                return in_array(app()->environment(), $environments);
            }

            return true;
        }

        return false;
    }

    public function boot()
    {
        $configPath = __DIR__ . '/../config/symlink-faker.php';
        $this->publishes([$configPath => config_path('symlink-faker.php')], 'config');

        if ($this->shouldUse()) {
            $routeConfig = [
                'namespace' => 'Reaction\SymlinkFaker\Controllers',
                'prefix' => $this->app['config']->get('symlink-faker.folder')
            ];

            $this->app['router']->group($routeConfig, function($router) {
                $router->get('/{symlinkFaker}', [
                    'uses' => 'SymlinkController@handle',
                    'as' => 'symlinkfaker.handle',
                ])->where('symlinkFaker', '.*');
            });
        }
    }
}