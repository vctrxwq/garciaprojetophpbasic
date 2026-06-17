<?php
require_once __DIR__ . '/../config/Database.php';

class TarefaDAO {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function listarPorUsuario($usuario_id) {
        $sql = "SELECT * FROM tarefas WHERE usuario_id = :usuario_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':usuario_id', $usuario_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function inserir($usuario_id, $descricao) {
        $sql = "INSERT INTO tarefas (usuario_id, descricao) VALUES (:usuario_id, :descricao)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':usuario_id', $usuario_id);
        $stmt->bindValue(':descricao', $descricao);
        return $stmt->execute();
    }

    public function deletar($id) {
        $sql = "DELETE FROM tarefas WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
}