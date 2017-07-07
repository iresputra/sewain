<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PesananAssigned extends Notification
{
    use Queueable;
    
    private $pesanan;
    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->pesanan = $pesanan;
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
                    ->line('Kamu berhasil memesan barang')
                    ->action('Notification Action', rout('pesanan.show',[$this->pesanan]))
                    ->line('Harap tunggu konfirmasi');
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
            'pesanan' => $this->pesanan->id;
        ];
    }
}
