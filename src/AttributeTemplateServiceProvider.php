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
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'dnd5emonster');

        $this->loadTranslationsFrom(realpath(__DIR__.'/../publishable/lang'), 'dnd5emonster');


        // Assets
        $this->publishes([
            __DIR__.'/../publishable/assets' => public_path('vendor/dnd5emonster'),
        ], 'dnd5emonster');

        // Config
        $this->publishes([
            __DIR__.'/../publishable/config/dnd5emonster.php' => config_path('dnd5emonster.php'),
        ]);
        $this->mergeConfigFrom(
            __DIR__.'/../publishable/config/dnd5emonster.php', 'dnd5emonster'
        );

        // Translations
        $this->loadTranslationsFrom(__DIR__.'/../publishable/lang', 'dnd5emonster');

        $this->publishes([
            __DIR__.'/../publishable/lang' => resource_path('lang/vendor/dnd5emonster'),
        ]);
    }
}