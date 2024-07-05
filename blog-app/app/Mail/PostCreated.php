<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class PostCreated extends Mailable
{
    use Queueable;
    public $data;

    public function __construct($data)
    {
        $this->data=$data;
    }


    public function build(){
        return $this->subject($this->data['subject'])
        ->view('User.email')
        ->with('data',$this->data);
    }

}
