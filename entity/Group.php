<?php

/**
 * Description of Group
 *
 */
require_once 'Teacher.php';

class Group {

    public $groupId;
    public $groupGrade;
    public $groupSubject;
    public $groupSection;
    public $groupEnrollmentNum;
    public $teacher;
    public $actionList;
    public $groupStatus;

    function __construct() {
        $this->teacher = new Teacher();
        $this->actionList = array();
    }
    
    function getGroupSection() {
        return $this->groupSection;
    }

    function setGroupSection($groupSection) {
        $this->groupSection = $groupSection;
    }

    
    function getGroupStatus() {
        return $this->groupStatus;
    }

    function setGroupStatus($groupStatus) {
        $this->groupStatus = $groupStatus;
    }

    function getActionList() {
        return $this->actionList;
    }

    function setActionList($actionList) {
        $this->actionList = $actionList;
    }

    function getGroupId() {
        return $this->groupId;
    }

    function getGroupGrade() {
        return $this->groupGrade;
    }

    function getGroupSubject() {
        return $this->groupSubject;
    }

    function getGroupEnrollmentNum() {
        return $this->groupEnrollmentNum;
    }

    function getTeacher() {
        return $this->teacher;
    }

    function setGroupId($groupId) {
        $this->groupId = $groupId;
    }

    function setGroupGrade($groupGrade) {
        $this->groupGrade = $groupGrade;
    }

    function setGroupSubject($groupSubject) {
        $this->groupSubject = $groupSubject;
    }

    function setGroupEnrollmentNum($groupEnrollmentNum) {
        $this->groupEnrollmentNum = $groupEnrollmentNum;
    }

    function setTeacher($teacher) {
        $this->teacher = $teacher;
    }

}
