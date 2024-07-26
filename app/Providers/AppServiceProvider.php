<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\IEstrategiaWmsService;
use App\Services\EstrategiaWmsService;
use App\Models\EstrategiaWms;
use App\Models\EstrategiaWmsHorarioPrioridade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IEstrategiaWmsService::class, function ($app) {
            return new EstrategiaWmsService(
                $app->make(EstrategiaWms::class),
                $app->make(EstrategiaWmsHorarioPrioridade::class)
            );
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
