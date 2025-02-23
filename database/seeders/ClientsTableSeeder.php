<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Clients;

class ClientsTableSeeder extends Seeder
{
    public function run()
    {
        $json = File::get(database_path('data/clients.json'));
        $data = json_decode($json, true);
        
        $mappedData = array_map(function ($client) {
            return [
                'id' => $client['id'],
                'name' => $client['name'],
                'card_number' => $client['idcard'],
            ];
        }, $data);
        
        foreach ($mappedData as $clientData) {
            Clients::create($clientData);
        }
    }
}