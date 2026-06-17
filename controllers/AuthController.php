<?php
require_once __DIR__ . '/../config/Database.php';

class AuthController {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    public function cadastrar($nome, $email, $senha) {
       
        $senhaHash = password_hash($senha, PASSWORD_BCRYPT);
        
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senhaHash);
        
        if($stmt->execute()) {
            header('Location: index.php?action=login&sucesso=1');
            exit;
        }
    }
    public function login($email, $senha) {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($senha, $user['senha'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_nome'] = $user['nome'];
            header('Location: index.php?action=dashboard');
            exit;
        } else {
            header('Location: index.php?action=login&erro=1');
            exit;
        }
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?action=login');
        exit;
    }
}