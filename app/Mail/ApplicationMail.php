<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {
        $subject = $this->details['type'] == 1 ? 'Job Application - Confirmation' : 'Internship Application - Confirmation';

        return $this->subject($subject)
                    ->view('emails.application'); // View file for the email content
    }
    /**
     * Get the message envelope.
     */
    // public function envelope($details): Envelope
    // {
    //     if($details['type'] == 'Job'){
    //         return new Envelope(
    //             subject: 'Job Application - Confirmation',
    //         );
    //     }
    //     else{
    //         return new Envelope(
    //             subject: 'Internship Application - Confirmation',
    //         );
    //     }
    // }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.application',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
