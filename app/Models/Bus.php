<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model{
    protected $table = 'buses';

    public function routes(){
        return $this->hasMany(Ride::class, 'bus');
    }

    public function seats(){
        return $this->hasMany(Seat::class, 'bus');
    }
}