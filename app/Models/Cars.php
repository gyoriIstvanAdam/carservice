<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'id',
        'client_id',
        'car_id',
        'type',
        'registered',
        'ownbrand',
        'accidents',
    ];

    public function client()
    {
        return $this->belongsTo(Clients::class);
    }

    public function services()
    {
        return $this->hasMany(Services::class, 'car_id', 'id');
    }
}
