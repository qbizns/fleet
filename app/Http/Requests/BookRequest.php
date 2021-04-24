<?php
namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class BookRequest extends FormRequest{
    public function rules(){
        return [
            'name'              => 'required | string',
            'departure_place'   => 'required | int | exists:cities,id',
            'arrival_place'     => 'required | int | exists:cities,id',
            'bus'               => 'required | int | exists:buses,id',
            'seat'              => 'required | int | exists:seats,id',
        ];
    }

    public function messages(){
        return [
            'name.required' => trans('booking.username_required')
        ];
    }

    protected function failedValidation(Validator $validator): JsonResponse{
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(
            response()->json(['errors' => $errors], JsonResponse::HTTP_BAD_REQUEST)
        );
    }
}