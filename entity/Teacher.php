<?php

/**
 * Description of Teacher
 *
 */
class Teacher {

    public $teacherId;
    public $teacherIdentification;
    public $teacherName;
    public $teacherEmail;
    public $teacherPass;
    public $groupList;
    public $teacherStatus;

    function __construct() {
        $this->groupList = array();
    }

    function getTeacherStatus() {
        return $this->teacherStatus;
    }

    function setTeacherStatus($teacherStatus) {
        $this->teacherStatus = $teacherStatus;
    }

    function getTeacherIdentification() {
        return $this->teacherIdentification;
    }

    function getGroupList() {
        return $this->groupList;
    }

    function setTeacherIdentification($teacherIdentification) {
        $this->teacherIdentification = $teacherIdentification;
    }

    function setGroupList($groupList) {
        $this->groupList = $groupList;
    }

    function getTeacherId() {
        return $this->teacherId;
    }

    function getTeacherName() {
        return $this->teacherName;
    }

    function getTeacherEmail() {
        return $this->teacherEmail;
    }

    function getTeacherPass() {
        return $this->teacherPass;
    }

    function setTeacherId($teacherId) {
        $this->teacherId = $teacherId;
    }

    function setTeacherName($teacherName) {
        $this->teacherName = $teacherName;
    }

    function setTeacherEmail($teacherEmail) {
        $this->teacherEmail = $teacherEmail;
    }

    function setTeacherPass($teacherPass) {
        $this->teacherPass = $teacherPass;
    }

}
