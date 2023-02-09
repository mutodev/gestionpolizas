<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Mail\notificacion;
use Mail;
class MailController extends Controller
{
       /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
    
        $mailData = [
            'title' => 'Mail from Polizas',
            'body' => 'Email from Polizas'
        ];
         
       // Mail::to('juan.canchila@hotmail.com')->send(new notificacion($mailData));


        Mail::send('emails.Mail', $mailData, function($message)
        {
            $message
                ->to('juan.canchila@gmail.com')
                ->from('programador@ipcc.gov.co')
                ->subject('TEST');
        });
   
        dd("Email is sent successfully.");
    }
}
