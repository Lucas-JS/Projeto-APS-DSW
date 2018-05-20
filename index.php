<?php
// conexão
require_once 'db_connect.php';

// Sessão
session_start();

// botao login
if (isset($_POST['btn-entrar'])) {
 	$erros = array();
 	$email = mysqli_escape_string($connect, $_POST['email']);
 	$senha = mysqli_escape_string($connect, $_POST['senha']);

 	if (empty($email) or empty($senha)) {
 		$erros[] = "<li> O campo email/senha precisa ser preenchido</li>";
 	}else{
 		$sql = "SELECT email FROM usuarios WHERE email = '$email'";
 		$resultado = mysqli_query($connect, $sql);

 		if (mysqli_num_rows($resultado) > 0) {
 			$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
 			$resultado = mysqli_query($connect, $sql);

 				if (mysqli_num_rows($resultado) == 1) {
 					$dados = mysqli_fetch_array($resultado);
 					mysqli_close($connect);
 					$_SESSION['logado'] = true;
 					$_SESSION['id_usuario'] = $dados['id'];
 					header('Location: home.php');
 				}else{
 					$erros[] = "<li> Usuario e senha não conferem </li>";
 				}

 		}else{
 			$erros[] = "<li> Usuario inexistente</li>";
 		}
 	}
 }

// botao registrar
if (isset($_POST['btn-registrar'])) {
 	$nome = mysqli_escape_string($connect, $_POST['nome']);
 	$email = mysqli_escape_string($connect, $_POST['email']);
 	$senha = mysqli_escape_string($connect, $_POST['senha']);

 	$sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

 	if (mysqli_query($connect, $sql)) {
 		header('Location: index.php?sucesso');
 	}else{
 		header('Location: index.php?erro');
 	}
 } 

 ?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>LS News</title>
	<meta name="author" content="Lucas Silva">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet" type="text/css">
	<link rel="icon" href="img/icon.png">
</head>
<body>
	<!--CABEÇALHO-->
	<header class="cabecalho container">
		<a href="home.php"><h1 class="logo">LS News</h1></a>
		<button class="btn-menu bg-gradient"><i class="fa fa-bars fa-lg"></i></button>
		<nav class="menu">
			<a class="btn-close"><i class="fa fa-times"></i></a>
			<ul>
				<li><a href="home.php">home</a></li>
				<li><a href="pais.html">país</a></li>
				<li><a href="mundo.html">mundo</a></li>
				<li><a href="tecnologia.html">tecnologia</a></li>
				<li><a href="esporte.html">esporte</a></li>
				<li><a href="entretenimento.html">entretenimento</a></li>
				<li><a href="curiosidades.html">curiosidades</a></li>
			</ul>
		</nav>
	</header>
	<!-- BANNER -->
	<div class="banner container">
		<div class="title">
			<h2>Seja Bem Vindo!</h2>
			<h2> Projeto APS Desenvolvimento de Software para Web </h2>
		</div>
		<!-- BUTTONS -->
		<div class="buttons">
			<button class="btn btn-login bg-gradient radius"> Login <i class="fa fa-arrow-circle-right"></i></button>
		</div> 
	</div>
	<!--LOGINBOX-->
	<div class="loginbox radius">
		<a class="btn-close-box"><i class="fa fa-times"></i></a>
		<img src="avatar-512a.png" class="avatar">
		<?php
		if (!empty($erros)) {
		 	foreach ($erros as $erro) {
		 		echo $erro;
		 	}
		} 
		?>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<h1>Login</h1>
			<p>Email</p>
			<input type="email" name="email" placeholder="digite seu email" required>
			<p>Senha</p>
			<input type="password" name="senha" placeholder="Sua senha" required>
			<button type="submit" name="btn-entrar"> Login </button>
			<a href="#">Ainda não registrado?</a>
		</form>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="cad-form">
			<h1>Novo registro</h1>
			<p>Usuário</p>
			<input type="name" name="nome" placeholder="Digite seu nome" required>
			<p>Email</p>
			<input type="email" name="email" placeholder="Digite seu email" required>
			<p>Senha</p>
			<input type="password" name="senha" placeholder="Digite sua senha" minlength="6" required>
			<button type="submit" name="btn-registrar">Registrar</button>
			<a href="#">Já tem uma conta?</a>
		</form>
	</div>
		<!-- NOTICIAS HOME -->
		<main class="noticias container">
			<article class=" noticia bg-white radius">
				<a href="#"><img src="img/tite.jpg" alt=""></a>
				<div class="inner">
					<a href="esporte.html"> Esporte </a>
					<h4>O nome “Fred” na lista do Tite foi a maior causa de infartos hoje</h4>
				</div>
			</article>
			<article class=" noticia bg-white radius">
				<a href="#"><img src="img/rio.jpg" alt=""></a>
				<div class="inner">
					<a href="pais.html"> País </a>
					<h4>Prefeitura do Rio adere à onda de assaltos e aumenta passagem para R$ 4</h4>
				</div>
			</article>
			<article class=" noticia bg-white radius">
				<a href="#"><img src="img/kate.jpg" alt=""></a>
				<div class="inner">
					<a href="mundo.html"> Mundo </a>
					<h4>Kate Middleton segue firme em plano de repovoar Inglaterra após o Brexit</h4>
				</div>
			</article>
			<article class=" noticia bg-white radius">
				<a href="#"><img src="img/jobs.jpg" alt=""></a>
				<div class="inner">
					<a href="tecnologia.html"> Tecnologia </a>
					<h4>Jobs tem aparecido em sonhos pedindo a fãs para não atualizar para o IOS 11</h4>
				</div>
			</article>
			<article class=" noticia bg-white radius">
				<a href="#"><img src="img/universal.jpg" alt=""></a>
				<div class="inner">
					<a href="entretenimento.html"> Entretenimento </a>
					<h4>Cadeiras estavam vazias em sessões esgotadas porque tinham problema de encosto, diz Universal</h4>
				</div>
			</article>
			<article class=" noticia bg-white radius">
				<a href="#"><img src="img/bateria.jpg" alt=""></a>
				<div class="inner">
					<a href="curiosidades.html"> Curiosidades </a>
					<h4>Olhar bateria do celular a cada minuto não aumenta duração</h4>
				</div>
			</article>
		</main>
		<!-- NEWSLETTER -->
		<section class="newsletter container bg-black">
			<h2>Mantenha-se informado!</h2>
			<h3> Receba notícias quentinhas em seu email!</h3>
			<form action="">
				<input type="email" name="email" placeholder="Digite seu email" class="bg-black radius">
				<button class="bg-white radius"> Cadastrar </button>
			</form>
		</section>
		<!-- RODAPÉ -->
		<footer class="rodape container bg-gradient">
			<div class="social-icons">
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-google"></i></a>
				<a href="#"><i class="fa fa-instagram"></i></a>
				<a href="#"><i class="fa fa-envelope"></i></a>
			</div>
			<p class="copyright">Copyright &copy; LS News 2018 - Desenvolvimento de Software para Web </p>
		</footer>
		<!-- JQUERY BOTAO MENU -->
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script>
			$(".btn-menu").click(function(){
				$(".menu").show();
			});
			$(".btn-close").click(function(){
				$(".menu").hide();
			});
			$(".btn-login").click(function(){
				$(".loginbox").show();
			});
			$(".btn-close-box").click(function(){
				$(".loginbox").hide();
			});
			$('.loginbox a').click(function(){
			$('form').animate({height: "toggle", opacity:"toggle"}, "slow");
			});
		</script>	
</body>
</html>