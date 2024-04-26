<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ShiptrackerMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(private $name, private $subj)
    {
        //
    }

    public function envelope()
    {
        return new Envelope(
            from: new Address('noreply@olbizgo.com', 'Shiptracker Team'),
            subject: $this->subj,
        );
    }
    
    public function content()
    {
        return new Content(
            view: 'mail.simplemail',
            with: ['name' => $this->name],
        );
    }

    public function attachments()
    {
        return [];
    }
}
