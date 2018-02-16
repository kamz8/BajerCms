<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = factory(App\Event::class, 20)
            ->create()
            ->each(function ($u) {
                $u->user()->save(factory(App\User::class)->make());
            });
    }
}
