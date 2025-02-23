<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Clients;
use App\Models\Services;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CarserviceController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('ListClients', [
            'data' => Clients::query()
                ->paginate($request->per_page)
                ->withQueryString()
                ->through(function ($client) {
                    return [
                        'id' => $client->id,
                        'name' => $client->name,
                        'card_number' => $client->card_number,

                    ];
                }),
            'filters' => $request->only(['search']),
        ]);
    }

    public function getClientCars($clientId)
    {
        $cars = Cars::where('client_id', $clientId)
            ->get()
            ->map(function ($car) {
                $latestService = Services::where('car_id', $car->id)
                    ->orderBy('log_number', 'desc')
                    ->first();

                return [
                    'car_id' => $car->id,
                    'type' => $car->type,
                    'registration_date' => $car->registered,
                    'is_own_brand' => $car->ownbrand,
                    'accident_count' => $car->accidents,
                    'service_log' => optional($latestService)->event,
                    'service_log_date' => optional($latestService)->event_time,
                ];
            });

        return response()->json($cars);
    }

    public function getCarServices($carId)
    {
        $services = Services::where('car_id', $carId)
            ->get()
            ->map(function ($service) {
                return [
                    'service_id' => $service->id,
                    'event' => $service->event,
                    'log_number' => $service->log_number,
                    'event_time' => $service->event_time ?? $service->car->registered,
                    'document_id' => $service->document_id,
                ];
            });

        return response()->json($services);
    }

    public function search(Request $request)
    {
        $query = Clients::query();

        if ($request->filled('clientName')) {
            $query->where('name', 'like', '%'.$request->clientName.'%');
            $clients = $query->get();

            if ($clients->count() > 1) {
                return Inertia::render('ListSearchResult', [
                    'data' => [],
                    'filters' => $request->only(['clientName', 'clientCardNumber']),
                    'error' => 'Több találat van a megadott névvel!',
                ]);
            }
        }

        if ($request->filled('clientCardNumber')) {
            $query->where('card_number', $request->clientCardNumber);
            $clients = $query->get();

            if ($clients->isEmpty()) {
                return Inertia::render('ListSearchResult', [
                    'data' => [],
                    'filters' => $request->only(['clientName', 'clientCardNumber']),
                    'error' => 'Nincs találat a megadott okmányazonosítóval!',
                ]);
            }
        }

        $clients = $query->paginate($request->per_page)->withQueryString();

        return Inertia::render('ListSearchResult', [
            'data' => $clients->through(function ($client) {
                return [
                    'id' => $client->id,
                    'name' => $client->name,
                    'card_number' => $client->card_number,
                    'car_count' => $client->cars->count(),
                    'service_count' => $client->services()->count(),
                ];
            }),
            'filters' => $request->only(['clientName', 'clientCardNumber']),
        ]);
    }
}
