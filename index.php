<?php
session_start();
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/MotoController.php';
require_once __DIR__ . '/models/MotoDAO.php';
require_once __DIR__ . '/models/TarefaDAO.php'; 

$action = $_GET['action'] ?? 'login';
$authCtrl = new AuthController();

switch ($action) {
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authCtrl->login($_POST['email'], $_POST['senha']);
        } else {
            include __DIR__ . '/views/login.php';
        }
        break;

    case 'registrar':
        include __DIR__ . '/views/register.php';
        break;

    case 'registrar_action':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authCtrl->cadastrar($_POST['nome'], $_POST['email'], $_POST['senha']);
        }
        break;

    case 'logout':
        $authCtrl->logout();
        break;

    case 'dashboard':
        if (!isset($_SESSION['user_id'])) { 
            header('Location: index.php?action=login'); 
            exit; 
        }
        
        $tDAO = new TarefaDAO();
        $tarefas = $tDAO->listarPorUsuario($_SESSION['user_id']);
        
        include __DIR__ . '/views/dashboard.php';
        break;

    case 'add_tarefa':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tDAO = new TarefaDAO();
            $tDAO->inserir($_SESSION['user_id'], $_POST['descricao']);
            header('Location: index.php?action=dashboard');
        }
        break;

    case 'del_tarefa':
        $tDAO = new TarefaDAO();
        $tDAO->deletar($_GET['id']);
        header('Location: index.php?action=dashboard');
        break;
    case 'listar_motos':
        $motoDAO = new MotoDAO();
        $motos = $motoDAO->listarPorUsuario($_SESSION['user_id']);
        include __DIR__ . '/views/moto_list.php';
        break;

    case 'nova_moto':
        include __DIR__ . '/views/moto_form.php';
        break;

    case 'editar_moto':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $motoDAO = new MotoDAO();
            $motoAtual = $motoDAO->buscarPorId($id);
            include __DIR__ . '/views/moto_form.php';
        }
        break;

    case 'salvar_moto':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $motoCtrl = new MotoController();
            $motoCtrl->salvar($_POST);
        }
        break;

    case 'deletar_moto':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $motoCtrl = new MotoController();
            $motoCtrl->excluir($id);
        }
        break;

    default:
        header('Location: index.php?action=login');
        break;
}