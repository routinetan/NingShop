<?php

namespace App\Providers;

use Illuminate\Support\Arr;
use SmallRuralDog\Admin\Middleware;

class MemberServiceProvider extends \SmallRuralDog\Admin\AdminServiceProvider
{

    protected $routeMiddleware = [
        'member.auth' =>Middleware\Authenticate::class,
        'member.log' => Middleware\LogOperation::class,
        'member.permission' => Middleware\Permission::class,
        'member.bootstrap' => Middleware\Bootstrap::class,
        'member.session' => Middleware\Session::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'member' => [
            'member.auth',
            'member.log',
            'member.bootstrap',
            'member.permission'
        ],
    ];
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/member/lang', 'member');
        $this->loadViewsFrom(__DIR__ . '/../../resources/member/views', 'member');
        if (file_exists($routes = app_path('member/routes.php'))) {
            $this->loadRoutesFrom($routes);
        }
        parent::boot();
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/member.php', 'member');

        $this->loadAdminAuthConfig();

        $this->registerRouteMiddleware();

        $this->commands($this->commands);


    }


    protected function loadAdminAuthConfig()
    {
        config(Arr::dot(config('admin.auth', []), 'auth.'));
    }


}
