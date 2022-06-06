<?php
if (isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] == 2) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        section{
            padding: 15px;
        }    
    </style>

</head>

<body>
    <section id="container">
        <p class="fs-5">Inscribir estudiante</p>
        <hr>
        <p class="fs-6">Completar la inscripción al estudiante a buscar</p>
    </section>
</body>
</html>

<?php
    }
}
?>