<?php
$servidor = "127.0.0.1";
$usuario = "root";
$senha = "";
$database = "db_salv";

//criar conexão
$conn = mysqli_connect ($servidor,$usuario,$senha,$database);

if (mysqli_connect_error()):
    echo "Falha na conexão".mysqli_connect_error();
endif;

?>