<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Reservation;

class Customer extends Model
{
    use HasFactory, HasApiTokens;

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

}
