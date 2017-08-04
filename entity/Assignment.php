<?php
require_once 'Group.php';

class Assignment {
    public $assignmentId;
    public $assignmentInitDate;
    public $assignmentEndDate;
    public $assignmentDesc;
    public $assignmentMaterial;
    public $groupId;
    public $assignmentTittle;
            
    function __construct() {
        $this->groupId = new Group();
    }
    
    function getAssignmentId() {
        return $this->assignmentId;
    }
    function getAssignmentTittle() {
        return $this->assignmentTittle;
    }

    function setAssignmentTittle($assignmentTittle) {
        $this->assignmentTittle = $assignmentTittle;
    }

        function getAssignmentInitDate() {
        return $this->assignmentInitDate;
    }

    function getAssignmentEndDate() {
        return $this->assignmentEndDate;
    }

    function getAssignmentDesc() {
        return $this->assignmentDesc;
    }

    function getAssignmentMaterial() {
        return $this->assignmentMaterial;
    }

    function getGroupId() {
        return $this->groupId;
    }

    function setAssignmentId($assignmentId) {
        $this->assignmentId = $assignmentId;
    }

    function setAssignmentInitDate($assignmentInitDate) {
        $this->assignmentInitDate = $assignmentInitDate;
    }

    function setAssignmentEndDate($assignmentEndDate) {
        $this->assignmentEndDate = $assignmentEndDate;
    }

    function setAssignmentDesc($assignmentDesc) {
        $this->assignmentDesc = $assignmentDesc;
    }

    function setAssignmentMaterial($assignmentMaterial) {
        $this->assignmentMaterial = $assignmentMaterial;
    }

    function setGroupId($groupId) {
        $this->groupId = $groupId;
    }


}
