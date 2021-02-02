<?php

namespace App\Console\Commands;

use Faker\Factory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Users';

    protected $connection = 'mongodb';

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
     * @return int
     */
    public function handle()
    {
        $faker = Factory::create();
        $limit = 100;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => $faker->password(10),
            ]);
        }
        $this->line("command is runnig");
        return 0;
    }
}
