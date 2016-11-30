
$(document).ready(function(){
   mostrarDatos("");
 });


$("#buscar").keyup(function(){
    buscar = $("#buscar").val();
    mostrarDatos(buscar);
});

$("#btnactualizar").click(actualizar);

$("form").submit(function (event){
    event.preventDefault();
            $.ajax({
                url:$("form").attr("action"),
                type:$("form").attr("method"),
                data:$("form").serialize(),
                success:function(respuesta){
                    alert(respuesta);
                }
            });
    });

$("body").on("click", "#listapacientes .button1", function(event){
    event.preventDefault();

    rut_sel = $(this).parent().parent().children("td:eq(0)").text();
    nombre_sel = $(this).parent().parent().children("td:eq(1)").text();
    apellido_sel = $(this).parent().parent().children("td:eq(2)").text();
    // fecha_nac_sel = $(this).parent().parent().children("td:eq(3)").text();
    direccion_sel = $(this).parent().parent().children("td:eq(4)").text();
    celular_sel = $(this).parent().parent().children("td:eq(5)").text();
    email_sel = $(this).parent().parent().children("td:eq(6)").text();
    historial_sel = $(this).parent().parent().children("td:eq(7)").text();

    // echo "Nombre Paciente:", nombre_sel + " " + apellido_sel;

    // $("#rut_sel").val(rut_sel);
    // $("#nombre_sel").val(nombre_sel);
    // $("#apellido_sel").val(apellido_sel);
    // $("#fecha_nac_sel").val(fecha_nac_sel);
    var nombrepaciente = nombre_sel.concat(" ");
    var nombrepaciente2 = nombrepaciente.concat(apellido_sel);
    $("#nombrepacientemod").html(nombrepaciente2);

    $("#rut_sel").val(rut_sel);
    $("#direccion_sel").val(direccion_sel);
    $("#celular_sel").val(celular_sel);
    $("#email_sel").val(email_sel);
    $("#historial_sel").val(historial_sel);

});

$("body").on("click", "#listapacientes .button3", function(event){
    //event.preventDefault();
    rut_sel = $(this).parent().parent().children("td:eq(0)").text();
    alert(rut_sel);
    eliminar(rut_sel);

});

function mostrarDatos(valor){ 
    $.ajax({
        url:"http://localhost:8888/Codeigniter/index.php/modificarficha/mostrar",
        type:"POST",
        data:{buscar:valor},
        success:function(respuesta){
            var registros = eval(respuesta);
            html = "<table class='table table-responsive table-bordered'><thead>";
            html += "<tr><th>Rut</th><th>Nombre</th><th>Apellido</th><th>Fecha Nacimiento</th><th>Direccion</th><th>Celular</th><th>Email</th><th>Historial</th></tr>";
            html += "</thead><tbody>";
            for (var i = 0; i < registros.length; i++) {
                html += "<tr><td>"+registros[i]["rut"]+"</td><td>"+registros[i]["nombre"]+"</td><td>"+registros[i]["apellido"]+"</td><td>"+registros[i]["fecha_nac"]+"</td><td>"+registros[i]["direccion"]+"</td><td>"+registros[i]["celular"]+"</td><td>"+registros[i]["email"]+"</td><td>"+registros[i]["historial"]+
                "</td><td><button class='button button1'><b>EDITAR</b></button></td><td><button class='button button3' type='button'>X</button></td></tr>";
            };
            html += "</tbody></table>";
            $("#listapacientes").html(html);
        }
    });
}

function actualizar(){
    $.ajax({
        url:"http://localhost:8888/Codeigniter/index.php/modificarficha/actualizar",
        type:"POST",
        data:("#form-actualizar").serialize(), 
        success:function(respuesta){
            alert(respuesta);
        }
    });
}



function eliminar(rut){
    $.ajax({
        url:"http://localhost:8888/Codeigniter/index.php/modificarficha/eliminar",
        type:"POST",
        data:{valor:rut}, 
        success:function(respuesta){
            alert(respuesta);
        }
    });
}

$("#target").click(function() {
    alert("OK!");
});



