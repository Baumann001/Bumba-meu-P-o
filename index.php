<html>
<head>
    <meta charset="UTF-8">
    <title>Cardápio da Padaria</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h1>🍞 Cardápio da Padaria</h1>
<p>Escolha seu produto favorito:</p>

<form method="POST" action="">
    <input type="checkbox" name="produto[]" value="Pão francês"> Pão francês - R$ 0,50<br>
    <input type="checkbox" name="produto[]" value="Café"> Café - R$ 2,00<br>
    <input type="checkbox" name="produto[]" value="Bolo de chocolate"> Bolo de chocolate - R$ 5,00<br>
    <input type="checkbox" name="produto[]" value="Coxinha"> Coxinha - R$ 4,50<br>
    <input type="checkbox" name="produto[]" value="Pastel"> Pastel - R$ 3,50<br><br>

    <input type="submit" value="Fazer pedido">
</form>