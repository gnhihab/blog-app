<?php

namespace App\Http\Controllers;

use App\Mail\PostCreated;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(){

        $data= [
            'subject'=>'Send E-mail To User',
            'body'=>'Hello User',
        ];

        Mail::to('gnhihab39@gmail.com')->send(new PostCreated($data));

        dd('mail send');

    }


}
