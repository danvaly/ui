<?php

namespace Laravel\Ui;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;

class ControllersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ui:controllers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scaffold the authentication controllers';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (! is_dir($directory = app_path('Http/Controllers/Auth'))) {
            mkdir($directory, 0755, true);
        }

        $filesystem = new Filesystem;

        collect($filesystem->allFiles(__DIR__.'/../stubs/Auth'))
            ->each(function (SplFileInfo $file) use ($filesystem) {
                $filesystem->copy(
                    $file->getPathname(),
                    app_path('Http/Controllers/Auth/'.Str::replaceLast('.stub', '.php', $file->getFilename()))
                );
            });

        $this->info('Authentication scaffolding generated successfully.');

        if (! is_dir($directory = app_path('Http/Controllers/View/Components/Form'))) {
            mkdir($directory, 0755, true);
        }

        if (! is_dir($directory = app_path('Http/View/Components/Form'))) {
            mkdir($directory, 0755, true);
        }

        collect($filesystem->allFiles(__DIR__.'/../stubs/View/Components/Form'))
            ->each(function (SplFileInfo $file) use ($filesystem) {
                $filesystem->copy(
                    $file->getPathname(),
                    app_path('Http/View/Components/Form/'.Str::replaceLast('.stub', '.php', $file->getFilename()))
                );
            });

        $this->info('Components scaffolding generated successfully.');
    }
}
