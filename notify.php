<?php
session_start();

$nome = $_POST['nome'];
$email = $_POST['email'];

if(empty($nome) or empty($email)) {
	$_SESSION['erro'] = "Preencha os requisitos.";
	header('location: register');
	exit();
} else {
	if(preg_match('/^[a-zA-Z ]+$/', $nome)) {
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$data = date("d-m-Y H:i");
			if(isset($_POST['check-input'])) {
				$data = "payload=".json_encode(array(
						"text" => "Olá!\nUm aluno se cadastrou! Segue os seus dados:\nAluno:".$nome."\nE-mail:".$email."\nData:".$data."\nQuero receber as informações do curso? Sim",
						"username" => "Bot PHP do João"
					), JSON_UNESCAPED_UNICODE);
				$ch = curl_init("https://hooks.slack.com/services/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");
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_exec($ch);
				curl_close($ch);
				echo "Registrado!";
				exit();
			} else {
				// cadastrado porém não quer receber as informações
				$data = "payload=".json_encode(array(
						"text" => "Olá!\nUm aluno se cadastrou! Segue os seus dados:\nAluno:".$nome."\nE-mail:".$email."\nData:".$data."\nQuero receber as informações do curso? Não",
						"username" => "Bot PHP do João"
					), JSON_UNESCAPED_UNICODE);
				$ch = curl_init("https://hooks.slack.com/services/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");
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_exec($ch);
				curl_close($ch);
				echo "Registrado!";
				exit();
			}

		} else {
			$_SESSION['erro'] = "Utilize um e-mail válido.";
			header('location: register');
			exit();
		}
	} else {
		$_SESSION['erro'] = "Utilize apenas letras no seu nome.";
		header('location: register');
		exit();
	}
}

?>
