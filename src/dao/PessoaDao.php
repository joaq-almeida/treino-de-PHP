<?php

require_once '../model/Pessoa.php';
require_once '../factory/Conexao.php';

class PessoaDao extends Conexao{

    public function inserir(Pessoa $p){

        try {
            $sql = " INSERT INTO pessoa(nome, email, telefone, cidade, estado, data_nascimento)
                 VALUES(?,?,?,?,?,?) ";
            $stm = Conexao::prepare($sql);
            $x = 0;
            $stm->bindValue(++$x, $p->getNome());
            $stm->bindValue(++$x, $p->getEmail());
            $stm->bindValue(++$x, $p->getTelefone());
            $stm->bindValue(++$x, $p->getCidade());
            $stm->bindValue(++$x, $p->getEstado());
            $stm->bindValue(++$x, $p->getData_nascimento());
            $stm->execute();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function deletar(Pessoa $p){

        try {
            $sql = " DELETE FROM pessoa WHERE pessoa.id = ? ";
            $stm = Conexao::prepare($sql);
            $x = 0;
            $stm->bindValue(++$x, $p->getId());
            $stm->execute();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function editar(Pessoa $p){

        try {
            $sql = " UPDATE pessoa SET nome = ?, email = ?, telefone = ?, cidade = ?, estado = ?, data_nascimento = ?
                    WHERE pessoa.id = ? ";
            $stm = Conexao::prepare($sql);
            $x = 0;
            $stm->bindValue(++$x, $p->getNome());
            $stm->bindValue(++$x, $p->getEmail());
            $stm->bindValue(++$x, $p->getTelefone());
            $stm->bindValue(++$x, $p->getCidade());
            $stm->bindValue(++$x, $p->getEstado());
            $stm->bindValue(++$x, $p->getData_nascimento());
            $stm->bindValue(++$x, $p->getId());
            $stm->execute();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function listar(){

        try {
            $sql = " SELECT * FROM pessoa ORDER BY pessoa.id DESC";
            $stm = Conexao::prepare($sql);
            $stm->execute();
            return $stm->fetchAll();

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function encontrarPorNome(Pessoa $p){

        try {
            $sql = " SELECT * FROM tabela WHERE pessoa.id = ? ";
            $stm = Conexao::prepare($sql);
            $x = 0;
            $stm->bindValue(++$x, $p->getNome());
            $stm->execute();
            return $stm->fetch();

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>