<?php 
//conexão
require_once (__DIR__.'/db/db_connect.php');
//sessão
session_start();
//botão enviar
if(isset($_POST['btn'])):
    $erros = array();
    //pegando os dados
    $login = mysqli_escape_string($connect, $_POST['login']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);
    //verificando se os campos vieram vazios
    if(empty($login) or empty($senha)):
        $erros[] = '<li class="msg-erros">O campo Usuário/Senha precisa ser preenchido</li>';
    else:
        //verifica se os login usuario exsite com esse login
        $sql = "SELECT login_usuario FROM usuarios WHERE login_usuario = '$login'";
        //resultado armazena a consulta
        $resultado = mysqli_query($connect, $sql);
        //verifica se exsite algum registro
        if(mysqli_num_rows($resultado) > 0):
            //criptografando a senha antes de comparar 
            $senha = md5($senha);
        //verifica se o login e senha está correto
        $sql = "SELECT * FROM usuarios WHERE login_usuario = '$login' AND senha_usuario = '$senha'";
        //resultado armazena a consulta
        $resultado = mysqli_query($connect, $sql);
        if(mysqli_num_rows($resultado) == 1):
            //converte o resultado em arrya e atribui a $dados
            $dados = mysqli_fetch_array($resultado);
            mysqli_close($connect);
        //criando sessao
        $_SESSION['logado'] = true;
        $_SESSION['id_usuario'] = $dados['id_usuario'];
        //redirecionando para pagina caso tudo esteja ok
        header('Location: home.php');
        else:
            $erros[] = '<li class="msg-erros">Usuário e senha não conferem</li>';
        endif;
    else:
        $erros[] = '<li class="msg-erros">Usuário não cadastrado, consulte o administrador</li>';
    endif;
endif;
endif;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="keywords" content="Sistema Login, Login, Sistema para login"/>
    <meta name="description" content=" Sistema de Login, HTML, CSS e PHP"/>
    <meta name="author" content="Araujo Developer"/>
    <link rel="stylesheet" href="css/style.css"/>
    <title>Sistema de Login</title>
</head>
<body>

<div id="container"><!--container -->
    <div class="content second-content">
        <div class="second-column"><!--second-colum -->
            <h2 class="title">Welcome back!</h2>
            <p class="description">login apenas para cadastrados</p>
<?php 
if(!empty($erros)):
    foreach($erros as $erro):
        echo $erro;
    endforeach;
endif;
?>
         <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="form" method="POST"><!--form -->
            <label class="label-input">
                <i class="fas fa-user icon"></i>
                <input type="text" placeholder="Usuário" name="login" required/>         
            </label>

            <label class="label-input">
                <i class="fas fa-lock icon"></i>
                <input type="password" placeholder="Senha" name="senha" minlength="8" required/>
            </label>
             
             <button type="submit" name="btn" class="btn" >sing up</button>
         </form><!--end form -->
        </div><!--end second-colum -->
    </div>
    <footer>
        <p class="description">Desenvolvido por Araujod Developer</p>
    </footer>
</div><!--end container -->
<script src="https://kit.fontawesome.com/8003cca3c7.js" crossorigin="anonymous"></script>
</body>
</html>