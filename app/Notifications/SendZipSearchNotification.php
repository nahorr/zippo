<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendZipSearchNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $zip_codes_searched;
    protected $hours;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($zip_codes_searched, $hours)
    {
        $this->zip_codes_searched = $zip_codes_searched;
        $this->hours = $hours;
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
        return (new MailMessage)
                    ->line('Below are Zip Codes you searched in the past '.$this->hours.' hours:')
                    ->lines($this->zip_codes_searched)
                    ->line('Thank you for using our application!');
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
