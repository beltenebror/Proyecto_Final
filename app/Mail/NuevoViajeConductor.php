<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NuevoViajeConductor extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Tienes un nuevo viaje";
    public $servicio;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($servicio)
    {
        $this->servicio = $servicio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.nuevo-viaje-conductor');
    }
}
