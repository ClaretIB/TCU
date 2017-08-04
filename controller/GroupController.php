<?php
require_once './model/GroupModel.php';

class GroupController {

    private $model;

    function __construct() {
        $this->model = new GroupModel();
    }//construct()

    public function invoke() {
        if (isset($_POST['methodNameG'])) {
            switch ($_POST['methodNameG']) {
                case "insertGroup":
                    echo $this->model->insertGroup($_POST['grado'], $_POST['seccion'], $_POST['materia'], $_POST['codigo'], $_POST['profesor']);
                    break;
                case "getGroups":
                    echo $this->model->getGroupByTecher($_POST['teacherse']);
                    break;
                case "getOnlyGroup":
                    echo $this->model->getGroupById($_POST['idg']);
                    break;
                case "editGroup":
                    echo $this->model->updateGroup($_POST['grade'], $_POST['section'], $_POST['subject'], $_POST['enrollment'], $_POST['teacher'], $_POST['group']);
                    break;
                case "deleteGroup":
                    echo $this->model->disableGroup($_POST['group']);
                    break;
                default:
                    break;
            }
        }else{
            include 'group.php';
        }
    }//invoke()
}
