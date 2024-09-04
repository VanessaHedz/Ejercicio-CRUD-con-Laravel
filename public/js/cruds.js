let flgVer = true;
let flgEdit = false;

//Add movies to catalog
$("#btnAdd").click(function () {
    let flgVer = false;
    let flgEdit = false;
    $("#formulario-modal").modal("show");
    $("#btnEditar").hide();
    $("#btnSend").show();
    $("#btnSend").text("Enviar");

    //Para poder usar los campos del formulario
    $("#idTitle").attr("disabled", flgVer);
    $("#idTipo").attr("disabled", flgVer);
    $("#idGenero").attr("disabled", flgVer);
    $("#idYear").attr("disabled", flgVer);
    $("#idPlataforma").attr("disabled", flgVer);
});

//Cerrar formulario
$("#btnClose").click(function () {
    $("#formulario-modal").modal("hide");
});

//Enviar el formulario
$("#btnSend").click(function () {
    $("#formulario-modal").modal("hide");
});

/******************************************************************************
 *          FUNCIONES PARA AGREGAR, ELIMINAR, VER Y EDITAR PELÍCULAS
 ******************************************************************************/

//Agregar o editar películas
function AddPeliculas(url) {
    $.ajax({
        type: "post",
        url: url,
        dataType: "json",
        // contentType: false, // The content type used when sending data to the server.
        // cache: false, // To unable request pages to be cached
        // processData: false,
        data: {
            _token: $("input[name=_token]").val(),
            id: $("#idId").val(),
            titulo: $("#idTitle").val(),
            tipo: $("#idTipo").val(),
            genero: $("#idGenero").val(),
            anio: $("#idYear").val(),
            plataforma: $("#idPlataforma").val(),
        },
        success: function (data) {
            if (data.success) {
                //alert("Hola");
                window.location.reload();
            } else {
            }
        },
        error: function () {
            alert("Error en agregar películas");
        },
    });
}

function deletePeliculas(id, url) {
    Swal.fire({
        title: "¿Seguro que quieres eliminar la película?",
        showDenyButton: true,
        contentType: false, // The content type used when sending data to the server.
        cache: false, // To unable request pages to be cached
        processData: false,
        confirmButtonText: "Eliminar",
        denyButtonText: "No eliminar",
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: url,
                dataType: "json",
                data: {
                    _token: $("input[name=_token]").val(),
                    id: id,
                },

                success: function (data) {
                    Swal.fire({
                        title: "El elemento se eliminó permanentemente",
                        icon: "success",
                    }).then((result) => {
                        window.location.reload();
                    });
                },
                error: function () {
                    alert("error al eliminar el registro");
                },
            });
        } else if (result.isDenied) {
            Swal.fire("El elemento no se eliminó", "", "info");
        }
    });
}

function verPelicula(id, url) {
    $.ajax({
        type: "post",
        url: url,
        dataType: "json",
        // contentType: false, // The content type used when sending data to the server.
        // cache: false, // To unable request pages to be cached
        // processData: false,
        data: {
            _token: $("input[name=_token]").val(),
            id: id,
        },
        success: function (data) {
            //Si se recibieron los datos, se deben de mostrar en el formulario.
            $("#formulario-modal").modal("show");
            $("#idId").val(data.data.id);
            $("#idTitle").val(data.data.titulo);
            $("#idTipo").val(data.data.tipo);
            $("#idGenero").val(data.data.genero);
            $("#idYear").val(data.data.anio);
            $("#idPlataforma").val(data.data.plataforma);

            $("#idTitle").attr("disabled", flgVer);
            $("#idTipo").attr("disabled", flgVer);
            $("#idGenero").attr("disabled", flgVer);
            $("#idYear").attr("disabled", flgVer);
            $("#idPlataforma").attr("disabled", flgVer);
        },
        error: function () {
            alert("No se encontró el id");
        },
    });
}

function watchMovie(id, url) {
    $("#formulario-modal").modal("show");
    flgVer = true;
    verPelicula(id, url);
    $("#btnSend").hide();
    $("#btnEditar").hide();
}

function editMovie(id, url) {
    //Es la función del botón verde
    //Autocompletado de los campos
    $("#btnSend").hide();
    $("#btnEditar").show();
    $("#formulario-modal").modal("show");
    flgVer = false;
    verPelicula(id, url);
}

function EditPeliculas(url) {
    $.ajax({
        type: "post",
        url: url,
        dataType: "json",
        // contentType: false, // The content type used when sending data to the server.
        // cache: false, // To unable request pages to be cached
        // processData: false,
        data: {
            _token: $("input[name=_token]").val(),
            id: $("#idId").val(),
            titulo: $("#idTitle").val(),
            tipo: $("#idTipo").val(),
            genero: $("#idGenero").val(),
            anio: $("#idYear").val(),
            plataforma: $("#idPlataforma").val(),
        },
        success: function (data) {
            if (data.success) {
                window.location.reload();
            } else {
            }
        },
        error: function () {
            alert("Error en editar películas");
        },
    });
}
