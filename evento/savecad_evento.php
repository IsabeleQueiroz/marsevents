<?php
include_once ('../class/conexao.php');
session_start();
$email_dono=$_POST['email_dono'];
$result = mysqli_query($conn, "SELECT * FROM cliente WHERE email = '$email_dono'");

if (mysqli_num_rows($result) > 0){

    if(isset($_POST['criar_event']) && (isset($_FILES['foto_evento']))){
    $pasta = "./imagens_evento/";
    $extensao = strtolower(substr($_FILES['foto_evento']['name'],-4));
    $nome_img=md5(time()).$extensao;
    move_uploaded_file($_FILES['foto_evento']['tmp_name'],$pasta.$nome_img);
   
    $nome_evento= $_POST['nome_evento'];
    $categoria = $_POST['categoria'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $local = $_POST['local'];
    $servico = $_POST['especializacao'];
    $forma_pagamento= $_POST['forma_pagamento'];
    $email_dono = $_POST['email_dono'];
    $nome_dono = $_POST['nome_dono'];
    $descricao = $_POST['desc'];
    $rest_idade = $_POST['rest_idade'];
    $qtd_pessoas = $_POST['qtd_pessoas'];
    $valor_ingresso = $_POST['valor_ingresso'];
    $qtd_ingressos = $_POST['qtd_ingressos'];
    
   
    $cadastro_eve = mysqli_query($conn, "INSERT INTO eventos (nome, id_categoria, data_evento, horario, local_evento, servico, formas_pagamento, email_dono,  nome_dono, foto, descricao, rest_idade, qtd_pessoas, valor_ingresso, qtd_ingressos) VALUES ('$nome_evento', '$categoria', '$data', '$horario', '$local', '$servico', '$forma_pagamento', '$email_dono', '$nome_dono', '$nome_img', '$descricao', '$rest_idade','$qtd_pessoas','$valor_ingresso', '$qtd_ingressos')");
 
    header("location: ../cliente/index.php");

} else{
    echo "<script>alert('Nao foi possivel cadastrar seu evento, tente novamente!');
    window.location.href = './cadevento.php';</script>";
}
} else{
    echo "<script>alert('Seu email deve ser o mesmo do seu perfil na plataforma, tente novamente!');
    window.location.href = './cadevento.php';</script>";
}

?>