function eliminar_registro()
{
    swal({
        title: "Estas seguro que deseas eliminar el registro seleccionado?",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Registro eliminado correctamente", {
          icon: "success",
          });
        } else {
          swal("Eliminacion de registro cancelada");
        }
      });
}

function actualizar_registro()
{
  Swal.fire({
    title: "Quieres guardar los cambios?",
    showDenyButton: true,
    showCancelButton: true,
    confirmButtonText: "Guardar",
    denyButtonText: `Cancelar`
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      Swal.fire("Actualizado correctamente", "", "success");
    } else if (result.isDenied) {
      Swal.fire("Cancelado", "", "info");
    }
  });
}

function cargo(uno)
{
alert("hola");
}

function ventana(emergente)
{
  button.onclick = () => 
  {
   window.open("acerca_de.html");
  };
}