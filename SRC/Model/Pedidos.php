<?php

namespace App\Model;

use Cliente;
use Servico;


class Pedidos {
    private $id;
    private $itens = [];
    private $status;
    public $cliente;
    

    public function __construct($id, Servico $servico,  Cliente $cliente, ) {
        $this->id = $id;
        $this->cliente = $cliente;
        $this->status = "Pendente";
        $this->itens = [$servico];
    }

    public function adicionarItem($item) {
        $this->itens[] = $item;
                
    }

    public function adicionarCliente($cliente) {
        $this->cliente = $cliente;
                
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

    //getters
    public function getServico(){
        return $this->itens;
    }

    public function getCliente(){
        return $this->cliente;
    }

    public function getStatus(){
        return $this->status;
    }

    public function getId(){
        return $this->id;
    }

    //setters
    public function setId($id): void {
        $this->id = $id;
    }

    public function setCliente($cliente): void {
        $this->cliente = $cliente;
    }

    public function setStatus($status): void {
        $this->status = $status;
    }

    public function setItens($itens): void {
        $this->itens = $itens;
    }

    public function __toString()
    {
        
    }

}