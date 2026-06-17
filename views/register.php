<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Sistema MVC</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 50px;">
    <h2>📝 Criar Nova Conta</h2>
    
    <form action="index.php?action=registrar_action" method="POST" style="width: 300px;">
        <label>Nome Completo:</label><br>
        <input type="text" name="nome" required style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>

        <label>E-mail:</label><br>
        <input type="email" name="email" required style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>
        
        <label>Senha:</label><br>
        <input type="password" name="senha" required style="width: 100%; padding: 8px; margin-bottom: 15px;"><br>
        
        <button type="submit" style="padding: 10px 20px; cursor: pointer;">Cadastrar</button>
    </form>
    <br>
    <a href="index.php?action=login">Já tem conta? Voltar para o Login</a>
</body>
</html>