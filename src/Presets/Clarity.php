<?php

namespace Laravel\Ui\Presets;

class Clarity extends Preset
{
    /**
     * Install the preset.
     *
     * @return void
     */
    public static function install()
    {
        static::updatePackages();
        static::updateSass();
        static::updateBootstrapping();
        static::removeNodeModules();
    }

    /**
     * Update the given package array.
     *
     * @param  array  $packages
     * @return array
     */
    protected static function updatePackageArray(array $packages)
    {
        return [
            'bootstrap' => '^4.0.0',
            'jquery' => '^3.2',
            'popper.js' => '^1.12',
        ] + $packages;
    }

    /**
     * Update the Sass files for the application.
     *
     * @return void
     */
    protected static function updateSass()
    {
        copy(__DIR__.'/clarity-stubs/_variables.scss', resource_path('sass/_variables.scss'));
        copy(__DIR__.'/clarity-stubs/app.scss', resource_path('sass/app.scss'));
    }

    /**
     * Update the bootstrapping files.
     *
     * @return void
     */
    protected static function updateBootstrapping()
    {
        copy(__DIR__.'/clarity-stubs/clarity.js', resource_path('js/clarity.js'));
    }
}
