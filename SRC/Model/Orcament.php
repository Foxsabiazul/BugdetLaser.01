<?php

interface Remuneravel {
    public function getValor();
}

class Orcamento {
    private $cliente;
    private $servico = [];
    private $status;
    /** @var Remuneravel[] */
    private $remuneracoes = [];
    
    public function __construct(Cliente $cliente) {
        $this->cliente = $cliente;
        $this->status = "Pendente";
    }
    
    public function adicionarServico(Servico $servico) {
        $this->servico[] = $servico;
        
    }
    
    public function calcularTotal() {
        $total = 0;
        foreach ($this->servico as $servico) {
            $total += $servico->getValor();
        }
        return $total;
    }
    
    public function paraString() {
        $servicosStr = "";
        foreach ($this->servico as $s) {
            $servicosStr .= "Serviço: " . $s->getNome() . " - Valor: R$ " . $s->getValor() . "\r\n";
        }
        $total = $this->calcularTotal();

        return "Orçamento para {$this->cliente->getNome()} ({$this->status}):\n"
            . "{$servicosStr}"
            . "Total: R$ {$total}";
    }   

    public function verRemuneracao(){
        $vAtual = 0;
        foreach ($this->remuneracoes as $remuneracao){
            if ($remuneracao instanceof Remuneravel) {
                $vAtual += $remuneracao->getValor();
            } else {
                throw new \Exception("Objeto de remuneração da classe " . get_class($remuneracao) . " não implementa Remuneravel");
            }
        }
        return $vAtual;
    }
}

?>