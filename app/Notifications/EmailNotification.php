<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailNotification extends Notification
{
    use Queueable;
    private $mailData ;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mailData)
    {
        $this->mailData2 = $mailData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $mailData=  $this->mailData2;
        return (new MailMessage)
                    ->line($mailData['mensaje'])
                    ->action('Enlace al Resumen de la Gestión', url('https://sigcc.cotecmar.com:9090/gestionPolizas/gestionar_orden/'.$mailData['order_number']))
                    ->line('Sus comentarios son valiosos para el proceso de la gestión!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
