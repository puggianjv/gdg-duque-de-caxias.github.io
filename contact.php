<?php

if(isset($_POST['email'])) {

    $email_to = "gdg-duque-de-caxias@googlegroups.com";

    $email_subject = "Contato pelo Site no GitHub";


    function died($error) {

        // your error code can go here

        echo "Desculpe, mas foram encontrado erros no seu envio. ";

        echo "O erros vão aparecer aqui abaixo.<br /><br />";

        echo $error."<br /><br />";

        echo "Por favor, conserte-os. =)<br /><br />";

        die();

    }



    // validation expected data exists

    if(!isset($_POST['name']) ||

        !isset($_POST['email']) ||

        !isset($_POST['message'])) {

        died('Desculpe, mas ocorreu um erro durante seu envio.');

    }


    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    $email_message = "Detalhes do formulário abaixo.\n\n";



    function clean_string($string) {

      $bad = array("content-type","bcc:","to:","cc:","href");

      return str_replace($bad,"",$string);

    }



    $email_message .= "Nome: ".clean_string($name)."\n";

    $email_message .= "Email: ".clean_string($email)."\n";

    $email_message .= "Mensagem: ".clean_string($message)."\n";


	// create email headers

	$headers = 'From: '.$email."\r\n".

	'Reply-To: '.$email."\r\n" .

	'X-Mailer: PHP/' . phpversion();

	@mail($email_to, $email_subject, $email_message, $headers);


?>



<!-- include your own success html here -->



Muito obrigado por entrar em contato conosco. Assim que pudermos, iremos te retornar.



<?php

}

?>
