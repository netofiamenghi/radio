<?php

class Promocao
{
    public $id;
    public $dataInicio;
    public $dataFim;
    public $descricao;
    public $status;

    public function inserir()
    {
        $query = "insert into promocao (data_inicio,data_fim,descricao) values ('$this->dataInicio','$this->dataFim','$this->descricao')";
        $conexao = Conexao::conectar();
        if ($conexao->exec($query)) :
            return true;
        endif;
        return false;
    }

    public function listar()
    {
        $query = "select * from promocao order by id desc";
        $conexao = Conexao::conectar();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function carregar()
    {
        $query = "select * from promocao where id = " . $this->id;
        $conexao = Conexao::conectar();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        foreach ($lista as $linha) {
            $this->id = $linha['id'];
            $this->dataInicio = $linha['data_inicio'];
            $this->dataFim = $linha['data_fim'];
            $this->descricao = $linha['descricao'];
            $this->status = $linha['status'];
        }
    }

    public function alterar()
    {
        $query = "update promocao set data_inicio = '$this->dataInicio', data_fim = '$this->dataFim', descricao = '$this->descricao' where id = $this->id";
        $conexao = Conexao::conectar();
        if ($conexao->exec($query)) :
            return true;
        endif;
        return false;
    }

    public function excluir()
    {
        $query = "delete from promocao where id = $this->id";
        $conexao = Conexao::conectar();
        if ($conexao->exec($query)) :
            return true;
        endif;
        return false;
    }
}
