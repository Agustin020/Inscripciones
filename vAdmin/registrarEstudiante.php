<head>
    <style>
        .contenedor {
            background-color: cyan;
            margin: 10px 20px;
        }

        .contenedor p {
            margin-bottom: 5px;
        }

        .contenedor select {
            width: auto;
            margin-bottom: 15px;
        }

        .contenedor #selectAsignacion {
            display: flex;
            justify-content: space-evenly;
        }
    </style>
</head>
<div class="contenedor">
    <p class="fs-5">Seleccione el estudiante (Estos estudiantes no estan asignados al año, la carrera y la sede)</p>
    <div class="form-floating">
        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
            <option selected>Open this select menu</option>
            <?php
            foreach ($listEstudiantesNA as $listaEstudiantes) {
            ?>
                <option value="<?php echo $listaEstudiantes[0] ?>"><?php echo $listaEstudiantes[1] ?></option>
            <?php
            }
            ?>
        </select>
        <label for="floatingSelect">Works with selects</label>
    </div>
    <p class="fs-5">Asignar al estudiante según corresponda de acuerdo a la inscripción</p>
    <div id="selectAsignacion">

        <div class="form-floating">
            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                <option selected>Click para desplegar</option>
                <option value="1">1er Año</option>
                <option value="2">2do Año</option>
                <option value="3">3er Año</option>
            </select>
            <label for="floatingSelect">Seleccione el año</label>
        </div>

        <div class="form-floating">
            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                <option selected>Open this select menu</option>
                <?php foreach ($listCarrera as $carrera) { ?>
                    <option value="<?php echo $carrera[0]; ?>"><?php echo $carrera[1] ?></option>
                <?php } ?>
            </select>
            <label for="floatingSelect">Seleccione la carrera</label>
        </div>

        <div class="form-floating">
            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <label for="floatingSelect">Seleccione la sede</label>
        </div>
    </div>
</div>