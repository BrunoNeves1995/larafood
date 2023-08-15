<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenant = Tenant::first();

        $tenant->users()->create([
            'name' => 'Bruno Neves',
            'email' => 'nevesbruno814@gmail.com',
            'password' => bcrypt('12345'),
        ]);
    }
}
