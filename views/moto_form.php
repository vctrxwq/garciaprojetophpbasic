<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= isset($motoAtual) ? 'Editar' : 'Cadastrar' ?> Moto</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 40px;">
    <h2>📝 <?= isset($motoAtual) ? 'Editar Dados da' : 'Cadastrar Nova' ?> Motocicleta</h2>
    
    <form action="index.php?action=salvar_moto" method="POST" style="width: 300px;">
        <input type="hidden" name="id" value="<?= $motoAtual['id'] ?? '' ?>">

        <label>Marca:</label><br>
        <input type="text" name="marca" value="<?= $motoAtual['marca'] ?? '' ?>" placeholder="Ex: Yamaha, Honda" required style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>

        <label>Modelo:</label><br>
        <input type="text" name="modelo" value="<?= $motoAtual['modelo'] ?? '' ?>" placeholder="Ex: MT-03, Titan" required style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>

        <label>Ano:</label><br>
        <input type="number" name="ano" value="<?= $motoAtual['ano'] ?? '' ?>" placeholder="Ex: 2026" required style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>

        <label>Placa:</label><br>
        <input type="text" name="placa" value="<?= $motoAtual['placa'] ?? '' ?>" placeholder="Ex: ABC1D23" required style="width: 100%; padding: 8px; margin-bottom: 15px;"><br>
        
        <button type="submit" style="padding: 10px 20px; background-color: #007BFF; color: white; border: none; border-radius: 4px; cursor: pointer;">
            <?= isset($motoAtual) ? 'Atualizar' : 'Salvar Moto' ?>
        </button>
        <a href="index.php?action=listar_motos" style="margin-left: 10px; color: #555;">Cancelar</a>
    </form>
</body>
</html>