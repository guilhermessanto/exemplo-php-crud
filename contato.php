
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato php</title>
</head>
<body>
        <h2>Contato usando phpmailer</h2><hr>
        <form action="post">
        <p>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" required>
        </p>
        <p>
            <label for="email">email</label>
            <input type="text" name="email" id="email" required>
        </p>
        <p>
            <label for="assunto">Assunto</label>
            <select name="assunto" id="assunto" required>
                <option value=""></option>
                <option value="duvidas">Duvidas</option>
                <option value="reclamacoes">Reclamações</option>
                <option value="elogios">Elogios</option>
            </select>
        </p>
        <p><label for="mensagem">Mensagem:</label></p>
        <p>
            <textarea name="mensagem" id="mensagem" cols="30" rows="5"></textarea>
        </p>
        <button type="submit" name="enviar">Enviar</button>
        </form>
</body>
</html>

