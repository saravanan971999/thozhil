<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FinalApprovalMail extends Mailable
{
    use Queueable, SerializesModels;

    public $new_user;
    public function __construct($new_user)
    {
        $this->new_user = $new_user;
    }

    public function build()
    {
        $subject = $this->new_user['type'] == 1 ? "Congratulations! You're Selected for ".strtoupper($this->new_user['title']) : "Congratulations! You're Selected for ".strtoupper($this->new_user['title']);

        return $this->subject($subject)
                    ->view('emails.final_approval'); // View file for the email content
    }
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: $this->new_user['subject'],
    //     );
    // }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.final_approval',
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
