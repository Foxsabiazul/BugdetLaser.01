<?php

class Cliente {
    private string $nome =("");
    private int $contatos;
    private float $servico;
    private string $cliente;

    public function __construct(string $nome, int $contatos, float $servico, string $cliente) {
        $this->nome = $nome;
        $this->contatos = $contatos;
        $this->servico = $servico;
        $this->cliente = $cliente;
    }

    public function getNome(): string {
        return $this->nome;

    }

    public function getCLiente(){
        return $this->cliente;
    }

    
    public function getContatos(): int {
        return $this->contatos;
    }

    public function getServico():  float{
        return $this->servico;
    }

    public function setNome($nome): void{
        $this->nome = $nome;
    }
}

