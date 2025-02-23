<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'name',
        'card_number',
    ];

    public function cars()
    {
        return $this->hasMany(Cars::class, 'client_id');
    }

    public function services()
    {
        return $this->hasMany(Services::class, 'client_id');
    }
}
