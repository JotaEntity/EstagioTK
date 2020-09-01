<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	</head>
	<style>

		body {
			background-color:#333;
		}

		label {
			color:white !important;
		}

		.center {
		    position: absolute;
		    width:35%;
		    top: 50%;
		    left: 50%;
		    -moz-transform: translateX(-50%) translateY(-50%);
		    -webkit-transform: translateX(-50%) translateY(-50%);
		    transform: translateX(-50%) translateY(-50%);
		}


	</style>
	<body>

	<div class="center">
		<form method="post" action="notify.php">
		  <div class="form-group">
		    <label for="nome">Nome</label>
		    <input type="text" class="form-control" id="nome" name="nome" placeholder="Jota">
		  </div>
		  <div class="form-group">
		    <label for="email">Email address</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="joaomarcelinodev@gmail.com">
		  </div>
		  <div class="form-check">
		    <input type="checkbox" class="form-check-input" id="info" name="check-input">
		    <label class="form-check-label" for="info">Eu quero receber as informações do curso!</label>
		  </div>
		  <button type="submit" class="btn btn-primary">Cadastrar</button>
		</form>
		<?php
		if(isset($_SESSION['erro'])) {
			echo '<br>'.'<p style="color:white;">Erro: '.$_SESSION['erro'].'</p>';
			unset($_SESSION['erro']);
		}
		?>
	</div>

	</body>
</html>
