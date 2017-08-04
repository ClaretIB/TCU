<?php

/**
 * Description of MessageModel
 *
 * @author Claret
 */
require_once './entity/Message.php';
require_once './entity/Group.php';
require_once './database/Mysql.php';

class MessageModel {
    function __construct() {
        
    }

    public function insertMessage($mesageInitDate, $messageDesc,$destino ,$groupId, $messageTittle) {
        
        
            try {
            Mysql::open();
            $query = "INSERT INTO tbl_message(message_actual_date, message_desc, message_material, message_group_id, message_tittle) "
                    ."values('$mesageInitDate', '$messageDesc', '$destino', $groupId, '$messageTittle');";
            Mysql::execute($query);
            Mysql::close();
            return 1;
        } catch (Exception $exc) {
            return -1;
        }        
      
        
    }
    
    public function disableMessage($idMessage) {
        try {
            Mysql::open();
            $query = "delete from tbl_message"
                    . "where id_message=$idMessage";
            Mysql::execute($query);
            Mysql::close();
            return 1;
        } catch (Exception $exc) {
            return -1;
        }
    }
    
    public function updateMessage($messageDesc, $messageMaterial, $idMessage, $messageTittle) {
        try {
            Mysql::open();
            $query = "update tbl_message set message_desc='$messageDesc', message_material='$messageMaterial', message_tittle='$messageTittle'"
                    . "where id_message=$idMessage;";
            Mysql::execute($query);
            Mysql::close();
            return 1;
        } catch (Exception $exc) {
            return -1;
        }
    }
    
    public function getAllMessageByGroup($groupid) {
      
        Mysql::open();
        $result = Mysql::query("SELECT * FROM tbl_message where message_group_id = $groupid");
        $messageList = array();
        while ($row = Mysql::get_row_array($result)) {
            $messageAux = new Message();
            $messageAux->setGroupId($row['message_group_id']);
            $messageAux->setMesageInitDate ($row['message_actual_date']);
            $messageAux->setMessageDesc ($row['message_desc']);
            $messageAux->setMessageId($row['id_message']);
            $messageAux->setMessageMaterial($row['message_material']);
            $messageAux->setMessageTittle($row['message_tittle']);
            array_push($messageList, $messageAux);
        }
        Mysql::close();
        return json_encode($messageList);
    }
    
    public function getAllMessageByTeacher($idTeacher) {
     
        Mysql::open();
        $result = Mysql::query("SELECT * FROM tbl_message WHERE message_group_id IN".
                "(SELECT id_group FROM tbl_group WHERE tbl_group.group_teacher_id =$idTeacher );");
        $messageList = array();
        while ($row = Mysql::get_row_array($result)) {
            $messageAux = new Message();
            $messageAux->setGroupId($row['message_group_id']);
            $messageAux->setMesageInitDate ($row['message_actual_date']);
            $messageAux->setMessageDesc ($row['message_desc']);
            $messageAux->setMessageId($row['id_message']);
            $messageAux->setMessageMaterial($row['message_material']);
            $messageAux->setMessageTittle($row['message_tittle']);
            array_push($messageList, $messageAux);
        }
        Mysql::close();
        return json_encode($messageList);
    }
    
    public function getMessageById($messageId) {
        $query = "SELECT * FROM tbl_message where id_message=$messageId;";
        Mysql::open();
        $result = Mysql::query($query);
        $messageAux = new Message();
        while ($row = Mysql::get_row_array($result)) {
            $messageAux->setGroupId($row['message_group_id']);
            $messageAux->setMesageInitDate ($row['message_actual_date']);
            $messageAux->setMessageDesc ($row['message_desc']);
            $messageAux->setMessageId($row['id_message']);
            $messageAux->setMessageMaterial($row['message_material']);
            $messageAux->setMessageTittle($row['message_tittle']);
        }
        Mysql::close();
        return json_encode($messageAux);
    }
}
