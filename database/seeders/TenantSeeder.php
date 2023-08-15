<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $plan = Plan::first();

        $plan->tenants()->create([
            'cnpj' => '04630343000190',
            'name' => 'MaisDelivery',
            'url' => 'MaisDelivery',
            'email' => 'nevesbruno@gmail.com',
        ]);
    }
}
