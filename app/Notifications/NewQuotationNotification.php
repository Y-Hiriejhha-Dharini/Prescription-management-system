<?php

namespace App\Notifications;

use App\Models\Prescription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class NewQuotationNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public $prescription)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        // Log::info('Notification sent to: ' . $notifiable->email);
        $token = encrypt($this->prescription->id);
        
        return (new MailMessage)
                ->subject('Quotation Confirmation')
                ->view('emails.pharmacyConfirmation',
                [
                    'name' => $this->prescription->user->name,
                    'created_at' => $this->prescription->created_at->format('Y-m-d H:i:s'),
                    'token' => $token
                ]);
                

    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
