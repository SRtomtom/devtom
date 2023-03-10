<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
		$nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $contato = $_POST['contato'];
        $whatsapp = $_POST['whatsapp'];
		$email = $_POST['email'];
		$msg = $_POST['msg'];

		
        require 'vendor/autoload.php';

        $from = new SendGrid\Email(null, "srwashington.dev@gmail.com");
        $subject = "Mensagem TomDev";
        $to = new SendGrid\Email(null, "srwashington.dev@gmail.com");
        $content = new SendGrid\Content(
            "text/html", 
            "Olá Washington, <br><br>
            Nova mensagem de contato <br><br>
            Nome: $nome<br>
            Sobrenome: $sobrenome<br>
            Contato: $contato<br>
            Whatsapp: $whatsapp<br>
            Email: $email <br>
            Mensagem: $msg");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = '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';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        echo "Mensagem enviada com sucesso";
		
        ?>
    </body>
</html>
