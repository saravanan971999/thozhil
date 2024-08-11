<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApproveMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $details;
    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {
        $subject = $this->details['type'] == 1 ? 'Congratulations! Your Job Application is Approved' : 'Congratulations! Your Internship Application is Approved';

        return $this->subject($subject)
                    ->view('emails.approved'); // View file for the email content
    }
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Approve Mail',
    //     );
    // }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.approved',
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
