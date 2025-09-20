<?php

namespace App\Controller;

class NotFoundController
{
    private $controlUndefined; 
    private $controlDefined;

    public function __construct($controlUndefined = false, $controlDefined = false)
    {
        $this->controlUndefined = $controlUndefined;
        $this->controlDefined   = $controlDefined;
    }

    public function getControlUndefined() 
    {
        return $this->controlUndefined;
    }

    public function getControlDefined() 
    {
        return $this->controlDefined;
    }

    public function setControlUndefined($controlUndefined): void 
    {
        $this->controlUndefined = $controlUndefined;
    }

    public function setControlDefined($controlDefined): void 
    {
        $this->controlDefined = $controlDefined;
    }

    public function render(): void
    {
        if ($this->controlUndefined) {
            http_response_code(404);
            echo "<h1>404 Not Found</h1>";
            echo "<p>Página não encontrada, tente novamente 🔃.</p>";
        } elseif ($this->controlDefined) {
            http_response_code(501);
            echo "<h1>501 Not Implemented</h1>";
            echo "<p>Métodos não foram implementados nesta página.</p>";
        } else {
            http_response_code(500);
            echo "<h1>Erro</h1>";
            echo "<p>Ocorreu um erro inesperado. Acesse novamente ↺.</p>";
        }
    }
}
