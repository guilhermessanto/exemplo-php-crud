<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST['enviar']))
{
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];


//Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $mail->CharSet = "UTF-8";

    try {
        
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '2be7465b747200';
        $mail->Password = 'b83591cd5da387';

        //Recipients
        $mail->setFrom('contato@sitecrud.com', 'Site Crud');
        $mail->addAddress('guilherme@sitecrud.com', 'Guilherme');     //Add a recipient
        $mail->addReplyTo($email, 'Retorno do contato');
        

        
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Contato site - ".$assunto;
        $mail->Body    = "<b>Nome:</b> $nome <br> <b>E-mail:</b> $email <br> <b>Assunto: $assunto </b> <br> <b>Mensagem:'$mensagem'</b>";
        $mail->AltBody = "Nome: $nome \n E-mail: $email \n Assunto: $assunto \n Mensagem: $mensagem";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
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
        <form action="" method="post">
        <p>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
        </p>
        <p>
            <label for="email">email:</label>
            <input type="text" name="email" id="email" required>
        </p>
        <p>
            <label for="assunto">Assunto:</label>
            <select name="assunto" id="assunto" required>
                <option value=""></option>
                <option>Duvidas</option>
                <option>Reclamações</option>
                <option>Elogios</option>
            </select>
        </p>
        <p><label for="mensagem">Mensagem:</label></p>
        <p>
            <textarea name="mensagem" id="mensagem" cols="30" rows="5"></textarea>
        </p>
        <button type="submit" name="enviar">Enviar</button>
        </form>
        <p><a href="index.php">voltar</a></p>
</body>
</html>

