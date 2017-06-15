<?php
namespace Hello;

use Hello\OpenApi\Buzz;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class BuzzServiceProvider extends LaravelServiceProvider
{
    /**
     * 延迟加载.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the provider.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the provider.
     *
     * @return void
     */
    public function register()
    {
        //在这里还可以做一些业务初始化
        $this->app->singleton(Buzz::class, function ($laravelApp) {
            $app = new Buzz;
            return $app;
        });
        $this->app->alias(Buzz::class, 'Buzz');
    }

    /**
     * 提供的服务
     *
     * @return array
     */
    public function provides()
    {
        return ['Buzz', Buzz::class];
    }
}
