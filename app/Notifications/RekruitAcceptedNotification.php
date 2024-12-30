<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RekruitAcceptedNotification extends Notification
{
    use Queueable;

    private $rekruit;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($rekruit)
    {
        $this->rekruit = $rekruit;
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
            ->subject('Selamat Anda Diterima!')
            ->line('Selamat, Anda telah diterima sebagai tentor.')
            ->action('Lihat Detail', url('/dashboard'))
            ->line('Terima kasih telah mendaftar!');
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
            'rekruit_id' => $this->rekruit->id,
            'message' => 'Anda telah diterima sebagai tentor.'
        ];
    }
}
