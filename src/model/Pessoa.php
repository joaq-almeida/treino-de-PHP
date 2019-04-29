<?php

class Pessoa{

    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $cidade;
    private $estado;
    private $data_nascimento;

    public function getId(){
        return $this->id;
    }

    public function setId($n){
        $this->id = $n;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($n){
        $this->nome = $n;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($n){
        $this->email = $n;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone($n){
        $this->telefone = $n;
    }

    public function getCidade(){
        return $this->cidade;
    }

    public function setCidade($n){
        $this->cidade = $n;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($n){
        $this->estado = $n;
    }

    public function getData_nascimento(){
        return $this->data_nascimento;
    }

    public function setData_nascimento($n){
        $this->data_nascimento = $n;
    }


}
?>