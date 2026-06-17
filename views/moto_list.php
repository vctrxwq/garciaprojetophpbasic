<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Minha Garagem</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 40px;">
    <h2>🏍️ Controle de Frota - Minhas Motocicletas</h2>
    
    <p>
        <a href="index.php?action=nova_moto" style="padding: 8px 15px; background-color: #28a745; color: white; text-decoration: none; border-radius: 4px; font-weight: bold;">+ Cadastrar Nova Moto</a>
        | 
        <a href="index.php?action=dashboard">Voltar ao Dashboard</a>
    </p>

    <br>
    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse; text-align: left;">
        <thead style="background-color: #f2f2f2;">
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Ano</th>
                <th>Placa</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($motos)): ?>
                <tr>
                    <td colspan="5" style="text-align: center; color: #777;">Nenhuma motocicleta cadastrada ainda.</td>
                </tr>
            <?php else: ?>
                <?php foreach($motos as $moto): ?>
                <tr>
                    <td><?= htmlspecialchars($moto['marca']) ?></td>
                    <td><?= htmlspecialchars($moto['modelo']) ?></td>
                    <td><?= htmlspecialchars($moto['ano']) ?></td>
                    <td><strong><?= htmlspecialchars($moto['placa']) ?></strong></td>
                    <td>
                        <a href="index.php?action=editar_moto&id=<?= $moto['id'] ?>" style="color: #007BFF; text-decoration: none; margin-right: 10px;">Editar</a>
                        <a href="index.php?action=deletar_moto&id=<?= $moto['id'] ?>" onclick="return confirm('Tem certeza que deseja remover esta motocicleta do sistema?')" style="color: red; text-decoration: none;">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>