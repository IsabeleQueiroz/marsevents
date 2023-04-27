<?php
    include_once "../class/conexao.php";
    session_start();
    $idEvento = $_GET['idEvento'];
    $dados = $_SESSION['dadosUsu'];
    $emailuser = $dados['email'];
   
  
    echo "<script>
    alert('Você adquiriu o seu ingresso!');
    window.location.href='../cliente/index.php';
</script>";


?>
