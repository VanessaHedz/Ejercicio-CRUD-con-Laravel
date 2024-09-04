<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/modals/"> <!-- Para las modales -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/1ba023f67a.js" crossorigin="anonymous"></script>
    
    <title>CRUD con Laravel</title>

</head>
<body>
    <div class="container">
        <br>
        <div class="row">
            <h1>Catálogo de películas</h1><br><br><br>
        </div>

        {{-- Botón ADD --}}
        <div class="row">
            <div class="col-6">
                <button class="btn btn-primary" type="button" id="btnAdd">
                    <i class="fa-solid fa-plus"></i>
                </button><br><br>
            </div>
        </div>
        
        <div class="row">
            <h1></h1>
        </div>

        {{-- Catálogo de películas --}}
        <div class="row">
            <h2>Catálogo: </h2><br><br><br>
        </div>

        <div class="row">
            <table class="table">
                <tr>
                    <!-- <th>id</th> -->
                    <th>Título</th>
                    <th>Acciones</th>
                </tr>
                
                <!-- Mostrar los elementos de la base de datos en la vista -->
                @foreach($peliculas as $key => $pelicula)
                <tr>                    
                    <th>{{ $pelicula->titulo }}</th>
                    <th>
                        <button class="btn btn-danger" type="button" id="btnDel" onclick="deletePeliculas({{ $pelicula->id }}, '{{route('peliculas.delete') }}')">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <button class="btn btn-success" type="button" id="btnEdit" onclick="editMovie({{ $pelicula->id }},'{{ route('peliculas.watch') }}')">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button class="btn btn-primary" type="button" id="btnVer" onclick="watchMovie({{ $pelicula->id }}, '{{ route('peliculas.watch') }}')">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </th>
                </tr>
                @endforeach

            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="formulario-modal" tabindex="-1" role="dialog" aria-labelledby="formulario" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formulario">Formulario</h5>
                </div>
                <!-- Cuerpo del modal -->
                <div class="modal-body">
                    <form id="formulario">
                        @csrf
                        <!-- ID -->
                            <input type="hidden" id="idId">                       
                        <br>
                        <!-- Título -->
                        <div class="form-group">
                            <label for="idTitle">Título:</label>
                            <input type="text" class="form-control" id="idTitle" name="idTitle" placeholder="Título de la película o serie">                        
                        </div>
                        <br>
                        <!-- Tipo -->
                        <div class="form-group">
                            <label for="idTipo">Formato:</label>
                            <input type="text" class="form-control" id="idTipo" name="idTipo" placeholder="Serie, Película o Novela">
                        </div>
                        <br>
                       <!-- Género -->
                        <div class="form-group">
                            <label for="idGenero">Género:</label>
                            <input type="text" class="form-control" id="idGenero" name="idGenero" placeholder="Drama, Acción, Ficción, Ciencia Ficción...">
                        </div>
                        <br>
                        <!-- Año -->
                            <div class="form-group">
                                <label for="idYear">Año:</label>
                                <input type="number" class="form-control" id="idYear" name="idYear" placeholder="Año en el que se estrenó">
                            </div>
                        <br>
                        <!-- Plataforma -->
                            <div class="form-group">
                                <label for="idPlataforma">Plataforma:</label>
                                <input type="text" class="form-control" id="idPlataforma" name="idPlataforma" placeholder="Netflix, Disney+, Prime Video...">
                            </div>
                        <br>
                        {{-- <button type="button" class="btn btn-primary" id="btnSend" onclick='AddEditPeliculas()'>Enviar</button> --}}
                        <button type="button"¿ class="btn btn-primary" id="btnSend" onclick="AddPeliculas('{{ route('peliculas.create') }}')">Enviar</button>
                        <button type="button"¿ class="btn btn-primary" id="btnEditar" onclick="EditPeliculas('{{ route('peliculas.edit') }}')">Editar</button>
                        <button type="button" class="btn btn-secondary" onclick="this.form.reset();" id="btnClose">Cancelar</button>
                    </form>
                </div>
                <!-- Footer -->
                    <!-- No hay footer -->
            </div>
        </div>
    </div>

    {{-- Código js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="{{ asset('libs/jQuery/jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('js/cruds.js') }}"></script>
    <script src=""></script>
</body>
</html>