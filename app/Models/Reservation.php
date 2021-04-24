<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model{
    protected $table = 'reservations';
    protected $fillable = ['bus', 'name', 'seat', 'departure_place', 'arrival_place'];

    public function trips(){
        return $this->hasMany(Trip::class, 'reservation');
    }
}