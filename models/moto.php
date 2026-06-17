<?php
class Moto {
    private $id;
    private $usuario_id;
    private $modelo;
    private $marca;
    private $ano;
    private $placa;

    public function __construct($modelo = null, $marca = null, $ano = null, $placa = null, $usuario_id = null, $id = null) {
        $this->id = $id;
        $this->usuario_id = $usuario_id;
        $this->modelo = $modelo;
        $this->marca = $marca;
        $this->ano = $ano;
        $this->placa = $placa;
    }

    public function getId() { return $this->id; }
    public function getUsuarioId() { return $this->usuario_id; }
    public function getModelo() { return $this->modelo; }
    public function getMarca() { return $this->marca; }
    public function getAno() { return $this->ano; }
    public function getPlaca() { return $this->placa; }
}