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
    public function __construct(private $name, private $subj, private $content, private $mailViewId)
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
        if($this->mailViewId == 2){
            $viewToUse='mail.message-answer';
        }else if($this->mailViewId == 3){
            $viewToUse='mail.claim-answer';
        }else{
            $viewToUse='mail.simplemail';
        }
        return new Content(
            view: $viewToUse,
            with: ['name' => $this->name, 'content' => $this->content],
        );
    }

    public function attachments()
    {
        return [];
    }
}
