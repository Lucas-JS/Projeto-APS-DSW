<?php 
// conexão
require_once 'db_connect.php';

// Sessão
session_start();

//verificação
if (!isset($_SESSION['logado'])) {
	header('Location: index.php');
}

// dados
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($connect);
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
			<h2> Nosso compromisso é com a verdade dos fatos! </h2>
		</div>
		<div class="logado bg-gradient radius">
			<p>Bem vindo usuário <?php echo $dados['nome']; ?></p>
			<a href="logout.php"> Sair <i class="fa fa-times"></i></a>
		</div>
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