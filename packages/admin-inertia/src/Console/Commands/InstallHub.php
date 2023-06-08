<?php

namespace Lunar\Hub\Inertia\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Lunar\Hub\Models\Staff;

class InstallHub extends Command
{
    protected $publishArguments = [
        [
            '--tag' => 'lunar',
            '--provider' => 'Lunar\Hub\AdminHubServiceProvider',
        ],
        [
            '--tag' => 'lunar.hub.public',
            '--provider' => 'Lunar\Hub\Inertia\AdminHubServiceProvider',
            '--force' => true,
        ],
    ];

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
        foreach ($this->publishArguments as $arguments) {
            $this->callSilently('vendor:publish', $arguments);
        }

        // Update Configuration...
        $this->replaceInFile("'stack' => 'livewire'", "'stack' => 'inertia'", config_path('lunar-hub/system.php'));

        if (! Staff::whereAdmin(true)->exists()) {
            $this->info('Create an admin user');

            $firstname = $this->ask('Whats your first name?');
            $lastname = $this->ask('Whats your last name?');
            $email = $this->ask('Whats your email address?');
            $password = $this->secret('Enter a password');

            Staff::create([
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'password' => bcrypt($password),
                'admin' => true,
            ]);
        }
    }

    /**
     * Replace a given string within a given file.
     */
    protected function replaceInFile(string $search, string $replace, string $path): void
    {
        file_put_contents($path, str_replace($search, $replace, file_get_contents($path)));
    }
}
