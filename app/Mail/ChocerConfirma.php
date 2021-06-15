<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChoferConfirma extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "El chofer confirmó haber realizado el viaje";
    public $servicioId;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($servicioId)
    {
        $this->servicioId = $servicioId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.chofer-confirma');
    }
}
