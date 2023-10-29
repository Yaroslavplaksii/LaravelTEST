<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class logoutController extends Controller
{
    /**
     * @OA\GET(
     *     path="/api/logout",
     *     summary="Log out from cabinet",
     *    
     *     @OA\Response(response="200", description="Successful")
     * )
     */
    public function __invoke(Request $request)
    {
        auth()->user()->tokens()->delete(); 
        return response()->json([
            'msg' => 'You was logged out successfully!!'
        ], 200);
    }
}
