<?php

namespace App\Model;

use Clientes;
use Servicos;

class Pedidos {
    private $id;
    private $cliente;
    private $itens = [];
    private $status;

    public function __construct($id, Clientes $cliente) {
        $this->id = $id;
        $this->cliente = $cliente;
        $this->status = "Pendente";
    }

    public function adicionarItem($item) {
        $this->itens[] = $item;
                
    }

    public function atualizarStatus($novoStatus) {
        $this->status = $novoStatus;
    }

    public function paraString() {
        $itensStr = "";
        foreach ($this->itens as $item) {
            $itensStr .= "- " . $item . PHP_EOL;
        }

        return "Pedido #{$this->id} para {$this->cliente->getNome()} ({$this->status}):\n"
            . "{$itensStr}";
    }
}