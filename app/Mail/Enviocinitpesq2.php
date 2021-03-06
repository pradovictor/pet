<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Enviocinitpesq2 extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($titulo,$motivo)
    {
        $this->titulo = $titulo;
        $this->motivo = $motivo;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('NitSys - COMUNICADO DE INVENÇÃO')
            ->view('email.enviocinitpesq2')
            ->with([
                'titulo' => $this->titulo,
                'motivo' => $this->motivo,
            ]);
    }
}
