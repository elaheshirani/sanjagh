<?php

namespace App\Console\Commands;

use App\Models\User;
use Faker\Factory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:user {id} {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update User';

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
        $user = User::find($this->argument('id'));
        $user->name = $this->argument('name');
        $user->save();
        $this->line("User updated successfully.");
    }
}
