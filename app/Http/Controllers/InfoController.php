<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Football\Service;
use Illuminate\Support\Facades\Cache;

class InfoController extends Controller
{
    /**
     * @OA\GET(
     *     path="/api/football",
     *     summary="Get info match for football",
     *    
     *     @OA\Response(response="200", description="Successful"),
     *     @OA\Response(response="401", description="Invalid credentials")
     * )
     */
    public $service;

    public function __construct(Service $service){
        $this->service = $service;
    }

    public function __invoke() {
        $footballInfo = $this->service->data()->getBody();

        if (!$footballInfo && Cache::has('footInfo')) {
            $footballInfo = Cache::get('footInfo');            
            return $footballInfo;
        } else if ($footballInfo) {
            Cache::put('footInfo', $footballInfo, 20);
            return $footballInfo;
        } else {
            return 'No data!!';
        }
    }
}
