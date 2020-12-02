	var imagenes = new Array();
imagenes[0]="images/cabecera3.jpg";
imagenes[1]="images/cabecera3.jpg";
imagenes[2]="images/cabecera3.jpg";
imagenes[3]="images/cabecera3.jpg";

var i=0;
var t;

function cargarimagen(){
	document.carrusel.src = imagenes[i];
	
	if (i<imagenes.length - 1){
		i++
	}
	else{
		i=0;
	}
	
	t=setTimeout(cargarimagen,1500);
}
function temporizador(){
	t=setTimeout(cargarimagen, 1500);
}
window.onload=cargarimagen;