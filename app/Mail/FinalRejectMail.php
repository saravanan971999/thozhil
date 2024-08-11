<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FinalRejectMail extends Mailable
{
    use Queueable, SerializesModels;

    public $new_user;
    public function __construct($new_user)
    {
        $this->new_user = $new_user;
    }

    public function build()
    {
        $subject = $this->new_user['type'] == 1 ? "Application Update: Your Status for ". strtoupper($this->new_user['title']) ." at ".strtoupper($this->new_user['company_name']) : "Application Update: Your Status for ". strtoupper($this->new_user['title']) ." at ".strtoupper($this->new_user['company_name']);

        return $this->subject($subject)
                    ->view('emails.final_reject'); // View file for the email content
    }
    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.final_reject',
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
