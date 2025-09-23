<?php

class Cliente {
    private string $nome;
    private string $contatos;

    public function __construct(string $nome, string $contatos) {
        $this->nome = $nome;
        $this->contatos = $contatos;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getContatos(): string {
        return $this->contatos;
    }
}

class Orcamento {
    private Cliente $cliente;
    private array $servicos = [];
    private string $status;

    public function __construct(Cliente $cliente) {
        $this->cliente = $cliente;
        $this->status = "Pendente";
    }

    public function adicionarServico(Servico $servico): void {
        $this->servicos[] = $servico;
    }

    public function atualizarStatus(string $status): void {
        $this->status = $status;
    }

    public function __toString(): string {
        $servicosStr = implode("\n", $this->servicos);
        return "Cliente: {$this->cliente->getNome()}\n".
               "Contato: {$this->cliente->getContatos()}\n".
               "Serviços:\n{$servicosStr}\n".
               "Status: {$this->status}\n";
    }
}

// Exemplo de uso
$cliente = new Cliente("Maria Silva", "maria@email.com");

$orcamento1 = new Orcamento($cliente);
$orcamento1->adicionarServico(new Servico("Desenvolvimento de site", 5000, 30));
$orcamento1->adicionarServico(new Servico("Manutenção mensal", 800, 12));

echo $orcamento1;

$orcamento1->atualizarStatus("Aprovado");

echo "\n\nStatus atualizado:\n";
echo $orcamento1;
