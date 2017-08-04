<?php
include_once 'header.php';
?>

<section id="main-cont-infoUser">
    <section class="section-update-user">
        <div class="title-content" >
            <p>Actualizar informaci&oacute;n personal</p>
        </div>
        <div class="informationUser">
            <p>Nombre</p>
            <input type="text" class="form-control" id="updateNombre">
            <p>C&eacute;dula</p>
            <input type="text" class="form-control" id="updateCedula">
            <p>Correo electronico</p>
            <input type="text" class="form-control" id="updateMail">
            <p>Contrase&ntilde;a</p>
            <input type="password" class="form-control" id="updatePass">
            <p>Confirmar contrase&ntilde;a</p>
            <input type="password" class="form-control" id="updatePassV">
            <div>
                <button type="button" id="jj" class="btn btn-primary">Actualizar</button>
                <div class="alertUpdateUsercorrect">
                    <div class="alert alert-success alert-dismissable ocultar" id="alertUpdateUsercorrect">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <strong>Success!</strong> Usuario actualizado con exito
                    </div>
                    <div class="alert alert-danger alert-dismissable ocultar" id="alertUpdateUserIncorrect">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p id="messagealertUpdateUserIncorrect"></p>
                    </div>
                </div>
            </div>
        </div>	
        <div class="title-content">
            <p>Eliminar Cuenta</p>
        </div>	
        <div id="buttonDelete">
            <button type="button" id="btndeleteuser" class="btn btn-danger">Eliminar</button>
        </div>		
    </section>
</section>

<?php
include_once 'footer.php';
?>