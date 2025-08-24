<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $messages;
    public $created_at;

    /**
     * Create a new req$request instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        //
        // dd($request->name);
        $this->name=$message->name;
        $this->email=$message->email;
        $this->messages=$message->message;
        $this->created_at=$message->created_at;

    }
    public function build()
    {
        // dd($this->message);
        return $this->view('mail.usermessage',[
            'name'=>$this->name,
            'email'=>$this->email,
            'messages'=>$this->messages,
            'created_at'=>$this->created_at,

    ]);
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    // public function envelope()
    // {
    //     return new Envelope(
    //         subject: 'User Message',
    //     );
    // }

    // /**
    //  * Get the message content definition.
    //  *
    //  * @return \Illuminate\Mail\Mailables\Content
    //  */
    // public function content()
    // {
    //     return new Content(
    //         view: 'mail.usermessage',
    //     );
    // }

    // /**
    //  * Get the attachments for the message.
    //  *
    //  * @return array
    //  */
    // public function attachments()
    // {
    //     return [];
    // }
}
