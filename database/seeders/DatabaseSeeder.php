<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Team;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $team = Team::create(['name' => 'Team principal']);
        $user = \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);
        $roles = [
            Role::create(['name' => 'Admin']),
            Role::create(['name' => 'Main Salesman']),
            Role::create(['name' => 'Salesmen']),
            Role::create(['name' => 'Independiente']),
            Role::create(['name' => 'Team Supervisor']),
            Role::create(['name' => 'Team Collabotator']),
        ];
        $user->currentRole()->associate($roles[0]);
        $user->save();
        $this->call([
            InitialSeeder::class,
        ]);
    }
}
