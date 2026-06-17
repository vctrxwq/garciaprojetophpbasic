<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Minhas Tarefas</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 40px; background-color: #f9f9f9;">
    
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h2>Olá, <strong><?= htmlspecialchars($_SESSION['user_nome']); ?></strong>!</h2>
        <a href="index.php?action=logout" style="color: red; text-decoration: none; font-weight: bold;">Sair</a>
    </div>

    <hr>

    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 20px;">
        <h3>➕ Nova Tarefa</h3>
        <form action="index.php?action=add_tarefa" method="POST" style="display: flex; gap: 10px;">
            <input type="text" name="descricao" placeholder="O que precisa ser feito?" required style="flex: 1; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            <button type="submit" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">Adicionar</button>
        </form>
    </div>

    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <h3>📋 Minhas Tarefas Técnicas</h3>
        <ul style="list-style: none; padding: 0;">
            <?php if (empty($tarefas)): ?>
                <p style="color: #888;">Nenhuma tarefa pendente.</p>
            <?php else: ?>
                <?php foreach ($tarefas as $t): ?>
                    <li style="padding: 10px; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: center;">
                        <span><?= htmlspecialchars($t['descricao']) ?></span>
                        <a href="index.php?action=del_tarefa&id=<?= $t['id'] ?>" style="color: #ff4d4d; text-decoration: none; font-size: 14px;">[Excluir]</a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>

    <br>
    
    <div style="padding: 20px; border: 2px dashed #007BFF; border-radius: 8px; text-align: center; background-color: #e6f2ff;">
        <h3 style="margin-top: 0; color: #0056b3;">🏍️ Módulo de Frota</h3>
        <p>Gerencie os veículos cadastrados no sistema.</p>
        <a href="index.php?action=listar_motos" style="display: inline-block; padding: 12px 25px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 4px; font-weight: bold;">
            Acessar Controle de Motocicletas
        </a>
    </div>

</body>
</html>