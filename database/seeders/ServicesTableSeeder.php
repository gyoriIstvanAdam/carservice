<?php

namespace Database\Seeders;

use App\Models\Services;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ServicesTableSeeder extends Seeder
{
    public function run()
    {
        $json = File::get(database_path('data/services.json'));
        $data = json_decode($json, true);

        foreach ($data as $serviceData) {
            Services::create([
                'id' => $serviceData['id'],
                'client_id' => $serviceData['client_id'],
                'car_id' => $serviceData['car_id'],
                'log_number' => $serviceData['lognumber'],
                'event' => $serviceData['event'],
                'event_time' => $serviceData['eventtime'],
                'document_id' => $serviceData['document_id'],
            ]);
        }
    }
}
