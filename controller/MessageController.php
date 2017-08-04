<?php

include_once './model/MessageModel.php';

class MessageController {

    private $model;

    function __construct() {
        $this->model = new MessageModel();
    }//construct()

    public function invoke() {
        if (isset($_POST['methodName'])) {
            switch ($methodName) {
                case "insertMessage":
                    $_SESSION['grupo'] = $_POST['groupid'];
                    echo  $this->model->insertMessage($_POST['date'], $_POST['description'], $_POST['groupid'], $_POST['tittle']);
                    break;
                case "consultMessage":
                    //echo $_SESSION['filec'];
                    break;
                default:
                    break;
            }
        } else {
            $nombre = $_FILES['archivo']['name'];
            $tipo = $_FILES['archivo']['type'];
            $tamanio = $_FILES['archivo']['size'];
            $ruta = $_FILES['archivo']['tmp_name'];
            $destino = $_SERVER['DOCUMENT_ROOT'] . "/VicenteLachner/view/material/" . $nombre;
            if ($nombre != "") {
                if (copy($ruta, $destino)) {
                    $messageModel = new MessageModel();
                    $fechaactual = getdate();
                    $date = $fechaactual['year'] . "-" . $fechaactual['mon'] . "-" . $fechaactual['mday'] . " " . $fechaactual['hours'] . ":" . $fechaactual['minutes'];
                    $respuesta= $this->model->insertMessage($date, $_POST['description'], $destino,$_POST['idgrupo'] , $_POST['tittle']);
                    include 'activitiesGroup.php';
// $_SESSION['filec'] = $respuesta;
                    //$dir = $_SERVER['DOCUMENT_ROOT'] . '/VicenteLachner/view/activitiesGroup.php';
                    //header("Location: $dir");
                }
            }
        }
    }//invoke()
}
