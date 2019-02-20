<?php

namespace Kanka\Dnd5eMonster;

use Illuminate\Support\ServiceProvider;

class AttributeTemplateServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/resources', 'dnd5emonster');

        $this->loadViewsFrom(__DIR__.'/resources/views', 'dnd5emonster');

        // Assets
        $this->publishes([
            __DIR__.'/resources/assets' => public_path('vendor/dnd5emonster'),
        ], 'public');

        // Config
        $this->publishes([
            __DIR__.'/config/config/dnd5emonster.php' => config_path('dnd5emonster.php'),
        ]);
    }
}