<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Http\Controllers\Controller;
use App\Repository\busRepository;
use App\Http\Requests\BookRequest;
use App\Models\Reservation;

class BookingApi extends Controller{
    private $busRepository;

    public function __construct(){
        $this->busRepository = new busRepository();
    }

    public function buses(): JsonResponse{
        $listBuses = $this->busRepository->ListBuses();
        return new JsonResponse($listBuses, 200);
    }

    public function availableseats(): JsonResponse{
        $departure_place = (int)request()->query('departure_place');
        $arrival_place = (int)request()->query('arrival_place');
        $bus = (int)request()->query('bus');

        $data = $this->busRepository->getAvailableSeats($bus, $departure_place, $arrival_place);
        return new JsonResponse($data, 200);
    }

    public function booking(BookRequest $request): JsonResponse{
        $bus = (int)request()->post('bus');
        $seat = (int)request()->post('seat');
        $departure_place = (int)request()->post('departure_place');
        $arrival_place = (int)request()->post('arrival_place');
        $name = $request->post('name');
        $seatAvailable = $this->busRepository->isSeatAvailable($bus, $seat, $departure_place, $arrival_place);

        if (!$seatAvailable) {
            return new JsonResponse(['message' => trans('booking.unavailable_seat')], 400);
        }

        $Rides = $this->busRepository->getRides($bus, $departure_place, $arrival_place);

        if (!$Rides->count()) {
            throw new NotFoundHttpException(trans('booking.no_routes_matched'));
        }

        $reservation = new Reservation();
        $reservation->name = $name;
        $reservation->bus = $bus;
        $reservation->seat = $seat;
        $reservation->save();

        foreach ($Rides as $route) {
            $reservation->trips()->create([
                                        'route' => $route
                                    ]);
        }
        $reservation->save();

        return new JsonResponse(['message' => trans('booking.done')]);
    }
}