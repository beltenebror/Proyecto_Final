<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ViajeFinalizadoAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Viaje finalizado, abone al chofer correspondiente";
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
        return $this->view('emails.admin-viaje-finalizado');
    }
}
