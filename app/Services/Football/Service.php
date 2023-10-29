<?php 

namespace App\Services\Football;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class Service {

    public function data() {
        return Http::withHeaders([
            'X-RapidAPI-Host' => env('API_HEADER_HOST'),
            'X-RapidAPI-Key' => env('API_HEADER_KEY')
        ])->get(env('API_REQUEST_URL'), []);
    }
}