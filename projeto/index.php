<?php 
//conexão com banco de dados
require_once 'conexao.php';
//sessão
session_start();

    if(isset($_POST['btn_entrar'])):
        $erros = array ();
        $user = mysqli_escape_string($conn, $_POST ['login']);
        $senha = mysqli_escape_string($conn, $_POST['senha']);

        if (empty($user) or empty($senha)):
            $erros [] = "<li> O campo login/ senha deverá ser preenchido corretamente</li>";
        else :
            $sql = "SELECT user FROM usuarios WHERE user = '$user'";
            $result = mysqli_query($conn, $sql);
        
            if (mysqli_num_rows($result) > 0) :

            $sql = "SELECT * FROM usuarios WHERE user = '$user' AND senha = '$senha'";
            $result = mysqli_query($conn,$sql);

                if (mysqli_num_rows($result) == 1):
                    $dados = mysqli_fetch_array($result);
                    $_SESSION['logado'] = true;
                    $_SESSION ['id_usuario'] = $dados['id'];
                    
                    else :
                        $erros[] = "<li> Usuário ou senha errado</li>";
                endif;

        else :
            $erros [] = "<li> Usuário não localizado</li>";
        endif;
    endif;
endif;

?>
<html>
<head>
    <title> Login </title>
    <meta charset="utf-8">
</head>
<body>
    <h1>Login </h1>
    <?php
        if(!empty($erros)):
            foreach ($erros as $erro):
                echo $erro;
            endforeach;
        endif;
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        Login : <input type="text" name="login">
        Senha : <input type="password" name="senha">
        <a href="logout.php">
        <button type="submit" name="btn_entrar">Entrar</button>
    </form>

</body>
</html>