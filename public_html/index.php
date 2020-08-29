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
         <form action="" class="form"><!--form -->
            <label class="label-input">
                <i class="fas fa-user icon"></i>
                <input type="text" placeholder="Usuário" name="Usuário" require/>
            </label>

            <label class="label-input">
                <i class="fas fa-lock icon"></i>
                <input type="password" placeholder="Senha" name="senha" require/>
            </label>
             
             <button class="btn">sing up</button>
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