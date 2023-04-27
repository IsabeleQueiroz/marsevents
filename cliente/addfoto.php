
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar imagem de perfil</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="savefoto.php" enctype="multipart/form-data" method="POST">
                    <input type="file" name="img_perfilnovo">
                    <label for="img_perfilnovo">Clique para adicionar sua nova imagem de perfil</label>
                    <br><br>
                    <input type="submit" value="Salvar" name="salvar">
                </form>
            </div>
        </div>
    </div>
</body>
</html>