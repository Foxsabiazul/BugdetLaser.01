<?php

class Servico {
    private string $descricao;
    private float $valor;
    private int $prazo;

    public function __construct(string $descricao, float $valor, int $prazo) {
        $this->setDescricao($descricao);
        $this->setValor($valor);
        $this->setPrazo($prazo);
    }

    public function setDescricao(string $descricao): void {
        if (empty(trim($descricao))) {
            throw new InvalidArgumentException("Descrição do serviço não pode estar vazia");
        }
        $this->descricao = trim($descricao);
    }

    public function setValor(float $valor): void {
        if ($valor < 0) {
            throw new InvalidArgumentException("Valor do serviço deve ser positivo");
        }
        $this->valor = $valor;
    }

    public function setPrazo(int $prazo): void {
        if ($prazo < 0) {
            throw new InvalidArgumentException("Prazo deve ser positivo");
        }
        $this->prazo = $prazo;
    }

    public function getDescricao(): string {
        return $this->descricao;
    }

    public function getValor(): float {
        return $this->valor;
    }

    public function getPrazo(): int {
        return $this->prazo;
    }

    public function getValorFormatado(): string {
        return 'R$ ' . number_format($this->valor, 2, ',', '.');
    }

    public function __toString(): string {
        return "{$this->descricao} - {$this->getValorFormatado()} (Prazo: {$this->prazo} dias)";
    }
}

try {
    $servico = new Servico("Adicione o Serviço", 1500.50, 30);
    echo $servico; // Saída: Adicione o Serviço - R$ 1.500,50 (Prazo: 30 dias)
} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage();
}
