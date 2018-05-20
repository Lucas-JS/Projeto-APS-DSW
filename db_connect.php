<?php
// conexão com o banco de dados
$servername = "fdb13.eohost.com";
$username = "2072377_lucas";
$password = "deva174823";
$db_name = "2072377_lucas";

$connect = mysqli_connect($servername, $username, $password, $db_name);
mysqli_set_charset($connect, "utf8");

if (mysqli_connect_error()) {
	echo "Falha na conexão: ".mysqli_connect_error();
}


 ?>