<?php
if(isset($_POST['methodNameG'])){
    include_once 'controller/GroupController.php';
    $groupController = new GroupController();
    $groupController->invoke();
}elseif(isset($_POST['agregar'])) {
    include_once 'controller/MessageController.php';
    $messageController = new MessageController();
    $messageController->invoke();   
}else{
    include_once 'controller/TeacherController.php';
    $teacherController = new TeacherController();
    $teacherController->invoke();
}
?>