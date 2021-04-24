<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ride extends Model{
    protected $table = 'rides';
    
    public function departurePlace(){
        return $this->belongsTo(City::class, 'departure_place');
    }

    public function arrivalPlace(){
        return $this->belongsTo(City::class, 'arrival_place');
    }

    public function bus(){
        return $this->belongsTo(Bus::class, 'bus');
    }
}