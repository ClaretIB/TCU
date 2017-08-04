<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>V.L.M.V</title>
	<meta name="description" content="Vicente Lachner Mediador Virtual es un sitio para que entre profesores y estudiantes exista una comunicaion ...."/>
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="view/css/style.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="shortcut icon" type="image/x-icon" href="view/img/icono.ico"/>
</head>
<body class="login">
<!--**************LOGIN**************-->
	<p id="titulo">Vicente Lachner Mediador Virtual</p>
	<div class="alertLoguinIncorrect">
		<div class="alert alert-danger alert-dismissable ocultar" id="alertLoguinIncorrect">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			<strong>Error!</strong> Usuario o contrase&ntilde;a invalidos
		</div>
	</div>
	
	<section id="login">
		<div id="text-loguin">
			<p>Usuario</p>
			<input type="text" id="user" class="form-control" >
			<p>Contrase&ntilde;a</p>
			<input type="password" id="pass" class="form-control">
			<div id="boton">
				<input type="button" class="btn btn-primary btn-lg" id="loginbtn" value="Iniciar Sesion">
			</div>
		</div>
		<div id="links-butttons">
			<div id="links-butttons-left">
				<button class="botonTransparente" type="button" data-toggle="modal" data-target="#modal-create-user">Crear nueva cuenta</button>
			</div>
			<div id="links-butttons-right">
				<button class="botonTransparente" type="button" data-toggle="modal" data-target="#modal-olvido-pass">He olvidado mi contrase&ntilde;a</button>
			</div>	
		</div>
	</section>

<!--*********************************MODALS************************************-->
<!--***********olvidar Contrase Profesor****************-->
	<div class="modal fade" id="modal-olvido-pass" role="dialog">
    	<div class="modal-dialog">
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title titulo-modal">Configuracion de contrase&ntilde;a</h4>
	        </div>

	        <div class="modal-body">
	          <p class="no-bold center " id="mensajeRev2">Ingrese su nombre de usuario para cambiar la contrase&ntilde;a</p>
	          <p class="no-bold center ocultar" id="mensajeRev">El n&uacute;mero para cambiar decontrase&ntilde;a se envio a su correo por favor verficar y no cerrar esta ventana.</p>
	          <div class="modal-body-contain2 ocultar" id="form2forgetpass">
	          		<p>N&uacute;mero de seguridad</p>
		        	<input type="text" class="form-control" id="numSecurity">
		        	<p>Nueva contrase&ntilde;a</p>
		        	<input type="password" class="form-control" id="newPassReconfiguration">
		        	<p>Verificar la contrase&ntilde;a</p>
	            	<input type="password" class="form-control" id="newPassReconfigurationV">
	          </div>
	          <div class="modal-body-contain2" id="nombrUsuario">
	          		<p>Cedula usuario</p>
		        	<input type="text" class="form-control" id="cedulaRevUser">
	          </div>
	          	<div class="center ocultar" id="cedulaRevPass2">
	            	<button type="button" class="btn btn-primary" id="changePassbtn">Guardar</button>
	            </div>
	            <div class="center" id="cedulaRevPass">
	            	<button type="button" class="btn btn-primary">Consultar</button>
	            </div>
	            <!--alerts-->
					<div class="alertUpdateUsercorrect" >
						<div class="alert alert-success alert-dismissable ocultar" id="alertCheckUserDiv" style="width: 60vh; margin-right: 0!important;">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
							<p id="alertCheckUser"></p>
						</div>
						<div class="alert alert-danger alert-dismissable ocultar" id="alertCheckUserIncorrectDiv" style="width: 60vh; margin-right: 0!important;">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
							<p id="alertCheckUserIncorrect"></p>
						</div>
					</div>
	        </div>

	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
     	</div>
  	</div>
<!--***********Agregar Profesor****************-->
 	<div class="modal fade" id="modal-create-user" role="dialog">
    	<div class="modal-dialog modal-lg">
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title titulo-modal">Crear nueva cuenta</h4>
	        </div>

	        <div class="modal-body">
	        	<div class="modal-body-contain1" >
		          	<p>Nombre completo</p>
		          	<input type="text" class="form-control contain1-def" id="nombreUsuario" placeholder="Daniela Brenes Vindas">
		          	<p>C&eacute;dula</p>
		          	<input type="text" class="form-control contain1-def" id="cedulaUsuario" placeholder="304450847">
		          	<p>Correo electronico</p>
		         	<input type="text" class="form-control" id="emailUsuario" placeholder="mail@mail.com">
	            </div>
	            <div class="modal-body-contain1"> 
	            	<!--alerta-->
	            	<div class="alertCreateUser">
			            <div class="alert alert-success alert-dismissable ocultar" id="alerInserUser">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
						    <p class="resltado" id="alertMessageCreateUser"></p>
					 	</div>
					 	<div class="alert alert-danger alert-dismissable ocultar" id="alerInserUserWrong">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
						    <p class="resltado" id="alertMessageCreateUserRown"></p>
					 	</div>
			 		</div>
	            	<img src="view/img/online-education.png" alt="">
	            </div>
	            <div class="modal-body-contain1">
	            	<p>Contrase&ntilde;a</p>
	            	<input type="password" class="form-control" id="passUsuario">
	            </div>
	            <div class="modal-body-contain1">
	            	<p>Verifique la contrase&ntilde;a</p>
	            	<input type="password" class="form-control" id="passUsuarioV">
	            </div>
		            <!--<div class="checkbox modal-body-contain1">
					  <label><input type="checkbox" value="" id="profesorcheck">Soy Profesor</label>
					</div>
					<div class="modal-body-contain1">
						<input type="text" placeholder="Codigo del profesor" class="ocultar" id="codigoProfesor">
					</div>-->
	            <div class="center">
	            	<button type="button" id="insertarUsuario" class="btn btn-primary">Crear</button>
	            </div>
	            
	        </div>

	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
     	</div>
  	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="view/js/script.js"></script>
</body>
</html>

