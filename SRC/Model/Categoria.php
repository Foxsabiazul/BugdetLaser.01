<?php

class Categoria {
    
private $id;
private $Servico;
private $Nome;
private $Descricao;

public function __construct(int $id, array $Servico, String $Nome, String $Descricao){
    $this->id = $id;
    $this->setNome($Nome);
    $this->Descricao = $Descricao;
    $this->Servico = $Servico;

    }

    public function getId() 
    {
        return $this->id;
    }

	public function getNome() 
    {
        return $this->Nome;
    }

	public function getDescricao() 
    {
        return $this->Descricao;
    }

    public function setId($id): void 
    {
        $this->id = $id;
    }

	public function setNome($Nome): void 
    {
        $this->Nome = $Nome;
    }

    public function adicionarServico(Servico $Servico)
    {
       return $this->Servico = $Servico;
    }

    public function setDescricao($Descricao): void 
    {
        $this->Descricao = $Descricao;
    }

    public function listarServicos()
    {
        return $this->Servico;
    } 
	
}