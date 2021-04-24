<?php

namespace App\Repository;

use App\Models\Bus;
use App\Models\Ride;
use App\Models\Reservation;
use App\Models\Seat;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class BusRepository{
    public function getRides(int $bus, int $departure_place, int $arrival_place): Collection{
        $departure = Ride::query()
                            ->where('departure_place', $departure_place)
                            ->where('bus', $bus)
                            ->firstOrFail();
        $arrival = Ride::query()
                            ->where('arrival_place', $arrival_place)
                            ->where('bus', $bus)
                            ->firstOrFail();
        return Ride::query()
                            ->where('bus', request()->get('bus'))
                            ->whereBetween('order', [$departure->order, $arrival->order])
                            ->get()
                            ->pluck('id');
    }

    public function getAvailableSeats(int $bus, int $departure_place, int $arrival_place){
        $busID = (int)request()->query('bus');
        $Rides = $this->getRides($bus, $departure_place, $arrival_place);
        $bookedSeats = Reservation::query()->whereHas('trips', static function (Builder $query) use ($Rides) {
                                        $query->wherein('route', $Rides);
                                    })
                                    ->get()
                                    ->pluck('seat')->toArray();
        $seats = Seat::query()
                            ->where('bus', $busID)
                            ->select(['id', 'seet_id'])
                            ->get();
        $seatsData = [];
        foreach($seats as $key => $seat){
            $seat['available'] = true;
            if(in_array($seat['id'], $bookedSeats)){
                $seat['available'] = false;
            }
            $seatsData[$key] = $seat;
        }
        return $seatsData;
    }

    public function isSeatAvailable(int $bus, int $seat, int $departure_place, int $arrival_place): bool{
        $Rides = $this->getRides($bus, $departure_place, $arrival_place);
        $bookedCount = Reservation::query()
                                    ->where('seat', $seat)
                                    ->whereHas('trips', static function (Builder $query) use ($Rides) {
                                        $query->wherein('route', $Rides);
                                    })->count();
        return $bookedCount < 1;
    }
    
    public function ListBuses(): Collection{
        return Bus::with([
            'routes:id,bus,departure_place,arrival_place,order', 
            'routes.departurePlace:id,title', 
            'routes.arrivalPlace:id,title', 
            'seats:id,seet_id,bus'
        ])->select(['id', 'title', 'places_available'])->get();
    }
}