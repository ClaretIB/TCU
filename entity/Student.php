<?php

/**
 * Description of Student
 *
 */
class Student {

    public $studentId;
    public $studentIdentification;
    public $studentName;
    public $studentMail;
    public $studentPass;

    function __consstruct() {
        
    }

    function getStudentIdentification() {
        return $this->studentIdentification;
    }

    function setStudentIdentification($studentIdentification) {
        $this->studentIdentification = $studentIdentification;
    }

    function getStudentId() {
        return $this->studentId;
    }

    function getStudentName() {
        return $this->studentName;
    }

    function getStudentMail() {
        return $this->studentMail;
    }

    function getStudentPass() {
        return $this->studentPass;
    }

    function setStudentId($studentId) {
        $this->studentId = $studentId;
    }

    function setStudentName($studentName) {
        $this->studentName = $studentName;
    }

    function setStudentMail($studentMail) {
        $this->studentMail = $studentMail;
    }

    function setStudentPass($studentPass) {
        $this->studentPass = $studentPass;
    }

}
