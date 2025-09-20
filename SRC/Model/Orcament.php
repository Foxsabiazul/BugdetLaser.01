<?php

interface Remuneravel {
    public function getValor();
}
  
class Orcamento {
    private $cliente;
    private $servicos = [];
    private $status;
    /** @var Remuneravel[] */
    private $remuneracoes = [];

    public function __construct(Clientes $cliente) {
        $this->cliente = $cliente;
        $this->status = "Pendente";
    }

    public function adicionarServico(Servicos $servico) {
        $this->servicos[] = $servico;
        
    }

    public function calcularTotal() {
        $total = 0;
        foreach ($this->servicos as $servico) {
            $total += $servico->getValor();
        }
        return $total;
    }

    public function atualizarStatus($novoStatus) {
        $this->status = $novoStatus;
    }

    public function paraString() {
        $servicosStr = "";
        foreach ($this->servicos as $s) {
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