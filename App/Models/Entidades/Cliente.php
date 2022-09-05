<?php

namespace App\Models\Entidades;

class Cliente
{
    private $id;
    private $nome;
   private $dtnasc;
   private $cpf;
   private $telefone; 

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getDTNasc()
    {
        return $this->dtnasc;
    }

    public function setDTNasc($dtnasc)
    {
        $this->dtnasc = $dtnasc;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }
    
    public function getCPF()
    {
        return $this->dtnasc;
    }

    public function setCPF($cpf)
    {
        $this->cpf = $cpf;
    }
}