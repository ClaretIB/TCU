<?php

require_once './entity/Teacher.php';
require_once './database/Mysql.php';

class TeacherModel {

    function __construct() { 
    }
     
    public function insertTeacher($teacherName, $teacherIdentification, $teacherMail, $teacherPassword) {   
            Mysql::open();
            $result= Mysql::query("SELECT * FROM tbl_teacher WHERE teacher_identification='$teacherIdentification' and teacher_status=1;");
            $cont=0;
            while ($row = Mysql::get_row_array($result)) {$cont++;}
            Mysql::close();
            if($cont==0){
                $password_salt = password_hash($teacherPassword, PASSWORD_DEFAULT);
                Mysql::open();
                $query = "insert into tbl_teacher(teacher_identification, teacher_name, teacher_mail, teacher_password) "
                        . "values('$teacherIdentification', '$teacherName', '$teacherMail', '$password_salt');";
                if(Mysql::execute($query)){
                    Mysql::close();
                    return 1;
                }else{
                   Mysql::close();
                   return -1; 
                }
            }else{
                return -2;
            }
    }

    public function disableTeacher($idTeacher) {
        try {
            Mysql::open();
            $query = "update tbl_teacher set teacher_status=0 "
                    . "where id_teacher=$idTeacher;";
            if(Mysql::execute($query)){
               Mysql::close();
                return 1; 
            }else{
                Mysql::close();
                return -1;
            }
            Mysql::close();
            return 1;
        } catch (Exception $exc) {
            return -1;
        }
    }

    public function updateTeacher($teacherName, $teacherIdentification, $teacherMail, $idTeacher, $flatChange) {
       Mysql::open();
            $result= Mysql::query("SELECT * FROM tbl_teacher WHERE teacher_identification='$teacherIdentification' and teacher_status=1;");
            $cont=0;
            while ($row = Mysql::get_row_array($result)) {$cont++;}
            Mysql::close();
            if($cont==$flatChange){
                Mysql::open();
                $query = "update tbl_teacher set teacher_identification='$teacherIdentification', teacher_name='$teacherName', teacher_mail='$teacherMail'"
                        . "where id_teacher=$idTeacher;";
                if(Mysql::execute($query)){
                    Mysql::close();
                    return 1;
                }else{
                    Mysql::close();
                    return -1;
                }
            }else{
                return -2;
            }
    }

    public function changeTeacherPass($teacherPass, $idTeacher) {
        try {
            $password_salt = password_hash($teacherPass, PASSWORD_DEFAULT);
            Mysql::open();
            $query = "update tbl_teacher set teacher_password='$password_salt'"
                    . "where id_teacher=$idTeacher;";
            if(Mysql::execute($query)){
                Mysql::close();
                return 1;
            }else{
                Mysql::close();
                return -1;
            }
            
        } catch (Exception $exc) {
            return -1;
        }
    }

    public function getAllTeacher($teacherStatus) {
        switch ($teacherStatus) {
            case 0:
                $query = "SELECT * FROM tbl_teacher where teacher_status=0;";
                break;
            case 1:
                $query = "SELECT * FROM tbl_teacher where teacher_status=1;";
                break;
            case 2:
                $query = "SELECT * FROM tbl_teacher;";
                break;
            default:
                $query = "SELECT * FROM tbl_teacher;";
                break;
        }

        Mysql::open();
        $result = Mysql::query($query);
        $teacherList = array();
        while ($row = Mysql::get_row_array($result)) {
            $teacherAux = new Teacher();
            $teacherAux->setTeacherId($row['id_teacher']);
            $teacherAux->setTeacherIdentification($row['teacher_identification']);
            $teacherAux->setTeacherName($row['teacher_name']);
            $teacherAux->setTeacherEmail($row['teacher_mail']);
            $teacherAux->setTeacherPass($row['teacher_password']);
            $teacherAux->setTeacherStatus($row['teacher_status']);
            array_push($teacherList, $teacherAux);
        }
        Mysql::close();
        return json_encode($teacherList);
    }//getAllTeacher()

    public function getTeacherById($teacherId) {
        $query = "SELECT * FROM tbl_teacher where id_teacher=$teacherId;";
        Mysql::open();
        $result = Mysql::query($query);
        $teacherAux = new Teacher();
        while ($row = Mysql::get_row_array($result)) {
            $teacherAux->setTeacherId($row['id_teacher']);
            $teacherAux->setTeacherIdentification($row['teacher_identification']);
            $teacherAux->setTeacherName($row['teacher_name']);
            $teacherAux->setTeacherEmail($row['teacher_mail']);
            $teacherAux->setTeacherPass($row['teacher_password']);
            $teacherAux->setTeacherStatus($row['teacher_status']);
        }
        Mysql::close();
        return json_encode($teacherAux);
    }
    
    public function logIn($teacherIdentification, $teacherPassword) {
        $query = "SELECT * FROM tbl_teacher where teacher_identification='$teacherIdentification' and teacher_status=1;";
        Mysql::open();
        $result = Mysql::query($query);
        $teacherAux = new Teacher();
        while ($row = Mysql::get_row_array($result)) {
            if (password_verify($teacherPassword, $row['teacher_password'])) {
                $teacherAux->setTeacherId($row['id_teacher']);
                $teacherAux->setTeacherIdentification($row['teacher_identification']);
                $teacherAux->setTeacherName($row['teacher_name']);
                $teacherAux->setTeacherEmail($row['teacher_mail']);
                $teacherAux->setTeacherPass($row['teacher_password']);
                $teacherAux->setTeacherStatus($row['teacher_status']);
            }
        }
        Mysql::close();
        $jiji = json_encode($teacherAux);
        return $jiji;
    }//logIn()
    
    public function sendMail($teacherMail) {
        $clave = rand ( 1000 , 9999 );
        $asunto    = 'Restablecimiento de contrasena';
        $cabeceras = 'From: klarethi@gmail.com' . "\r\n" .
                     'Reply-To: klarethi@gmail.com' . "\r\n" .
                     'X-Mailer: PHP/' . phpversion();
        $mensaje = 'La clave para restablecer la contrasena es: '.$clave;

        if(mail($teacherMail, $asunto, $mensaje, $cabeceras)) {
            return $clave;
        }else{
             return -1;
        }
    }//sendMail()
    
    public function getTeacherByIdentication($teacherIdentification) {
        $query = "SELECT * FROM tbl_teacher where teacher_identification=$teacherIdentification;";
        Mysql::open();
        $result = Mysql::query($query);
        $teacherAux = new Teacher();
        while ($row = Mysql::get_row_array($result)) {
            $teacherAux->setTeacherId($row['id_teacher']);
            $teacherAux->setTeacherIdentification($row['teacher_identification']);
            $teacherAux->setTeacherName($row['teacher_name']);
            $teacherAux->setTeacherEmail($row['teacher_mail']);
            $teacherAux->setTeacherPass($row['teacher_password']);
            $teacherAux->setTeacherStatus($row['teacher_status']);
        }
        Mysql::close();
        return json_encode($teacherAux);
    }
}
