<?php

require_once '../model/Pessoa.php';
require_once '../dao/PessoaDao.php';

class PessoaController{

    public function __construct(){

        $this->listar();
        if(isset($_POST['cadastrar'])){
            $this->receberDadosInserir();
        }
        if(isset($_POST['atualizar'])){
            $this->receberDadosEditar();
        }
        if(isset($_GET['deletar'])){
            $this->receberDeletar();
        }
        /*if(isset($_GET['listar'])){
            $this->listar();
        }*/
    }

    public function receberDadosInserir(){
        $usuario = new Pessoa();
        $dao = new PessoaDao();

        $usuario->setNome($_POST['nome']);
        $usuario->setEmail($_POST['email']);
        $usuario->setTelefone($_POST['telefone']);
        $usuario->setCidade($_POST['cidade']);
        $usuario->setEstado($_POST['estado']);
        $usuario->setData_Nascimento($_POST['data_nascimento']);

        $dao->inserir($usuario);
    }

    public function receberDadosEditar(){
        $usuario = new Pessoa();
        $dao = new PessoaDao();

        $usuario->setNome($_POST['nome']);
        $usuario->setEmail($_POST['email']);
        $usuario->setTelefone($_POST['telefone']);
        $usuario->setCidade($_POST['cidade']);
        $usuario->setEstado($_POST['estado']);
        $usuario->setData_Nascimento($_POST['data_nascimento']);
        $usuario->setId($_POST['codigo']);

        $dao->editar($usuario);
    }

    public function receberDeletar(){
        $usuario = new Pessoa();
        $dao = new PessoaDao();
        $usuario->setId($_GET['codigo']);

        $dao->deletar($usuario);
    }

    public function listar(){
        $usuario = new Pessoa();
        $dao = new PessoaDao();
        $dados = [];

        foreach ($dao->listar() as $key => $value) {
            $dados[] = $value;
        }
        echo json_encode($dados);
    }
}

new PessoaController();

?>