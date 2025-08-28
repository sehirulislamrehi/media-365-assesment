<?php

namespace App\Providers;

use App\Models\UserModule\Module;
use App\Services\Backend\Modules\UserModule\Module\ModuleService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('backend.includes.left_sidebar', function ($view) {
            $cacheKey = "sidebarModules";
            $modules = cache()->rememberForever($cacheKey, function () {
                $moduleService = app(ModuleService::class);
                return $moduleService->getAllModuleForLeftSideBar();
            });

            $view->with('sidebarModules', $modules);

        });

    }
}
