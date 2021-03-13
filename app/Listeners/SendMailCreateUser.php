<?php

namespace App\Listeners;

use App\Events\CreateUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Mail;
use App\User;
use App\Models\Role;
use App\Mail\RegisterMail;

class SendMailCreateUser
{
    public $user;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(CreateUser $event)
    {
        $adminUsers = User::whereHas('roles',function($query){
            $query->where('name','admin');
        })->pluck('email')->toArray();
           
        $data['user'] = $event->user;
        Mail::send('emails.UserCreated',$data, function($message) use($adminUsers)
        {
            $message->subject('Alert: User Create On Best Practice Training');
            $message->to($adminUsers);
        });
        Mail::to($data['user']->email)->send(new RegisterMail($data['user']));
    }
}
