<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $table = 'Services';

    protected $fillable = [
        'client_id',
        'car_id',
        'type',
        'event',
        'log_number',
        'event_time',
        'document_id',
    ];

    public function client()
    {
        return $this->belongsTo(Clients::class);
    }

    public function car()
    {
        return $this->belongsTo(Cars::class, 'car_id', 'id');
    }
}
