<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubscriptionType;

class SubscriptionTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubscriptionType::create([
            'name' => 'Abone e Pergjithshme',
            'price' => 600,
            'description' => 'Abone e Pergjithshme',
            'duration_in_days' => 30,
            'role_id' => 2,
        ]);

        SubscriptionType::create([
            'name' => 'Abone e Pergjithshme Premium',
            'price' => 1000,
            'description' => 'Abone e Pergjithshme Premium',
            'duration_in_days' => 90,
            'role_id' => 2,
        ]);

        SubscriptionType::create([
            'name' => 'Abone Studenti',
            'price' => 400,
            'description' => 'Abone e Studenti',
            'duration_in_days' => 30,
            'role_id' => 3,
        ]);

        SubscriptionType::create([
            'name' => 'Abone Studenti Premium',
            'price' => 700,
            'description' => 'Abone Studenti Premium',
            'duration_in_days' => 90,
            'role_id' => 3,
        ]);

        SubscriptionType::create([
            'name' => 'Abone Pensionisti',
            'price' => 200,
            'description' => 'Abone Pensionisti',
            'duration_in_days' => 30,
            'role_id' => 4,
        ]);

        SubscriptionType::create([
            'name' => 'Abone Pensionisti Premium',
            'price' => 350,
            'description' => 'Abone Pensionisti Premium',
            'duration_in_days' => 90,
            'role_id' => 4,
        ]);
    }
}
