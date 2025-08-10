<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Property;
use App\Models\Unit;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $property = Property::create([
            'name' => 'Demo Plaza',
            'address' => '123 Main St',
            'currency' => 'USD',
            'tax_rate' => 5,
        ]);

        Unit::create([
            'property_id' => $property->id,
            'code' => 'A1',
            'floor' => '1',
            'area_m2' => 100,
            'status' => 'vacant',
        ]);
    }
}
