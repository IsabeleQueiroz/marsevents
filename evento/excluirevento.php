<?php

include_once("../class/conexao.php");

session_start();
    $dados = $_SESSION['dadosUsu'];
    $idEv = $_GET['idEv'];
   

    $remove = "SELECT * FROM eventos WHERE id=$idEv";
    $remove_result = mysqli_query($conn, $remove);
    $evento_data = mysqli_fetch_array($remove_result);
    $arquivo = $evento_data['foto'];
    unlink('imagens_evento/'.$arquivo); 

    $sql = "DELETE FROM eventos WHERE id=$idEv";
    $result = mysqli_query($conn, $sql);

    echo "<script>alert('Excluido com sucesso!');
    window.location.href = '../cliente/index.php';</script>";

?>