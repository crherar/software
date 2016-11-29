




function mostrarDatos(valor){
    $.ajax({
        url:"http:/localhost/Codeigniter/index.php/modificarficha/mostrar",
        type:"POST",
        data:{buscar:valor},
        success:function(respuesta){
            alert(respuesta);
        }
    });
}
