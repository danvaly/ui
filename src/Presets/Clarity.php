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
            '@clr/icons' => '^3.1.4',
            '@clr/ui' => '^3.1.4',
            '@webcomponents/custom-elements' => '^1.0.0',
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
        copy(__DIR__.'/clarity-stubs/bootstrap.js', resource_path('js/bootstrap.js'));
    }
}
