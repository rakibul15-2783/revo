<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class EmailSendJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $sendMail;

    public function __construct($sendMail)
    {
        $this->sendMail = $sendMail;
    }

    
    public function handle()
    {
        $email = new TestMail($this->sendMail);
        Mail::to($this->sendMail)->send($email);
    }
}
