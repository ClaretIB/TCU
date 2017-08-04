/*_______________________________________________________________________
-------------------------------- TEACHER ---------------------------------
__________________________________________________________________________*/

/*-------- INTERFAZ ------*/
$("#profesorcheck").click(function() {
    if($(this).is(":checked")) {
        $("#codigoProfesor").removeClass("ocultar");
        $("#codigoProfesor").addClass("form-control");
    }else{
    	 $("#codigoProfesor").addClass("ocultar");
    	 $("#codigoProfesor").removeClass("form-control");
    }
});

/*------- VALIDA CORREOS -----*/
function validaCorreos(correo){
     var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    if (regex.test(correo.trim())) {
        return true;
    } else {
        return false;
    }
}

/*---------- LOGOUT ----------*/    
$("#logoutid").click(function(){
    location.href = "./index.php";
});

/*----- CARGA PAGINA USER ---*/
$("#userid").click(function(){
    location.href = "./user.php";
});

function consult(){ /*------------------------------------------ NOSE */
    if(localStorage.getItem("teacherIdentification")!=""){
          $("#updateCedula").val(localStorage.getItem("teacherIdentification"));
          $("#updateNombre").val(localStorage.getItem("teacherName"));
          $("#updateMail").val(localStorage.getItem("teacherEmail"));
    }
}
consult();

/*---------- INSERTAR --------*/
$('#insertarUsuario').click(function () {
    if( $('#passUsuario').val()== $('#passUsuarioV').val()){
        if($('#cedulaUsuario').val() != "" && $('#nombreUsuario').val() != "" && $('#emailUsuario').val() != "" && $('#passUsuario').val() != ""){
            if(validaCorreos($('#emailUsuario').val()) == true){  
                if(isNaN($('#cedulaUsuario').val())==false && $('#cedulaUsuario').val().length==9 || $('#cedulaUsuario').val().length==10){  
                    if(/^[a-z," ",ñ,á,é,í,ó,ú]+$/i.test($('#nombreUsuario').val())){
                        $.ajax({
                        type: "POST",
                        url: "./index.php",
                        data: {
                            methodName: "insertarUsuario",
                            cedula: $('#cedulaUsuario').val(),
                            nombre: $('#nombreUsuario').val(),
                            email: $('#emailUsuario').val(),
                            pass: $('#passUsuario').val(),
                        },
                        success: function (data) {
                            if(data == "1"){
                                $("#alertMessageCreateUser").html("<strong>¡Success!</strong>Usuario creado con exito");
                                $('#alerInserUser').show().delay(3000).fadeOut("slow");
                                $('#cedulaUsuario').val("");
                                $('#nombreUsuario').val("");
                                $('#emailUsuario').val("");
                                $('#passUsuario').val("");
                                $('#passUsuarioV').val("");
                            }else if(data == "-2"){
                                $("#alertMessageCreateUserRown").html("<strong>¡Error!</strong>El usurio ya existe");
                                $('#alerInserUserWrong').show().delay(3000).fadeOut("slow");
                            }else{
                                $("#alertMessageCreateUserRown").html("<strong>¡Error!</strong>Hay problemas, intente m&aacute;s tarde");
                                $('#alerInserUserWrong').show().delay(3000).fadeOut("slow"); 
                            }
                        },
                        error: function (xhr, textStatus, error) {
                            console.log(xhr.statusText);
                            console.log(textStatus);
                            console.log(error);
                        },
                        });
                    }else{
                        $("#alertMessageCreateUserRown").html("<strong>¡Error!</strong>El nombre no puede contener caracteres especiales ni numeros");
                        $('#alerInserUserWrong').show().delay(3000).fadeOut("slow");
                        $('#alerInserUser').addClass("ocultar");
                    }
                }else{
                    $("#alertMessageCreateUserRown").html("<strong>¡Error!</strong>Formato cedula 303330333");
                    $('#alerInserUserWrong').show().delay(3000).fadeOut("slow");
                    $('#alerInserUser').addClass("ocultar");
                }
            }else{
                $("#alertMessageCreateUserRown").html("<strong>¡Error!</strong>El correo posee un formato inadecuado");
                $('#alerInserUserWrong').show().delay(3000).fadeOut("slow");
                $('#alerInserUser').addClass("ocultar");
            }
        }else{
            $("#alertMessageCreateUserRown").html("<strong>¡Error!</strong>Todos los campos son requeridos");
            $('#alerInserUserWrong').show().delay(3000).fadeOut("slow");
            $('#alerInserUser').addClass("ocultar");   
        }
    }else{
        $("#alertMessageCreateUserRown").html("<strong>¡Error!</strong>Las contraseñas no coinsiden");
        $('#alerInserUserWrong').show().delay(3000).fadeOut("slow");
        $('#alerInserUser').addClass("ocultar");
    }
});

/*----------- LOGUIN TEACHER ------------*/
$('#loginbtn').click(function () {
    $.ajax({
        type: "POST",
        url: "./index.php",
        dataType: "JSON",
        data: {
            methodName: "loginUsuario",
            cedula: $('#user').val(),
            pass: $('#pass').val(),
        },
        success: function (data) {
            if(data.teacherIdentification == null){ 
                $("#alertLoguinIncorrect").show().delay(3000).fadeOut("slow");
            }else{
                $("#alertLoguinIncorrect").addClass("ocultar");
                localStorage.setItem("teacherIdentification", data.teacherIdentification);
                localStorage.setItem("teacherId", data.teacherId);
                localStorage.setItem("teacherName", data.teacherName);
                localStorage.setItem("teacherEmail", data.teacherEmail);
                localStorage.setItem("$teacherPass", data.teacherPass);
                location.href = "./home.php";
                localStorage.setItem("controlGroups", "1");      
            }     
        },
        error: function (xhr, textStatus, error) {
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
        },
    });
});

/*------------ ACTUALIZAR TEACHER ----------*/
$('#jj').click(function () {
    var  changeId=0;
    if(localStorage.getItem("teacherIdentification") == $('#updateCedula').val()){
        changeId=1;
        alert("iguales");
    }
    if($('#updateCedula').val() != "" && $('#updateNombre').val() != "" && $('#emailUsuario').val() != ""){
            if(validaCorreos($('#updateMail').val()) == true){  
                if(isNaN($('#updateCedula').val())==false && $('#updateCedula').val().length==9 || $('#updateCedula').val().length==10){  
                    if(/^[a-z," ",ñ,á,é,í,ó,ú]+$/i.test($('#updateNombre').val())){
                        $.ajax({
                            type: "POST",
                            url: "./index.php",
                            data: {
                                methodName: "updateUsuario",
                                nombreU: $('#updateNombre').val(),
                                cedulaU: $('#updateCedula').val(),
                                emailU: $('#updateMail').val(),
                                passU: $('#updatePass').val(),
                                id: localStorage.getItem("teacherId"),
                                flatChange: changeId,
                            },
                            success: function (data) {
                                if(data=="-1"){
                                    $("#messagealertUpdateUserIncorrect").html("<strong>Error!</strong>Intentar mas tarde");
                                    $("#alertUpdateUserIncorrect").show().delay(3000).fadeOut("slow");
                                }else if(data=="-2"){
                                    $("#messagealertUpdateUserIncorrect").html("<strong>Error!</strong>La cedula ya existe");
                                    $("#alertUpdateUserIncorrect").show().delay(3000).fadeOut("slow");
                                }else{
                                    $("#alertUpdateUsercorrect").show().delay(3000).fadeOut("slow");
                                    localStorage.setItem("teacherIdentification", $('#updateCedula').val());
                                    localStorage.setItem("teacherName", $('#updateNombre').val());
                                    localStorage.setItem("teacherEmail", $('#updateMail').val()); 
                                }
                            },
                            error: function (xhr, textStatus, error) {
                                console.log(xhr.statusText);
                                console.log(textStatus);
                                console.log(error);
                            },
                        });

                        if ($("#updatePass").val()!="") {
                            if($("#updatePass").val() == $("#updatePassV").val()){
                                $.ajax({
                                    type: "POST",
                                    url: "./controller/TeacherController.php",
                                    data: {
                                        methodName: "updateUsuarioContra",
                                        pasU: $('#updatePass').val(),
                                        idU: localStorage.getItem("teacherId"),
                                    },
                                    success: function (data) {
                                       // $("#vererror").html(data);
                                       localStorage.setItem("$teacherPass", $('#updatePass').val());
                                       $("#alertUpdateUsercorrect").show().delay(3000).fadeOut("slow"); 
                                    },
                                    error: function (xhr, textStatus, error) {
                                        console.log(xhr.statusText);
                                        console.log(textStatus);
                                        console.log(error);
                                    },
                                });
                            }else{
                                $("#messagealertUpdateUserIncorrect").html("<strong>Warning!</strong>Las ontrase&ntilde;as no coinsiden");
                                $("#alertUpdateUserIncorrect").show().delay(3000).fadeOut("slow");
                            }
                        }
                    }else{
                        $("#messagealertUpdateUserIncorrect").html("<strong>¡Error!</strong>El nombre no puede contener caracteres especiales ni numeros");
                         $("#alertUpdateUserIncorrect").show().delay(3000).fadeOut("slow");
                    }
                }else{
                    $("#messagealertUpdateUserIncorrect").html("<strong>¡Error!</strong>Formato cedula 303330333");
                     $("#alertUpdateUserIncorrect").show().delay(3000).fadeOut("slow");
                }
            }else{
                $("#messagealertUpdateUserIncorrect").html("<strong>¡Error!</strong>El correo posee un formato inadecuado");
                 $("#alertUpdateUserIncorrect").show().delay(3000).fadeOut("slow");
            }
        }else{
            $("#messagealertUpdateUserIncorrect").html("<strong>¡Error!</strong>Todos los campos son requeridos");
             $("#alertUpdateUserIncorrect").show().delay(3000).fadeOut("slow");  
        }
            
});

/*------------- ELIMINAR TEACHER -----------*/
$('#btndeleteuser').click(function () {
       $.ajax({
            type: "POST",
            url: "./index.php",
            data: {
                methodName: "deleteUsuario",
                ide: localStorage.getItem("teacherId"),
            },
            success: function (data) {
                location.href = "./index.php";
                
            },
            error: function (xhr, textStatus, error) {
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            },
        });
});

/*--------- RESTABLECIMIENTO DE CONTRASEÑA ------*/
//revision de usuario
$("#cedulaRevPass").click(function(){
    var correo="";
     $.ajax({
            type: "POST",
            url: "./index.php",
            dataType: "JSON",
            data: {
                methodName: "consultUsuario",
                cedulaR: $("#cedulaRevUser").val(),
            },
            success: function (data) {
                if(data.teacherId == null){
                    $("#alertCheckUserIncorrectDiv").show().delay(3000).fadeOut("slow");
                    $("#alertCheckUserIncorrect").html("<strong>!Error!</strong> Usuario incorrecto");
                }else{
                    $("#alertCheckUserIncorrectDiv").addClass("ocultar");
                    localStorage.setItem("idUserPassForget", data.teacherId);
                    correo = data.teacherEmail;
                    sendmailuser(correo);
                }
            },
            error: function (xhr, textStatus, error) {
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            },
        });
});
//envio coreos
function sendmailuser(correo){
     $.ajax({
                    type: "POST",
                    url: "./index.php",
                    data: {
                        methodName: "enviarCodigoUsuario",
                        mail: correo,
                    },
                    success: function (data) {
                        if(data == "-1"){
                            $("#alertCheckUserIncorrectDiv").show().delay(3000).fadeOut("slow");
                            $("#alertCheckUserIncorrect").html("<strong>!Error!</strong> Hay problemas");
                        }else{
                            $("#alertCheckUserIncorrectDiv").addClass("ocultar");
                            localStorage.setItem("numPassForget", data);
                            $("#nombrUsuario").addClass("ocultar");
                            $("#mensajeRev").removeClass("ocultar");
                            $("#mensajeRev2").addClass("ocultar");
                            $("#form2forgetpass").removeClass("ocultar");
                            $("#cedulaRevPass").addClass("ocultar");
                            $("#cedulaRevPass2").removeClass("ocultar");
                            $("#notificationReconfigurePass").html("");
                        }
                    },
                    error: function (xhr, textStatus, error) {
                        console.log(xhr.statusText);
                        console.log(textStatus);
                        console.log(error);
                    },
                });
}
//cambiar contraseña
$("#changePassbtn").click(function(){
    if(localStorage.getItem("numPassForget") == $("#numSecurity").val()){
        if($("#newPassReconfiguration").val() == $("#newPassReconfigurationV").val()){
             $.ajax({
                type: "POST",
                url: "./index.php",
                data: {
                    methodName: "updateUsuarioContra",
                    pasU: $("#newPassReconfiguration").val(),
                    idU: localStorage.getItem("idUserPassForget"),
                },
                success: function (data) {
                    $("#alertCheckUserDiv").show().delay(3000).fadeOut("slow");;
                    $("#alertCheckUser").html("<strong>!Exito!</strong> Contraseña cambiada exitosamente");
                    $("#alertCheckUserIncorrectDiv").addClass("ocultar");
                    $("#newPassReconfiguration").val("");
                    $("#numSecurity").val("");
                    $("#newPassReconfigurationV").val("");
                },
                error: function (xhr, textStatus, error) {
                    console.log(xhr.statusText);
                    console.log(textStatus);
                    console.log(error);
                },
            });
        }else{
            $("#alertCheckUserIncorrectDiv").show().delay(3000).fadeOut("slow");
            $("#alertCheckUserIncorrect").html("<strong>!Error!</strong> Las contraseñas no coinsiden");
        }
    }else{
        $("#alertCheckUserIncorrectDiv").show().delay(3000).fadeOut("slow");
        $("#alertCheckUserIncorrect").html("<strong>!Error!</strong> El numero para restablecer la contrasena es invalido");
    }
   
});


/*____________________________________________________________________________
------------------------------------ GRUPO -----------------------------------
_______________________________________________________________________________*/

$("#addgroupid").click(function(){
         location.href = "./group.php";
         /*$.ajax({
            type: "POST",
            url: "./index.php",
            data: {
            methodName: "group",
            },
        });*/
});

/*--------------- GENERA CODIGO ---------------*/
function generaCodigo(materia){
    code = "";
    materia += Math.floor((Math.random() * 100000) + 9999999);
    for (x=0; x < 6; x++)
    {
    rand = Math.floor(Math.random()*materia.length);
    code += materia.substr(rand, 1);
    }
    return code;
}

/*--------------- INSERTAR GRUPO ---------------*/
$('#insertGroupBtn').click(function () {
    
            if( parseInt($('#sectionId').val())<=99 && parseInt($('#sectionId').val()) >= 1 && isNaN($('#sectionId').val())==false){
                var codeMatri= generaCodigo($('#subjectid').val());
                $.ajax({
                    type: "POST",
                    url: "./index.php",
                    data: {
                        methodNameG: "insertGroup",
                        grado: $('#gradeid').val(),
                        seccion: $('#sectionId').val(),
                        materia: $('#subjectid').val(),
                        codigo: codeMatri,
                        profesor:  localStorage.getItem("teacherId"),
                    },
                    success: function (data) {
                        if(data=="1"){
                            $("#alertInsertGroup").html("<strong>¡Exito!</strong>Grupo creado correctamente");
                            $('#alertInsertGroupDiv').show().delay(3000).fadeOut("slow");
                            $("#codeid").html("El codigo de matricula es: <strong>"+codeMatri+"</strong>");
                            cargaGrupos();
                        }else{
                            $("#alertInsertGroupIncorrect").html("<strong>¡Error!</strong>No se ha podido crear el grupo");
                            $('#alertInsertGroupIncorrectDiv').show().delay(3000).fadeOut("slow"); 
                        } 
                    },
                    error: function (xhr, textStatus, error) {
                        console.log(xhr.statusText);
                        console.log(textStatus);
                        console.log(error);
                    },
                });
            }else{
                $("#alertInsertGroupIncorrect").html("<strong>¡Error!</strong>La seccion tiene que ser un numero positivo o menor a 30");
                $('#alertInsertGroupIncorrectDiv').show().delay(3000).fadeOut("slow");
            }
});

/*---------------- SELECT GROUPS -------------*/
function cargaGrupos(){
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "./index.php",
        data: {
            methodNameG: "getGroups",
            teacherse: localStorage.getItem("teacherId"),
        },
        success: function (data) {
             $("#contentGroups div").remove();
            data.forEach(function (item) {
                $("#contentGroups").append("<div onclick='showActivities("+item.groupId+")'>"+
                               "<p>"+item.groupGrade+"-"+item.groupSection+"</p>"
                               +"<p>"+ item.groupSubject+"</p>"+"</div>");
            });
        },
        error: function (xhr, textStatus, error) {
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
        },
    });
}

function cargaGroupsControl(){
    if(localStorage.getItem("controlGroups")=="1"){
        cargaGrupos();
    }
}
cargaGroupsControl();

/*----------------- EDITAR GRUPO --------------*/

//INTEFAZ
$("#configbtn").click(function(){
     localStorage.setItem("inactivity", "configuracion");
    $(".muro").addClass("section-update-user");
    $(".muro").removeClass("section-update-user2");
    
    $("#murobtn").removeClass("marcado");
    $("#mensajesbtn").removeClass("marcado");
    $("#asinacionesbtn").removeClass("marcado");
    $("#matriculasbtn").removeClass("marcado");
    $("#configbtn").addClass("marcado");
    $("#asinacionesbtn").removeClass("marcado");

    $("#sectionMuro").addClass("ocultar");
    $("#sectionMatriculas").addClass("ocultar");
    $("#sectionConfiguracion").removeClass("ocultar");
    $("#sectionMensajes").addClass("ocultar");
    $("#sectionAsignaciones").addClass("ocultar");

    if($("#sectionConfiguracion div").get(0).scrollWidth -$("#dhhd").get(0).scrollWidth != 0 ){
        $(".muro").removeClass("section-update-user");
        $(".muro").addClass("section-update-user2");
    }

//OBTIENE LOS DATOS DEL GRUPO 
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "./index.php",
        data: {
            methodNameG: "getOnlyGroup",
            idg: localStorage.getItem("groupId"),
        },
        success: function (data) {
            var cadena= data.groupGrade+"-"+data.groupSection+"  "+data.groupSubject;
             $("#selectGruopedit").html(cadena);
             $("#gradeidedit").val(data.groupGrade);
             $("#sectionIdedit").val(data.groupSection);
             $("#subjectidedit").val(data.groupSubject);
             $("#codeidedit").html(data.groupEnrollmentNum);
             localStorage.setItem("subjectGroup", data.groupSubject);

        },
        error: function (xhr, textStatus, error) {
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
        },
    });
    
});
   
//CAMBIA LA CLAVE DEL GRUPO
$("#generarNuevaClave").click(function(){
    var codeMatri= generaCodigo(localStorage.getItem("subjectGroup"));
    $("#codeidedit").html(codeMatri);
});

///METODO QUE EDITA 
$("#editGroupBtn").click(function(){
    if($("#sectionIdedit").val()<99 && $("#sectionIdedit").val()>0 && isNaN($("#sectionIdedit").val())==false){
        $.ajax({
            type: "POST",
            url: "./index.php",
            data: {
                methodNameG: "editGroup",
                grade: $("#gradeidedit").val(),
                section: $("#sectionIdedit").val(),
                subject: $("#subjectidedit").val(),
                enrollment: $("#codeidedit").html(),
                teacher: localStorage.getItem("teacherId"),
                group: localStorage.getItem("groupId"),
            },
            success: function (data) {
                if(data=="1"){
                    $("#alertedittGroup").html("<strong>¡Exito!</strong>Grupo actualizado correctamente");
                    $('#alertEditGroupDiv').show().delay(3000).fadeOut("slow"); 
                    cargaGrupos();
                    var cadena= $("#gradeidedit").val()+"-"+$("#sectionIdedit").val()+"  "+$("#subjectidedit").val();
                     localStorage.setItem("secciongrupo", cadena);
                     controlSeccionGrupo();

                }else{
                    $("#alerteditGroupIncorrect").html("<strong>¡Error!</strong>Intertar mas tarde"); 
                    $('#alertEditGroupIncorrectDiv').show().delay(3000).fadeOut("slow");
                }  
            },
            error: function (xhr, textStatus, error) {
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            },
        });
    }else{
        $("#alerteditGroupIncorrect").html("<strong>¡Error!</strong>N&uacute;mero de seccion incorrecta"); 
        $('#alertEditGroupIncorrectDiv').show().delay(3000).fadeOut("slow");
    }
    
});

/*------------------ BORRAR GRUPOS --------------------*/
$("#btndeletegroupedit").click(function(){
    $.ajax({
        type: "POST",
        url: "./index.php",
        data: {
            methodNameG: "deleteGroup",
            group: localStorage.getItem("groupId"),
        },
        success: function (data) {
            if(data=="1"){
                 location.href = "home.php";
            }else{
                $("#alerteditGroupIncorrect").html("<strong>¡Error!</strong>Intentar mas tarde");
                $('#alertEditGroupDiv').addClass("ocultar"); 
                $('#alertEditGroupIncorrectDiv').removeClass("ocultar");
            } 
        },
        error: function (xhr, textStatus, error) {
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
        },
            
    });
});

/*----------- MOSTRAR ACTIVIDADES GRUPO ----------*/
function showActivities(grupo){
    localStorage.setItem("inactivity", "muro");
    var idgroup =parseInt(grupo);
    location.href = "activitiesGroup.php";
    localStorage.setItem("groupId", idgroup);
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "./index.php",
        data: {
            methodNameG: "getOnlyGroup",
            idg: idgroup,
        },
        success: function (data) {
            var cadena= data.groupGrade+"-"+data.groupSection+"  "+data.groupSubject;
            localStorage.setItem("secciongrupo", cadena);
        },
        error: function (xhr, textStatus, error) {
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
        },
    });
}

function controlSeccionGrupo(){
    $("#selectedGruop").html(localStorage.getItem("secciongrupo"));
}
controlSeccionGrupo();

function resertDiv(){
   $(".muro").addClass("section-update-user");
    $(".muro").removeClass("section-update-user2");
    if(String($("#sectionMuro div").get(0))=="undefined"){
        console.log("No existe div");
    }else{
         //alert($("#sectionMuro div").get(0).scrollWidth -$("#dhhd").get(0).scrollWidth);
        if($("#sectionMuro div").get(0).scrollWidth - $("#dhhd").get(0).scrollWidth != 0 ){
        $(".muro").removeClass("section-update-user");
        $(".muro").addClass("section-update-user2");
    }
    }
}
resertDiv();

/*.......................Matriculas......................*/
$("#matriculasbtn").click(function(){
    localStorage.setItem("inactivity", "matricula");
    $(".muro").addClass("section-update-user");
    $(".muro").removeClass("section-update-user2");
    /*~~seccion*/
    $("#sectionMuro").addClass("ocultar");
    $("#sectionConfiguracion").addClass("ocultar");
    $("#sectionMatriculas").removeClass("ocultar");
    $("#sectionMensajes").addClass("ocultar");
    $("#sectionAsignaciones").addClass("ocultar");
    /*~~color*/
    $("#murobtn").removeClass("marcado");
    $("#mensajesbtn").removeClass("marcado");
    $("#asinacionesbtn").removeClass("marcado");
    $("#matriculasbtn").addClass("marcado");
    $("#configbtn").removeClass("marcado");
    $("#asinacionesbtn").removeClass("marcado");

   // alert($("#sectionMatriculas div").get(0).scrollWidth -$("#dhhd").get(0).scrollWidth);
    if($("#sectionMatriculas div").get(0).scrollWidth - $("#dhhd").get(0).scrollWidth != 0) {
        $(".muro").removeClass("section-update-user");
        $(".muro").addClass("section-update-user2");
    }
});

/*.......................Muro......................*/
$("#murobtn").click(function(){
    localStorage.setItem("inactivity", "muro");
    $(".muro").addClass("section-update-user");
    $(".muro").removeClass("section-update-user2");
    /*~~seccion*/
    $("#sectionMuro").removeClass("ocultar");
    $("#sectionConfiguracion").addClass("ocultar");
    $("#sectionMatriculas").addClass("ocultar");
    $("#sectionMensajes").addClass("ocultar");
    $("#sectionAsignaciones").addClass("ocultar");
    /*~~color*/
    $("#murobtn").addClass("marcado");
    $("#mensajesbtn").removeClass("marcado");
    $("#asinacionesbtn").removeClass("marcado");
    $("#matriculasbtn").removeClass("marcado");
    $("#configbtn").removeClass("marcado");
    $("#asinacionesbtn").removeClass("marcado");
    
    //alert($("#sectionMuro div").get(0).scrollWidth -$("#dhhd").get(0).scrollWidth);
    if(parseInt($("#sectionMuro div").get(0).scrollWidth)-parseInt($("#dhhd").get(0).scrollWidth) != 0 ){
        $(".muro").removeClass("section-update-user");
        $(".muro").addClass("section-update-user2");
    }
});

/*_______________________________________________________________________________
.................................... Mensajes ...................................
_________________________________________________________________________________*/

/*----------------  INTERFAZ ---------------*/
$("#mensajesbtn").click(function(){
    localStorage.setItem("inactivity", "mensajes");
    $("#idgroupinput").val(localStorage.getItem("groupId"));
    $("#idgroupinput").html(localStorage.getItem("groupId"));
    $(".muro").addClass("section-update-user");
    $(".muro").removeClass("section-update-user2");
    /*~~seccion*/
    $("#sectionMuro").addClass("ocultar");
    $("#sectionConfiguracion").addClass("ocultar");
    $("#sectionMatriculas").addClass("ocultar");
    $("#sectionMensajes").removeClass("ocultar");
    $("#sectionAsignaciones").addClass("ocultar");
    /*~~color*/
    $("#murobtn").removeClass("marcado");
    $("#mensajesbtn").addClass("marcado");
    $("#asinacionesbtn").removeClass("marcado");
    $("#matriculasbtn").removeClass("marcado");
    $("#configbtn").removeClass("marcado");
    $("#asinacionesbtn").removeClass("marcado");

    if($("#sectionMensajes div").get(0).scrollWidth -$("#dhhd").get(0).scrollWidth !=0){
        $(".muro").removeClass("section-update-user");
        $(".muro").addClass("section-update-user2");
    }
});
$("#agregarMensaje").click(function(){
    $("#plusIcon").addClass("ocultar");
    $("#infoMensajes").removeClass("ocultar");
});

/*---------------- OBTENER FECHA --------------*/
function getActualDate(){
    var hoy = new Date();
    var dd = hoy.getDate();
    dd= dd+"";
    if(dd.length ==1){
        dd="0"+dd;
    }
    var mm = hoy.getMonth()+1; //hoy es 0!
    mm= mm+"";
    if(mm.length ==1){
        mm="0"+mm;
    }
    var yyyy = hoy.getFullYear();

    var h = hoy.getHours();
    var m = hoy.getMinutes();

    var fecha = yyyy+"-"+mm+"-"+dd+" "+h+":"+m;
    
    //alert(fecha);
    return fecha;
}

/*----------------- INSERTAR -------------------*/
var nombreArch="";
$('input[type=file]').change(function () {
    var path = this.value;
    nombreArch = path.match(/[-_\w]+[.][\w]+$/i)[0];
});



function caf(data){
    localStorage.setItem("controlfile", "1");
    localStorage.setItem("datatype", data);
}

function contrAlertFile(){
    if(localStorage.getItem("controlfile")=="1"){
            if(localStorage.getItem("datatype")=="1"){
                $('#alertInsertMessage').html('<strong>¡Exito!</strong>Mensaje creado');
                $('#alertInsertMessageDiv').show().delay(3000).fadeOut('slow'); 
            }else{
                $('#alertInsertMessageIncorrect').html('<strong>¡Error!</strong>Intertar mas tarde');
                $('#alertInsertMessageIncorrectDiv').show().delay(3000).fadeOut("slow");
            }
            localStorage.setItem("controlfile", "0");
        }
}
contrAlertFile();

/*___________________________________________________________________________
...............................Asignaciones...................................
_______________________________________________________________________________*/
$("#asinacionesbtn").click(function(){
    localStorage.setItem("inactivity", "asignaciones");
    $(".muro").addClass("section-update-user");
    $(".muro").removeClass("section-update-user2");
    /*~~seccion*/
    $("#sectionMuro").addClass("ocultar");
    $("#sectionConfiguracion").addClass("ocultar");
    $("#sectionMatriculas").addClass("ocultar");
    $("#sectionMensajes").addClass("ocultar");
    $("#sectionAsignaciones").removeClass("ocultar");
    /*~~color*/
    $("#murobtn").removeClass("marcado");
    $("#mensajesbtn").removeClass("marcado");
    $("#asinacionesbtn").removeClass("marcado");
    $("#matriculasbtn").removeClass("marcado");
    $("#configbtn").removeClass("marcado");
    $("#asinacionesbtn").addClass("marcado");

    //alert($("#sectionMensajes div").get(0).scrollWidth -$("#dhhd").get(0).scrollWidth );
    if($("#sectionMensajes div").get(0).scrollWidth -$("#dhhd").get(0).scrollWidth !=0){
        $(".muro").removeClass("section-update-user");
        $(".muro").addClass("section-update-user2");
    }
});
$("#agregarAsignaciones").click(function(){
    $("#plusIconAsignacion").addClass("ocultar");
    $("#infoAsignaciones").removeClass("ocultar");
});

/**************************************************************************/
function controlActivitiesView(){
    if(localStorage.getItem("inactivity")!=""){
        if(localStorage.getItem("inactivity")=="muro"){
            $(".muro").addClass("section-update-user");
            $(".muro").removeClass("section-update-user2");
            /*~~seccion*/
            $("#sectionMuro").removeClass("ocultar");
            $("#sectionConfiguracion").addClass("ocultar");
            $("#sectionMatriculas").addClass("ocultar");
            $("#sectionMensajes").addClass("ocultar");
            $("#sectionAsignaciones").addClass("ocultar");
            /*~~color*/
            $("#murobtn").addClass("marcado");
            $("#mensajesbtn").removeClass("marcado");
            $("#asinacionesbtn").removeClass("marcado");
            $("#matriculasbtn").removeClass("marcado");
            $("#configbtn").removeClass("marcado");
            $("#asinacionesbtn").removeClass("marcado");
            if(parseInt($("#sectionMuro div").get(0).scrollWidth)-parseInt($("#dhhd").get(0).scrollWidth) != 0 ){
                $(".muro").removeClass("section-update-user");
                $(".muro").addClass("section-update-user2");
            }
        }else if(localStorage.getItem("inactivity")=="asignaciones"){
            $(".muro").addClass("section-update-user");
            $(".muro").removeClass("section-update-user2");
            /*~~seccion*/
            $("#sectionMuro").addClass("ocultar");
            $("#sectionConfiguracion").addClass("ocultar");
            $("#sectionMatriculas").addClass("ocultar");
            $("#sectionMensajes").addClass("ocultar");
            $("#sectionAsignaciones").removeClass("ocultar");
            /*~~color*/
            $("#murobtn").removeClass("marcado");
            $("#mensajesbtn").removeClass("marcado");
            $("#asinacionesbtn").removeClass("marcado");
            $("#matriculasbtn").removeClass("marcado");
            $("#configbtn").removeClass("marcado");
            $("#asinacionesbtn").addClass("marcado");
            if($("#sectionMensajes div").get(0).scrollWidth -$("#dhhd").get(0).scrollWidth !=0){
                $(".muro").removeClass("section-update-user");
                $(".muro").addClass("section-update-user2");
            }
        }else if(localStorage.getItem("inactivity")=="mensajes"){
            $("#idgroupinput").val(localStorage.getItem("groupId"));
            $("#idgroupinput").html(localStorage.getItem("groupId"));
            $(".muro").addClass("section-update-user");
            $(".muro").removeClass("section-update-user2");
            /*~~seccion*/
            $("#sectionMuro").addClass("ocultar");
            $("#sectionConfiguracion").addClass("ocultar");
            $("#sectionMatriculas").addClass("ocultar");
            $("#sectionMensajes").removeClass("ocultar");
            $("#sectionAsignaciones").addClass("ocultar");
            /*~~color*/
            $("#murobtn").removeClass("marcado");
            $("#mensajesbtn").addClass("marcado");
            $("#asinacionesbtn").removeClass("marcado");
            $("#matriculasbtn").removeClass("marcado");
            $("#configbtn").removeClass("marcado");
            $("#asinacionesbtn").removeClass("marcado");
            if($("#sectionMensajes div").get(0).scrollWidth -$("#dhhd").get(0).scrollWidth !=0){
                $(".muro").removeClass("section-update-user");
                $(".muro").addClass("section-update-user2");
            }
        }else if(localStorage.getItem("inactivity")=="configuracion"){
            $(".muro").addClass("section-update-user");
            $(".muro").removeClass("section-update-user2");
            
            $("#murobtn").removeClass("marcado");
            $("#mensajesbtn").removeClass("marcado");
            $("#asinacionesbtn").removeClass("marcado");
            $("#matriculasbtn").removeClass("marcado");
            $("#configbtn").addClass("marcado");
            $("#asinacionesbtn").removeClass("marcado");

            $("#sectionMuro").addClass("ocultar");
            $("#sectionMatriculas").addClass("ocultar");
            $("#sectionConfiguracion").removeClass("ocultar");
            $("#sectionMensajes").addClass("ocultar");
            $("#sectionAsignaciones").addClass("ocultar");

            if($("#sectionConfiguracion div").get(0).scrollWidth -$("#dhhd").get(0).scrollWidth != 0 ){
                $(".muro").removeClass("section-update-user");
                $(".muro").addClass("section-update-user2");
            }
        }else{
            $(".muro").addClass("section-update-user");
            $(".muro").removeClass("section-update-user2");
            /*~~seccion*/
            $("#sectionMuro").addClass("ocultar");
            $("#sectionConfiguracion").addClass("ocultar");
            $("#sectionMatriculas").removeClass("ocultar");
            $("#sectionMensajes").addClass("ocultar");
            $("#sectionAsignaciones").addClass("ocultar");
            /*~~color*/
            $("#murobtn").removeClass("marcado");
            $("#mensajesbtn").removeClass("marcado");
            $("#asinacionesbtn").removeClass("marcado");
            $("#matriculasbtn").addClass("marcado");
            $("#configbtn").removeClass("marcado");
            $("#asinacionesbtn").removeClass("marcado");

           // alert($("#sectionMatriculas div").get(0).scrollWidth -$("#dhhd").get(0).scrollWidth);
            if($("#sectionMatriculas div").get(0).scrollWidth - $("#dhhd").get(0).scrollWidth != 0) {
                $(".muro").removeClass("section-update-user");
                $(".muro").addClass("section-update-user2");
            }
        }
    }
}