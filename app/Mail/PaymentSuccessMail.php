<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class PaymentSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public $username;
    public $amount;
    public $tradeline;

    public function __construct($username, $amount, $tradeline)
    {
        $this->username = $username;
        $this->amount = $amount;
        $this->tradeline = $tradeline;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Purchase Successful At TradelineEnvy',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'payment_successful',
            with: [
                'username' => $this->username,
                'amount' => $this->amount,
                'tradeline' => $this->tradeline,
            ],
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromPath(storage_path('app/public/doc.docx')),
        ];
    }


}
