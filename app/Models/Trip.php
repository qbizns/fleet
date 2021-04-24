<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model{
    protected $table = 'trips';
    protected $fillable = ['route', 'bus'];
}