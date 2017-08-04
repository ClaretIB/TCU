<?php
include_once 'header.php';
?>

<section id="contActivities">
    <div class="selectGruopeditclass" id="dhhd">
        <b id="selectedGruop"></b>
    </div>
    <div class="selectGruopMenu" id="selectGruopMenuDiv">
        <button id="murobtn" class="marcado">Muro</button>
        <button id="mensajesbtn" class="">Mensajes</button>
        <button id="asinacionesbtn" class="">Asinaciones</button>
        <button id="matriculasbtn" class="">Matriculas</button>
        <button id="configbtn" class=""><span class="glyphicon glyphicon-cog"></span></button>
    </div>
    <!-- ..........................MURO............................ -->
    <section id="sectionMuro" class="sectionActivities" style="max-height: 75vh; overflow: auto;">
        <div style="background-color: #FFF; min-height: 10vh; padding: 2vh;" class="section-update-user muro">
            <b id="tipoid" style="color: #3D8AB4; float: left; font-size: 2.5vh; padding-right: 3vh;">Tipo</b>
            <b id="fechaid" style="color: #666666; font-weight: normal; font-size: 1.5vh;">201-06-09</b>
            <b id="fechaid" style="color: #666666; font-weight: normal; font-size: 1.5vh;">16:00</b> <br><br>
            <p id="descripcioId" style="color: #000;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit tempora facilis velit dolorum asperiores doloremque dolore, laboriosam, libero quidem praesentium.</p>
        </div>
    </section>
    <!-- ..........................MATRICULAS............................ -->
    <section id="sectionMatriculas" class="sectionActivities ocultar" style="max-height: 75vh; overflow: auto;">
        <div style="background-color: #FFF; min-height: 10vh; padding: 2vh;" class="section-update-user muro">
            <b id="tipoid" style="color: #3D8AB4; float: left; font-size: 2.5vh; padding-right: 3vh;">Petici&oacute;n de matricula</b>
            <b id="fechaid" style="color: #666666; font-weight: normal; font-size: 1.5vh;">201-06-09</b>
            <b id="fechaid" style="color: #666666; font-weight: normal; font-size: 1.5vh;">16:00</b> <br>
            <div style="vertical-align: middle; display: inline-block; float: right; padding-bottom: 2vh;">
                <button type="button" class="btn btn-success" >Aceptar</button> 
                <button type="button" class="btn btn-danger" >Rechazar</button>
            </div>
            <br>
            <b  style="font-weight: normal; "><strong>Maria Brenes Torres</strong> desea vincularse a este grupo</b>
        </div>
    </section>
    <!-- ..........................CONFIGURACION............................ -->
    <section id="sectionConfiguracion" class="sectionActivities ocultar" style="max-height: 75vh; overflow: auto;">
        <div class="section-update-user muro">
            <div class="title-content">
                <p>Editar grupo</p>
            </div>
            <div class="informationGroup">
                <p>Grado academico</p>
                <select name=""  class="form-control" id="gradeidedit">
                    <option value="7">7°</option>
                    <option value="8">8°</option>
                    <option value="9">9°</option>
                    <option value="10">10°</option>
                    <option value="11">11°</option>
                </select>

                <p>Seccion</p>
                <input type="number" name="quantity" min="1" max="30" class="form-control" id="sectionIdedit">
                <p>Materia</p>
                <select name="" class="form-control" id="subjectidedit">
                    <option value="Estudios Sociales">Estudios Sociales</option>
                    <option value="Matematica">Matematica</option>
                    <option value="Educacion civica">Educacion civica</option>
                    <option value="Espanol">Espanol</option>
                    <option value="Quimica">Quimica</option>
                    <option value="Educacion civica">Educacion civica</option>
                    <option value="Biologia">Biologia</option>
                    <option value="Educacion Fisica">Educacion Fisica</option>
                    <option value="Educacion Religiosa">Educacion Religiosa</option>
                </select>
                <p>Clave: <strong id="codeidedit"></strong>  <button type="button" class="btn btn-info" id="generarNuevaClave" style="padding: 1px 12px;"">Generar nueva clave</button></p>
                <button type="button" class="btn btn-primary" id="editGroupBtn" ">Actualizar</button>

                <!--alerts-->
                <div class="alertUpdateUsercorrect">
                    <div class="alert alert-success alert-dismissable ocultar" id="alertEditGroupDiv">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p id="alertedittGroup"></p>
                    </div>
                    <div class="alert alert-danger alert-dismissable ocultar" id="alertEditGroupIncorrectDiv">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p id="alerteditGroupIncorrect"></p>
                    </div>
                </div>

            </div>
            <div class="title-content">
                <p>Eliminar Grupo</p>
            </div>	
            <div id="buttonDelete">
                <button type="button" id="btndeletegroupedit" class="btn btn-danger">Eliminar</button>
            </div>
        </div>
    </section>
    <!-- ..........................MENSAJES............................ -->
    <section id="sectionMensajes" class="sectionActivities ocultar" style="max-height: 75vh; overflow: auto;">
        <div id="agregarMensaje" style="" class="section-update-user muro">
            <p id="plusIcon" style="color: #999999; font-size: 3vh; text-align: center; margin-bottom: 0 !important;"><span class="glyphicon glyphicon-plus"></span></p>
            <div id="infoMensajes" class="ocultar">
            <form action="index.php" enctype="multipart/form-data" method="post">
                <input id="tituloMensaje" type="text" placeholder="Titulo" name="tittle" style="color: #3D8AB4;">
                <br>
                
                <textarea id="mensajeMensaje" type="text" placeholder="Mensaje..." style="width: 100%;" name="description"></textarea><br>
                    <div class="form-group">
                        <label></label>
                        <input id="file-3" type="file" id="btn_archivo" name="archivo" multiple>
                    </div>
                
                <input type="text" class="ocultar" id="idgroupinput" name="idgrupo">
                <!--<button type="button" class="btn btn-primary" id="btn_insert_msj" style="">Agregar</button>-->
                <input type="submit" value="agregar" name="agregar" id="btn_insert_msj" class="btn btn-primary"><br>
                <?php
                    if(isset($respuesta)){
                        if($respuesta==1){
                            echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                <script src='view/js/script.js'></script>
                                <script>
                                    controlActivitiesView();
                                    caf(1);
                                </script>";
                        }else{
                            echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                <script src='view/js/script.js'></script>
                                <script>
                                    controlActivitiesView();
                                    caf(-1);
                                </script>";
                        }
                    }    
                ?>
              </form>
            </div>
        </div>
        <!--alerts-->
                <div class="alertUpdateUsercorrect" style="margin-left: 37%;">
                    <div class="alert alert-success alert-dismissable ocultar" id="alertInsertMessageDiv">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p id="alertInsertMessage"></p>
                    </div>
                    <div class="alert alert-danger alert-dismissable ocultar" id="alertInsertMessageIncorrectDiv">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p id="alertInsertMessageIncorrect"></p>
                    </div>
                </div>

        <div style="background-color: #FFF; min-height: 10vh; padding: 2vh;" class="section-update-user muro">
            <b id="tipoid" style="color: #3D8AB4; float: left; font-size: 2.5vh; padding-right: 3vh;">Tipo</b>
            <b id="fechaid" style="color: #666666; font-weight: normal; font-size: 1.5vh;">16:00</b> 
            <div style="float: right; color: #999999;">
                <button class="transprent-button" data-toggle="modal" data-target="#modal-edit-message"><span class="glyphicon glyphicon-pencil"></span></button>
                <button class="transprent-button" data-toggle="modal" data-target="#modal-delete-message"><span class="glyphicon glyphicon-trash"></span></button>
            </div><br><br>
            <p id="descripcioId" style="color: #000;" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit tempora facilis velit dolorum asperiores doloremque dolore, laboriosam,.</p>
        </div>
    </section>
    <!-- ..........................Asignaciones............................ -->
    <section id="sectionAsignaciones" class="sectionActivities ocultar" style="max-height: 75vh; overflow: auto;">
        <div id="agregarAsignaciones" style="" class="section-update-user muro">
            <p id="plusIconAsignacion" style="color: #999999; font-size: 3vh; text-align: center; margin-bottom: 0 !important;"><span class="glyphicon glyphicon-plus"></span></p>
            <div id="infoAsignaciones" class="ocultar">
                <input id="tituloAsignacion" type="text" placeholder="Titulo" style="color: #3D8AB4;">
                <br>
                <textarea id="mensajeAsignacion" type="text" placeholder="Descripcion..." style="width: 100%;" ></textarea><br>
                <form enctype="multipart/form-data">
                    <div class="form-group">
                        <label></label>
                        <input id="file-4" type="file" multiple>
                    </div>
                </form>
                <button type="button" class="btn btn-primary" style="">Agregar</button><br>

            </div>
        </div>

        <div style="background-color: #FFF; min-height: 10vh; padding: 2vh;" class="section-update-user muro">
            <b id="tipoidAsignacion" style="color: #3D8AB4; float: left; font-size: 2.5vh; padding-right: 3vh;">Tipo</b>
            <b id="fechaidAsignacion" style="color: #666666; font-weight: normal; font-size: 1.5vh;">16:00</b> <br><br>
            <p id="descripcioIdAsignacion" style="color: #000;" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit tempora facilis velit dolorum asperiores doloremque dolore, laboriosam,.</p>
        </div>
    </section>

</section>

<!-- .............. MODALS ................ -->
<!-- ... EDITAR ...-->
    <div class="modal fade" id="modal-edit-message" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title titulo-modal">Editar Mensaje</h4>
            </div>

            <div class="modal-body">
            
                <form action="index.php" enctype="multipart/form-data" method="post">
                    <input id="tituloMensajeE" type="text" placeholder="Titulo" name="tittle" style="color: #3D8AB4;">
                    <br>
                    
                    <textarea id="mensajeMensajeE" type="text" placeholder="Mensaje..." style="width: 100%;" name="description"></textarea><br>
                        <div class="form-group">
                            <label></label>
                            <input id="file-5" type="file" name="archivo" multiple>
                        </div>
                    
                    <input type="text" class="ocultar" id="idgroupinput" name="idgrupo">
                    <!--<button type="button" class="btn btn-primary" id="btn_insert_msj" style="">Agregar</button>-->
                    <input type="submit" value="Agregar" name="editar_grupo" id="btn_edit_msj" class="btn btn-primary"><br>
                    <?php
                        if(isset($respuesta)){
                            if($respuesta==1){
                                echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                    <script src='view/js/script.js'></script>
                                    <script>
                                        controlActivitiesView();
                                        caf(1);
                                    </script>";
                            }else{
                                echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                    <script src='view/js/script.js'></script>
                                    <script>
                                        controlActivitiesView();
                                        caf(-1);
                                    </script>";
                            }
                        }    
                    ?>
              </form>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div>

<!-- ... ELIMINAR ...-->
<div class="modal fade" id="modal-delete-message" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title titulo-modal">Confirmar</h4>
            </div>

            <div class="modal-body">
                <p style="font-weight: normal; font-size: 2vh;">Seguro de eliminar este mensaje?</p>
                <div style="float: right;">
                    <button type="button" class="btn btn-default" id="sideletemsj">Si</button>
                    <button type="button" class="btn btn-default" id="nodeletemsj">No</button>
                </div><br><br>
            </div>

          </div>
        </div>
    </div>
<?php
include_once 'footer.php';
?>