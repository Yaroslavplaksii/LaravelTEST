<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;
use App\Jobs\SendMailJob;

class EmailController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        try{
            $emails = Email::all();
          
            if(count($emails)) {
                foreach($emails as $email) {
                    SendMailJob::dispatch($email->email)->onQueue('infoemail');
                }
            }
        }catch(Exception  $e) {
            return $e->message;
        }
    }
}
