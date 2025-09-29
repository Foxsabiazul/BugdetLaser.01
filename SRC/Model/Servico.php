<?php

class Servico {
    private string $descricao;
    private int $valor;
    private int $prazo;
    private float $categoria;

    public function __construct(string $descricao, int $valor, int $prazo, float $categoria) {
        $this->setDescricao($descricao);
        $this->setValor($valor);
        $this->setPrazo($prazo);
        $this->setCategoria($categoria);
    }

    public function getDescricao(): string 
    {
        return $this->descricao;
    }

    public function getValor(): int
    {
        return $this->valor;
    }

    public function getCategoria(): float
    {
        return $this->categoria;
    }
    
    public function getPrazo(): int 
    {
        return $this->prazo;
    }
    
    public function getValorFormatado(): string 
    {
        return 'R$ ' . number_format($this->valor, 2, ',', '.');
    }
    
    public function __toString(): string 
    {
        return "{$this->descricao} - {$this->getValorFormatado()} (Prazo: {$this->prazo} dias)";
    }

    public function setCategoria($categoria): void
    {
            $this->categoria = $categoria;   
    }    
    public function setValor(float $valor): void 
    {
        if ($valor < 0) {
            throw new InvalidArgumentException("Valor do serviço:  ");
        }
        $this->valor = $valor;
    }

    public function setPrazo(int $prazo): void {
        if ($prazo < 0) {
            throw new InvalidArgumentException("Defina o prazo:  ");
        }
        $this->prazo = $prazo;
    }

    public function setDescricao(string $descricao): void {
        if (empty(trim($descricao))) {
            throw new InvalidArgumentException("Descrição do serviço não pode estar vazia");
        }
        $this->descricao = trim($descricao);
    }

    
    
}

try {
$servico = new Servico;
$categoria = new Categoria =("Adicione a Categoria:   ");
echo $servico; 
echo $categoria;
} catch (InvalidArgumentException $e) {
echo "Erro: " . $e->getMessage();
}