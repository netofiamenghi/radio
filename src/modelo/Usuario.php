<?php

class Usuario
{
    public $id;
    public $nome;
    public $email;
    public $senha;
    public $status;

    public function inserir()
    {
        $query = "insert into usuario (nome,email,senha) values ('$this->nome','$this->email','$this->senha')";
        $conexao = Conexao::conectar();
        if ($conexao->exec($query)) :
            return true;
        endif;
        return false;
    }

    public function listar()
    {
        $query = "select * from usuario";
        $conexao = Conexao::conectar();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function carregar()
    {
        $query = "select * from usuario where id = " . $this->id;
        $conexao = Conexao::conectar();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        foreach ($lista as $linha) {
            $this->id = $linha['id'];
            $this->nome = $linha['nome'];
            $this->email = $linha['email'];
            $this->senha = $linha['senha'];
            $this->status = $linha['status'];
        }
    }

    public function alterar()
    {
        $query = "update usuario set nome = '$this->nome', email = '$this->email', senha = '$this->senha' where id = $this->id";
        $conexao = Conexao::conectar();
        if ($conexao->exec($query)) :
            return true;
        endif;
        return false;
    }

    public function excluir()
    {
        $query = "delete from usuario where id = $this->id";
        $conexao = Conexao::conectar();
        if ($conexao->exec($query)) :
            return true;
        endif;
        return false;
    }

    public function logar()
    {
        $query = "select * from usuario where email like '" . $this->email . "' and senha like '" . $this->senha . "'";
        $conexao = Conexao::conectar();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        foreach ($lista as $linha) {
            $this->id = $linha['id'];
            $this->nome = $linha['nome'];
            $this->status = $linha['status'];
        }
    }
}
