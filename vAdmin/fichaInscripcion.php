<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require('libreria.php'); ?>
    <style>
        section {
            padding: 10px;
        }
    </style>
</head>

<body>
    <?php require('header.php'); ?>
    <section>
        <form action="" method="post">
            <p class="fs-5">Ficha de Inscripción</p>
            <hr>
            <div class="form-floating">
                <input type="text" class="form-control" name="user" id="user" placeholder="Usuario">
                <label for="floatingInput">Usuario</label>
            </div>
        </form>
    </section>
</body>

</html>