<?php
include_once("../class/conexao.php");
session_start();
$dados = $_SESSION['dadosUsu'];

//print_r($dados);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>meu perfil</title>
</head>

<body>
    <a href="./index.php"><- voltar</a>
    <br>

    <?php
    if ($dados['foto'] == "") {

        echo "<img src='./imagens_cliente/img_perfil.jpg'>";
    } else {
        echo "<img src='./imagens_cliente/$dados[foto]'>";
    }

    ?>
    <br>
    <a href="./addfoto.php" class="bi bi-pencil-square"></a>
    <br>
    <a href="sair.php">Excluir conta</a>
    <table class="table-light">
        <tr class="table-light">
            <td class="table-light">
                <p>Nome</p>
            </td>
            <td class="table-light">
                <p><?php echo $dados['nome']; ?></p>
            </td>
        </tr>
        <tr class="table-light">
            <td class="table-light">
                <p>Email</p>
            </td>
            <td class="table-light">
                <p><?php echo $dados['email']; ?></p>
            </td>
        </tr>
        <tr class="table-light">
            <td class="table-light">
                <p>Telefone</p>
            </td>
            <td class="table-light">
                <p><?php echo $dados['tel']; ?></p>
            </td>
        </tr>
    </table>

    <br><br><br>


    <?php
    $email = $dados['email'];
    $sql = "SELECT * FROM eventos WHERE email_dono = '$email'";
    $result = $conn->query($sql);
   
    if (mysqli_num_rows($result)) {
    ?>
        <h3>Eventos criados por mim:</h3>
        <table class="table-light">
            <thead>
                <th scope="col">Nome do Evento</th>
                <th scope="col">Data </th>
                <th scope="col"> Horario</th>
                <th scope="col"> Local</th>
                <th scope="col"> Categoria</th>
                <th scope="col"> Excluir</th>
                <th scope="col"> Editar</th>


            </thead>

            <?php
            while ($row = mysqli_fetch_array($result)) {
                $sql2 = "SELECT * FROM categoria_evento WHERE id = '$row[id_categoria]'";
                $result2 = $conn->query($sql2);
                $row2 = mysqli_fetch_array($result2);

            ?>

                <tr class="table-light">
                    <td class="table-light">
                        <p><?php echo $row['nome']; ?></p>
                    </td>
                    <td class="table-light">
                        <p><?php echo $row['data_evento']; ?></p>
                    </td>
                    <td class="table-light">
                        <p><?php echo $row['horario']; ?></p>
                    </td>
                    <td class="table-light">
                        <p><?php echo $row['local_evento']; ?></p>
                    </td>
                    <td class="table-light">
                        <p><?php echo $row2['desc']; ?></p>
                    </td>
                    <td class="table-light">
                        <a href="../evento/editarevento.php" class="bi bi-pencil-fill"></a>
                    </td>
                    <td class="table-light">
                        <a href="<?php echo '../evento/excluirevento.php?idEv='.$row['id'] ?>" class="bi bi-trash"></a>  
                    </td>
                    
                </tr>


        <?php 
        }
        ?>
        </table>
        <?php
        }
        ?>
        <br><br><br><br>
        <?php 
            $sql3 = "SELECT * FROM ingresso WHERE email_usuario = '$email'";
            $result3 = $conn->query($sql3);
            if(mysqli_num_rows($result3)){
                ?>
                <h3>Carrinho</h3>
                <?php
                while($row3 = mysqli_fetch_array($result3)){
                    $id_evento= $row3['id_evento'];
                    $sql4 = "SELECT * FROM eventos WHERE id = '$id_evento'";
                    $result4 = $conn->query($sql4);
                    $row4 = mysqli_fetch_array($result4);
                ?>
                <div class="card" style="width: 18rem;">
                    <img src="../evento/imagens_evento/<?php echo $row4['foto']?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row4['nome']?></h5>
                        <p class="card-text">N° do evento: <?php echo $row3['id_evento']?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">N° do ingresso: <?php echo $row3['id']?></li>
                        <li class="list-group-item">Valor: R$<?php echo $row4['valor_ingresso']?>,00</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Pagar</a>
                        <a href="<?php echo '../ingresso/retiraringresso.php?idIngresso='.$row3['id'] ?>" class="card-link">Retirar do carrinho</a>
                    </div>
                </div>
                <br>
             <?php
            }}
        ?>

        

</body>

</html>