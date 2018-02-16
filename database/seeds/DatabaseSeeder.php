<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = ['users',''];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment() === 'production') {
            exit('I just stopped you getting fired. Can be overriden using --env attribute');
        }

        if (App::environment() !== 'testing') {
            $this->truncateTables();
        }
        Model::unguard();

        // Your Seed Code goes here ...
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(EventsTableSeeder::class);

        Model::reguard();
    }

    public function truncateTables()
    {
        $dbName = 'heroku_4999b4dc8795c41'; //env('DB_DATABASE');
        // Get all tables list, except migrations table
        $tables = DB::select('SHOW TABLES WHERE `Tables_in_' . $dbName . '` != ?', ['migrations']);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        foreach ($tables as $table) {
            DB::table($table->{'Tables_in_' . $dbName})->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
