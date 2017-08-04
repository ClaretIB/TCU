<?php

require_once './model/TeacherModel.php';

class TeacherController {

    private $model;

    function __construct() {
        $this->model = new TeacherModel();
    }//construct()

    public function invoke() {
        if(isset($_POST["methodName"])){
            switch ($_POST["methodName"]) {
            case "insertarUsuario":
                echo $this->model->insertTeacher($_POST['nombre'], $_POST['cedula'], $_POST['email'], $_POST['pass']);
                break;
            case "loginUsuario":
                echo $this->model->logIn($_POST['cedula'], $_POST['pass']);
                break;
            case "updateUsuario":
                $teacherModel = new TeacherModel();
                echo $this->model->updateTeacher($_POST['nombreU'], $_POST['cedulaU'], $_POST['emailU'], $_POST['id'], $_POST['flatChange']);
                break;
            case "updateUsuarioContra":
                echo $this->model->changeTeacherPass($_POST['pasU'], $_POST['idU']);
                break;
            case "deleteUsuario":
                echo $teacherModel->disableTeacher($_POST['ide']);
                break;
            case "consultUsuario":
                echo $this->model->getTeacherByIdentication($_POST['cedulaR']);
                break;
            case "enviarCodigoUsuario":
                echo $this->model->sendMail($_POST['mail']);
                break;
            default:
                break;
        }
        }else{
            include 'login.php';
        }
        
    }

}

?>