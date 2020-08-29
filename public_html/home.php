<?php
//conecxão
require_once (__DIR__.'/db/db_connect.php');
//sessao
session_start(); 
//verificação
if(!isset($_SESSION['logado'])):
	header('Location: index.php');
endif;
//dados
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id_usuario = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($connect);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pagina restrita</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Olá <?php echo $dados['login_usuario']; ?></h1>
	<a href="logout.php">Sair</a>

</body>
</html>