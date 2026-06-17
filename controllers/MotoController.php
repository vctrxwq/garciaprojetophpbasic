<?php
require_once __DIR__ . '/../models/MotoDAO.php';
require_once __DIR__ . '/../models/Moto.php';

class MotoController {
    private $dao;

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }
        $this->dao = new MotoDAO();
    }
    public function salvar($dados) {
        $usuario_id = $_SESSION['user_id'];
        
        if (!empty($dados['id'])) {
            $moto = new Moto($dados['modelo'], $dados['marca'], $dados['ano'], $dados['placa'], $usuario_id, $dados['id']);
            $this->dao->atualizar($moto);
        } else {
            $moto = new Moto($dados['modelo'], $dados['marca'], $dados['ano'], $dados['placa'], $usuario_id);
            $this->dao->inserir($moto);
        }
        
        header('Location: index.php?action=listar_motos');
        exit;
    }

    public function excluir($id) {
        $this->dao->deletar($id);
        header('Location: index.php?action=listar_motos');
        exit;
    }
}