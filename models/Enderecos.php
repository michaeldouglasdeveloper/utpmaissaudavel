<?php

class Enderecos extends Model {

    private $cep;
    private $rua;
    private $log;
    private $bairro;
    private $cidade;
    private $estado;
    private $numero;
    private $complemento;
    private $fkIdPessoa;

    public function __construct() {
        parent::__construct();
        $this->log = new Logs();
    }

    public function gravar() {

        try {

            $sql = "INSERT INTO enderecos(fk_id_pessoa, cep, rua, bairro, cidade, estado, numero, complemento,
                 endereco_criado_por, endereco_criado_em, endereco_atualizado_por, endereco_atualizado_em) 
                 VALUES(:fk_id_pessoa, :cep, :rua, :bairro, :cidade, :estado, :numero, :complemento,
                :endereco_criado_por, :endereco_criado_em, :endereco_atualizado_por, :endereco_atualizado_em)";

            $pdo = $this->db->prepare($sql);

            $pdo->bindValue(':fk_id_pessoa', $this->getFkIdPessoa(), PDO::PARAM_INT);
            $pdo->bindValue(':cep', $this->getCep(), PDO::PARAM_STR);
            $pdo->bindValue(':rua', $this->getRua(), PDO::PARAM_STR);
            $pdo->bindValue(':bairro', $this->getBairro(), PDO::PARAM_STR);
            $pdo->bindValue(':cidade', $this->getCidade(), PDO::PARAM_STR);
            $pdo->bindValue(':estado', $this->getEstado(), PDO::PARAM_STR);
            $pdo->bindValue(':numero', $this->getNumero(), PDO::PARAM_STR);
            $pdo->bindValue(':complemento', $this->getComplemento(), PDO::PARAM_STR);
            $pdo->bindValue(':endereco_criado_por', $this->idUsuario, PDO::PARAM_INT);
            $pdo->bindValue(':endereco_criado_em', $this->date, PDO::PARAM_STR);
            $pdo->bindValue(':endereco_atualizado_por', $this->idUsuario, PDO::PARAM_INT);
            $pdo->bindValue(':endereco_atualizado_em', $this->date, PDO::PARAM_STR);

            $pdo->execute();

            return true;
        } catch (Exception $exc) {
            $this->log->logError(__CLASS__, __FUNCTION__, $exc->getMessage(), $this->idUsuario);
        }
    }

    public function atualizar() {

        try {

            $sql = "UPDATE enderecos SET cep = :cep, rua = :rua, bairro = :bairro, cidade = :cidade, estado = :estado, numero = :numero, complemento = :complemento,
                    endereco_atualizado_por = :endereco_atualizado_por, endereco_atualizado_em = :endereco_atualizado_em WHERE fk_id_pessoa = :id_pessoa";

            $pdo = $this->db->prepare($sql);

            $pdo->bindValue(':cep', $this->getCep(), PDO::PARAM_STR);
            $pdo->bindValue(':rua', $this->getRua(), PDO::PARAM_STR);
            $pdo->bindValue(':bairro', $this->getBairro(), PDO::PARAM_STR);
            $pdo->bindValue(':cidade', $this->getCidade(), PDO::PARAM_STR);
            $pdo->bindValue(':estado', $this->getEstado(), PDO::PARAM_STR);
            $pdo->bindValue(':numero', $this->getNumero(), PDO::PARAM_STR);
            $pdo->bindValue(':complemento', $this->getComplemento(), PDO::PARAM_STR);
            $pdo->bindValue(':endereco_atualizado_por', $this->idUsuario, PDO::PARAM_INT);
            $pdo->bindValue(':endereco_atualizado_em', $this->date, PDO::PARAM_STR);
            $pdo->bindValue(':id_pessoa', $this->getFkIdPessoa(), PDO::PARAM_INT);

            $pdo->execute();
        } catch (Exception $exc) {
            $this->log->logError(__CLASS__, __FUNCTION__, $exc->getMessage(), $this->idUsuario);
        }
    }

    function getCep() {
        return $this->cep;
    }

    function getRua() {
        return $this->rua;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEstado() {
        return $this->estado;
    }

    function getNumero() {
        return $this->numero;
    }

    function getComplemento() {
        return $this->complemento;
    }

    function getFkIdPessoa() {
        return $this->fkIdPessoa;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setRua($rua) {
        $this->rua = $rua;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    function setFkIdPessoa($fkIdPessoa) {
        $this->fkIdPessoa = $fkIdPessoa;
    }

}
