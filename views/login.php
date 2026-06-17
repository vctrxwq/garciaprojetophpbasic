<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Sistema MVC</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 50px;">
    <h2>🔐 Acessar o Sistema</h2>
    
    <?php if (isset($_GET['erro'])): ?>
        <p style="color: red;">E-mail ou senha incorretos!</p>
    <?php endif; ?>

    <?php if (isset($_GET['sucesso'])): ?>
        <p style="color: green;">Cadastro realizado com sucesso! Faça o login.</p>
    <?php endif; ?>

    <form action="index.php?action=login" method="POST" style="width: 300px;">
        <label>E-mail:</label><br>
        <input type="email" name="email" required style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>
        
        <label>Senha:</label><br>
        <input type="password" name="senha" required style="width: 100%; padding: 8px; margin-bottom: 15px;"><br>
        
        <button type="submit" style="padding: 10px 20px; cursor: pointer;">Entrar</button>
    </form>
    <br>
    <a href="index.php?action=registrar">Não tem uma conta? Cadastre-se aqui</a>
</body>
</html>