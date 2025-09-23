<?php

namespace App\Controller;

class ControllerPath
{
    private $historic;
    private $statusJB;
    
   public  function ___construct($historic = [], $statusJB = true)
    {
        $this->historic = $historic;
        $this->statusJB = $statusJB;
    }
    public function getHistoric()
    {
        return $this->historic;
    }
    public function getStatusJB()
    {
        return $this->statusJB;
    }
    
    public function setHistoric($historic): void
    {
        $this->historic = $historic;
    }
    public function setStatusJB($statusJB): void
    {
        $this->statusJB = $statusJB;
    }

    public function render(): void
    {
        if ($this->statusJB) {
            echo "<h1>Trabalho ativo!</h1>";
            echo "<p>Histórico: " . implode(", ", $this->historic) . "</p>";
        } else {
            echo "<h1>Trabalho desativado.</h1>";
            echo "<p>Nenhum histórico de trabalho encontrado...</p>";
        }
    }
}