<?php

namespace App\Providers;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        Model::unguard();

        FilamentAsset::registerScriptData([
                'ip' => request()->ip()
        ]);

        FilamentAsset::register([
            AlpineComponent::make('map-box', __DIR__ . '/../../resources/js/dist/components/map-box.js'),
            Css::make('map-box', __DIR__ . '/../../resources/js/dist/components/map-box.css'),
        ]);
    }
}
