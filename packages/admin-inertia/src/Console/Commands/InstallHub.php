<?php

namespace Lunar\Hub\Inertia\Console\Commands;

use Illuminate\Console\Command;

class InstallHub extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lunar:hub:install-inertia';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install hub dependancies';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Publishing assets to public folder.');
    }
}
