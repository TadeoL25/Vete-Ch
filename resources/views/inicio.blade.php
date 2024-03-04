<!doctype html>
<html lang="en">
    <head>
        <title>Inicio</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>

    <body>
        <header>
            <!-- place navbar here -->
            <nav
                class="navbar navbar-expand-sm navbar-light bg-light"
            >
                <div class="container">
                    <a class="navbar-brand" href="#">Mascotas</a>
                    <button
                        class="navbar-toggler d-lg-none"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavId"
                        aria-controls="collapsibleNavId"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" aria-current="page"
                                    >Clientes
                                    <span class="visually-hidden">(current)</span></a
                                >
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('perrosruta')}}">Mascotas</a>
                            </li>

                        </ul>
                        <form class="d-flex my-2 my-lg-0">
                            <input
                                class="form-control me-sm-2"
                                type="text"
                                placeholder="Search"
                            />
                            <button
                                class="btn btn-outline-success my-2 my-sm-0"
                                type="submit"
                            >
                                Search
                            </button>
                        </form>
                    </div>
                </div>
            </nav>

        </header>
        <main>
            <div class="container d-flex justify-content-end mt-3">
                <!-- Modal trigger button -->
            <button
            type="button"
            class="btn btn-primary btn-lg"
            data-bs-toggle="modal"
            data-bs-target="#modalId"
        >
        <i class="bi bi-plus-lg"></i>

        </button>

        <!-- Modal Body -->
        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
        <div
            class="modal fade"
            id="modalId"
            tabindex="-1"


            role="dialog"
            aria-labelledby="modalTitleId"
            aria-hidden="true"
        >
            <div
                class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                role="document"
            >
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Datos</h3>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>

                    <form action="{{route('persona.nuevo')}}" method="POST">
                        @csrf
                        <div class="container">
                            <label for="" class="mx-3 mt-2">Nombre</label>
                            <input type="text" name="nombre" id="" class="form-control my-2">
                            <label for="" class="mx-3">Dirección</label>
                            <input type="text" name="direccion" id="" class="form-control my-2">
                            <div class="container d-flex justify-content-center">
                                <button type="submit" class="btn btn-success my-3">Enviar</button>
                            </div>

                        </div>
                    </form>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-danger"
                            data-bs-dismiss="modal"
                        >
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
            </div>

            <div id="info" class="container mt-5">
                <h2>Clientes</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Edición</th>
                        </tr>
                    </thead>
                    <tbody id="carrito-body">

                        @foreach ($personas as $persona)
                        <tr>
                            <td>{{$persona->id}}</td>
                            <td>{{$persona->nombre}}</td>
                            <td>{{$persona->direccion}}</td>
                            <td class="d-flex"> 
                                <form action="{{ route('persona.editar', $persona->id) }}" method="POST">
                                    <button type="button" class="btn btn-primary mx-2" onclick="editar('{{ $persona->id }}', '{{ $persona->nombre }}', '{{ $persona->direccion }}')">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                </form>             
                                <form action="{{ route('persona.eliminar', $persona->id) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>

                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Modal trigger button -->

            <!-- Modal Body -->
            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
            <div
                class="modal fade"
                id="modalIdEditar"
                tabindex="-1"
                data-bs-backdrop="static"
                data-bs-keyboard="false"

                role="dialog"
                aria-labelledby="modalTitleId"
                aria-hidden="true"
            >
                <div
                    class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                    role="document"
                >
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">
                                Modal title
                            </h5>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>

                        <form id="edita" action="{{ route('persona.editar', $persona->id) }}" method="POST">
                            @csrf
                            <div class="container">
                                <label for="" class="mx-3 mt-2">Nombre</label>
                                <input type="number" name="id" id="id" readonly style="display: none">
                                <input type="text" name="nombre" id="editarNombre" class="form-control my-2">
                                <label for="" class="mx-3">Dirección</label>
                                <input type="text" name="direccion" id="editarDireccion" class="form-control my-2">
                                <div class="container d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success my-3">Actualizar</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>

            <!-- Optional: Place to the bottom of scripts -->
            <script>
                const myModal = new bootstrap.Modal(
                    document.getElementById("modalIdEditar"),
                    options,
                );
            </script>


            <!-- Optional: Place to the bottom of scripts -->


            <script>
                    function editar(id, nombre, direccion) {
                        console.log(id, nombre, direccion); 
                        $('#editarNombre').val(nombre);
                        $('#editarDireccion').val(direccion);
                        $('#id').val(id);(id);
                        //LLamar a la funcion de editar
                        $('#modalIdEditar').modal('show');
                    }
            </script>
            
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </body>
</html>