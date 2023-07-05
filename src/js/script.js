$(document).ready(function(){
    $("boton-enviarformulario").click(function(){
		$.post("reserva.php",$("myForm").serialize(),function(){
			alert("La informacion fue recibida por el archivo 1 ");
		});

		$.post("imprimir_reserva.php",$("myForm").serialize(),function(){
			alert("La informacion fue recibida por el archivo 2 ");
		});

		return false;		
	});
});




function goBack() {
    window.history.back();
  }

function imprimirFormulario() {
// Obtén el contenido HTML del formulario
var formulario = document.getElementById("miFormulario").innerHTML;

// Abre una nueva ventana para mostrar el contenido del formulario
var ventana = window.open("", "_blank");
ventana.document.write(formulario);
// Agrega tu documento previamente declarado
ventana.document.write('<embed src="src/contrato.pdf" type="application/pdf" width="100%" height="600px">');
ventana.document.write('<embed src="src/contrato_renta.pdf" type="application/pdf" width="100%" height="600px">');

// Imprime la página actual
ventana.print();

}

 