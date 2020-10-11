<?php
    $Dchamado =  $_GET["Nchamado"];
    $Dnome =     $_GET ["Snome"];
    $Drastreio = $_GET ["Nrastreio"];
    $Dendereco = $_GET ["endereco"];
    $Dcep =    $_GET ["Ncep"];
    $Dcidade = $_GET ["Ncidade"];
    $Destado = $_GET ["Nestado"];
    $Dobjeto = $_GET ["Nobjeto"];

    echo $Dchamado, $Dnome, $Drastreio, $Dendereco, $Dcidade, $Destado, $Dobjeto;
    
$strcon = mysqli_connect ('localhost','root','','usuariobd') or die ("Erro ao conectar ao banco de dados");
$sql = "INSERT INTO usuariotd (chamado,nome,rastreio,endereco,cep,cidade,estado,obejto)VALUES ('$Dchamado','$Dnome','$Drastreio','$Dendereco','$Dcep','$Dcidade','$Destado','$Dobjeto')";
//$sql .= "('$Dchamado','$Dnome','$Drastreio','$Dendereco','$Dcep','$Dcidade','$Destado','$Dobjeto')";
mysqli_query($strcon,$sql) or die ("Erro ao inserir os dados");
mysqli_close($strcon);

echo "Envio registrado com sucesso";


?>