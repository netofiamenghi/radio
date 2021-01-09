<?php

class Palavra
{
    public $id;
    public $descricao;
    public $idPromocao;

    public function inserir()
    {
        $query = "insert into palavra (descricao,id_promocao) values ('$this->descricao','$this->idPromocao')";
        $conexao = Conexao::conectar();
        if ($conexao->exec($query)) :
            return true;
        endif;
        return false;
    }

    public function listar()
    {
        $query = "select * from palavra where id_promocao = $this->idPromocao";
        $conexao = Conexao::conectar();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function carregar()
    {
        $query = "select * from palavra where id = " . $this->id;
        $conexao = Conexao::conectar();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        foreach ($lista as $linha) {
            $this->id = $linha['id'];
            $this->descricao = $linha['descricao'];
            $this->idPromocao = $linha['id_promocao'];
        }
    }

    public function alterar()
    {
        $query = "update palavra set descricao = '$this->descricao', id_promocao = '$this->idPromocao' where id = $this->id";
        $conexao = Conexao::conectar();
        if ($conexao->exec($query)) :
            return true;
        endif;
        return false;
    }

    public function excluir()
    {
        $query = "delete from palavra where id = $this->id";
        $conexao = Conexao::conectar();
        if ($conexao->exec($query)) :
            return true;
        endif;
        return false;
    }
}
