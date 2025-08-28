<?php

namespace App\Providers\Modules\UserModule;

use App\Interfaces\Modules\UserModule\FileProcessing\FileProcessingInterface;
use App\Interfaces\Modules\UserModule\Module\ModuleInterface;
use App\Interfaces\Modules\UserModule\Role\RoleInterface;
use App\Interfaces\Modules\UserModule\User\ReadUserInterface;
use App\Interfaces\Modules\UserModule\User\WriteUserInterface;
use App\Repositories\Modules\UserModule\FileProcessing\FileProcessingRepository;
use App\Repositories\Modules\UserModule\Module\ModuleRepository;
use App\Repositories\Modules\UserModule\Role\RoleRepository;
use App\Repositories\Modules\UserModule\User\ReadUserRepository;
use App\Repositories\Modules\UserModule\User\WriteUserRepository;
use Illuminate\Support\ServiceProvider;

class UserModuleServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Registering the UserModule repositories
        $this->app->singleton(
            ReadUserInterface::class,
            ReadUserRepository::class
        );
        $this->app->singleton(
            WriteUserInterface::class,
            WriteUserRepository::class
        );
        $this->app->singleton(
            RoleInterface::class,
            RoleRepository::class
        );
        $this->app->singleton(
            ModuleInterface::class,
            ModuleRepository::class
        );
        $this->app->singleton(
            FileProcessingInterface::class,
            FileProcessingRepository::class
        );
    }
}
