<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Cars;

class CarsTableSeeder extends Seeder
{
    public function run()
    {
        $json = File::get(database_path('data/cars.json'));
        $data = json_decode($json, true);
        
        foreach ($data as $carData) {
            Cars::create([
                'id' => $carData['id'],
                'client_id' => $carData['client_id'],
                'car_id' => $carData['car_id'],
                'type' => $carData['type'],
                'registered' => $carData['registered'],
                'ownbrand' => $carData['ownbrand'],
                'accidents' => $carData['accident'],
            ]);
        }
    }
}