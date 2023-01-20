<?php

namespace App\Listeners;

use App\Events\ProdutoCriado;
use App\Mail\NovoProduto;
use App\Models\Produtos;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Laravel\Sail\Console\PublishCommand;

class ProdutoCriadoEvent
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $email=new NovoProduto($event->produtoCriado->nome,
                               $event->produtoCriado->valor,
                               $event->produtoCriado->cor,
                               $event->produtoCriado->id);
                               
        Mail::to('teste1@teste.com.br')->queue($email);
    }
}
