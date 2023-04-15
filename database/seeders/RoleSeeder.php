<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::query()
            ->create([
                'name' => 'Administrator',
                'description' => 'Default access level, can leave tributes, share media and stories',
            ])
            ->create([
                'name' => 'Guest',
                'description' => 'Can control all aspects of the website, including moderating content posted by '
                    .'others and changing website settings',
            ]);
    }
}
