<?php
require_once __DIR__ . '/../config/Database.php';
require_once 'Moto.php';

class MotoDAO {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    // C - CREATE (Inserir no banco)
    public function inserir(Moto $moto) {
        $sql = "INSERT INTO motocicletas (usuario_id, modelo, marca, ano, placa) VALUES (:usuario_id, :modelo, :marca, :ano, :placa)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':usuario_id', $moto->getUsuarioId());
        $stmt->bindValue(':modelo', $moto->getModelo());
        $stmt->bindValue(':marca', $moto->getMarca());
        $stmt->bindValue(':ano', $moto->getAno());
        $stmt->bindValue(':placa', $moto->getPlaca());
        return $stmt->execute();
    }

    public function listarPorUsuario($usuario_id) {
        $sql = "SELECT * FROM motocicletas WHERE usuario_id = :usuario_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':usuario_id', $usuario_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM motocicletas WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar(Moto $moto) {
        $sql = "UPDATE motocicletas SET modelo = :modelo, marca = :marca, ano = :ano, placa = :placa WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':modelo', $moto->getModelo());
        $stmt->bindValue(':marca', $moto->getMarca());
        $stmt->bindValue(':ano', $moto->getAno());
        $stmt->bindValue(':placa', $moto->getPlaca());
        $stmt->bindValue(':id', $moto->getId());
        return $stmt->execute();
    }

    public function deletar($id) {
        $sql = "DELETE FROM motocicletas WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
}