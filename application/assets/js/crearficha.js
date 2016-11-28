$(document).on("ready",inicio);

function inicio(){
	$("form").submit(function(event){
		event.preventDefault();
		alert(hola)
	});
}