<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AppReinstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reinstall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reinstalling application, THIS COMMAND WILL WIPE ALL YOUR DATA.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->confirm('Are you sure you want to reinstall this application? You will lose all data stored in the database!')) {

            // Reset migration
            echo 'Reseting DB...'.PHP_EOL;
            $this->call('migrate:reset');
            echo 'Done.'.PHP_EOL.PHP_EOL;

            // Re-install app again
            $this->call('app:install');
        }
    }
}
