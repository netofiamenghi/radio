<?php
class Participacao
{
    public $id;
    public $palavra1;
    public $palavra2;
    public $data;
    public $nome;
    public $cpf;
    public $telefone;
    public $idPromocao;

    public function inserir()
    {
        $query = "insert into participacao (palavra1, palavra2, data, nome, cpf, telefone, id_promocao) 
                  values ('$this->palavra1','$this->palavra2','$this->data','$this->nome','$this->cpf',
                  '$this->telefone','$this->idPromocao');";
        $conexao = Conexao::conectar();
        $conexao->exec($query);
        $query = "select id from participacao order by id desc limit 1";
        $conexao = Conexao::conectar();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function verificarPalavras()
    {
        $query = "select pro.id from promocao pro, palavra pa, palavra pa2 
                where pro.id = pa.id_promocao and pro.id = pa2.id_promocao and
                pa.descricao =  '" . $this->palavra1 . "'  and 
                pa2.descricao =  '" . $this->palavra2 . "' and
                pro.data_inicio <= '" . $this->data . "' and 
                pro.data_fim >= '" . $this->data . "'";
        $conexao = Conexao::conectar();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }
}
