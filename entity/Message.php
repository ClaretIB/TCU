<?php

/**
 * Description of Action
 *
 */
require_once 'Group.php';

class Message {

    public $messageId;
    public $mesageInitDate;
    public $messageTittle;
    public $messageDesc;
    public $messageMaterial;
    public $groupId;

    function __construct() {
        //$this->groupId = new Group();
    }
    function getMessageTittle() {
        return $this->messageTittle;
    }

    function setMessageTittle($messageTittle) {
        $this->messageTittle = $messageTittle;
    }

        function getMessageId() {
        return $this->messageId;
    }

    function getMesageInitDate() {
        return $this->mesageInitDate;
    }

    function getMessageDesc() {
        return $this->messageDesc;
    }

    function getMessageMaterial() {
        return $this->messageMaterial;
    }

    function getGroupId() {
        return $this->groupId;
    }

    function setMessageId($messageId) {
        $this->messageId = $messageId;
    }

    function setMesageInitDate($mesageInitDate) {
        $this->mesageInitDate = $mesageInitDate;
    }

    function setMessageDesc($messageDesc) {
        $this->messageDesc = $messageDesc;
    }

    function setMessageMaterial($messageMaterial) {
        $this->messageMaterial = $messageMaterial;
    }

    function setGroupId($groupId) {
        $this->groupId = $groupId;
    }


}
