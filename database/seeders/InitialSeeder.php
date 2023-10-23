<?php

namespace Database\Seeders;

use App\Imports\CustomerImport;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $telemarketers0 = [
            User::create([
                'name' => 'William Icaza',
                'email' => 'william@gmail.com',
                'password' => bcrypt('william'),
                'current_role_id' => 4,
            ]),
            User::create([
                'name' => 'Maria de los Angeles',
                'email' => 'maria@gmail.com',
                'password' => bcrypt('maria'),
                'current_role_id' => 4,
            ]),
            User::create([
                'name' => 'Kevin',
                'email' => 'kevin@gmail.com',
                'password' => bcrypt('kevin'),
                'current_role_id' => 4,
            ]),
            User::create([
                'name' => 'Byron Quintanilla',
                'email' => 'byron@gmail.com',
                'password' => bcrypt('byron'),
                'current_role_id' => 4,
            ]),
            User::create([
                'name' => 'Vanessa',
                'email' => 'vanessa@gmail.com',
                'password' => bcrypt('vanessa'),
                'current_role_id' => 4,
            ]),
        ];

        $telemarketers1 = [
            User::create([
                'name' => 'Alfredo Monjaret',
                'email' => 'alfredo@gmail.com',
                'password' => bcrypt('alfredo'),
                'current_role_id' => 6,
            ]),
            User::create([
                'name' => 'Tony Car',
                'email' => 'tony@gmail.com',
                'password' => bcrypt('tony'),
                'current_role_id' => 6,
            ]),
        ];

        $vendedores = [
            User::create([
                'name' => 'EZ Solar',
                'email' => 'ezsolar@gmail.com',
                'password' => bcrypt('ezsolar'),
                'current_role_id' => 3,
            ]),
            User::create([
                'name' => 'EZ Solar 2',
                'email' => 'ezsolar2@gmail.com',
                'password' => bcrypt('ezsolar2'),
                'current_role_id' => 3,
            ]),
        ];
        $teams = [
            Team::create(['name' => 'Indepentiente', 'manager_id' => $vendedores[0]->id]),
            Team::create(['name' => 'Alfredo\'s Team', 'manager_id' => $vendedores[1]->id]),
        ];

        // $teams[0]->manager()->associate($vendedores[0]);
        // $teams[1]->manager()->associate($vendedores[0]);

        foreach ($telemarketers0 as $key => $item){
            $teams[0]->users()->attach($item->id, ['role' => 'independant']);
            $item->currentTeam()->associate($teams[0]);
            $item->save();
        }
        foreach ($telemarketers1 as $key => $item){
            $teams[1]->users()->attach($item->id, ['role' => 'collaborator']);
            $item->currentTeam()->associate($teams[1]);
            $item->save();
        }

        // Excel::import(new CustomerImport, storage_path('customers.xlsx'));
    }
}
