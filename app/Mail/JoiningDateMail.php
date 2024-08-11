<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JoiningDateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $new_user;
    public function __construct($new_user)
    {
        $this->new_user = $new_user;
    }

    public function build()
    {
        $subject = "Welcome Aboard! Your Joining Date is Approaching";
        return $this->subject($subject)
                    ->view('emails.offer_approval'); // View file for the email content
    }
    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Joining Date Mail',
    //     );
    // }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.offer_approval',
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
