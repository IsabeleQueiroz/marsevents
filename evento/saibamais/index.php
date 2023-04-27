<?php
    include_once "../../class/conexao.php";
    session_start();
    $dadosUsu= $_SESSION['dadosUsu'];
    $tipo = $dadosUsu['id_usuario'];
    echo $tipo; 
    $id = $_GET['idEvent'];
    $sql = "SELECT * FROM eventos WHERE id = $id";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    $sql2 = "SELECT * FROM categoria_evento WHERE id = '$row[id_categoria]'";
     $result2 = $conn->query($sql2);
     $row2 = mysqli_fetch_array($result2);

   
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saiba mais</title>
</head>
<body>
    <table class="table">
  <thead>
    <th><img src='../imagens_evento/<?php echo $row['foto']?>' class='d-block w-100' alt='...' style= "width:500px" height="300px"></th>
  </thead>
  <tbody>
    <tr><td><?php echo $row['nome'] ?></td></tr>
    <tr><td><?php echo $row2['desc'] ?></td></tr>
    <tr><td><?php echo $row['descricao'] ?></td></tr>
    <tr><td>Data do evento: <?php echo $row['data_evento'] ?></td></tr>
    <tr><td>Horário: <?php echo $row['horario'] ?></td></tr>
    <tr><td>Local: <?php echo $row['local_evento'] ?></td></tr>
    <tr><td>Serviço necessário: <?php echo $row['servico'] ?></td></tr>
    <tr><td>Quantidade de ingressos: <?php echo $row['qtd_ingressos'] ?> unidades</td></tr>
    <tr><td>Valor do ingresso: R$<?php echo $row['valor_ingresso'] ?></td></tr>
    <tr><td>Organizador: <?php echo $row['nome_dono'] ?></td></tr>
    <tr><td>Contato do organizador: <?php echo $row['email_dono'] ?></td></tr>
  </tbody>
</table>

<?php if($tipo == 2){?>
<a href="<?php echo '../../ingresso/index.php?idEvento='.$id ?>">Adquirir ingresso</a>
<?php } else {?>
  <a href="<?php echo '../participar/index.php?idEvento='.$id ?>">Desejo participar do evento</a>
  <?php } ?>
</body>
</html>