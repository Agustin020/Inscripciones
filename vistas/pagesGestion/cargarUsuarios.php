<head>
    <style>

        .contenedor form {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            margin: 15px 20px;
            background-color: grey;
        }

        
    </style>
</head>
<div class="contenedor">
    <p class="fs-5" style="margin: 15px 20px;">Asignar al Preceptor/Encargado la sede que le corresponde</p>
    <form action="">
        <div id="seccion">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
        </div>


        <div id="seccion2">
            <p class=" fs-6">Asignar al Preceptor/Encargado la sede que le corresponde</p>
            <div class="form-floating">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <label for="floatingSelect">Works with selects</label>
            </div>
        </div>
    </form>
</div>