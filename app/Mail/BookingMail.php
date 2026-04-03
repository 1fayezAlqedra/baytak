<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;

class BookingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $patientData; // تعريف المتغير اللي حيوصل للـ Blade

    public function __construct($data)
    {
        $this->patientData = $data;
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.admin_booking', // اسم ملف التصميم
        );
    }
}
