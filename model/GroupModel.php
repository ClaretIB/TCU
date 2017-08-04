<?php
require_once './entity/Group.php';
require_once './entity/Teacher.php';
require_once './database/Mysql.php';

class GroupModel {

    function __construct() {
        
    }

    public function insertGroup($groupGrade, $groupSection, $groupSubject, $groupEnrollment, $teacherId) {
        try {
            Mysql::open();
            $query = "insert into tbl_group(group_grade,group_section,group_subject,group_enrollment_num,group_teacher_id) "
                    . "values($groupGrade,$groupSection,'$groupSubject','$groupEnrollment',$teacherId)";
            Mysql::execute($query);
            Mysql::close();
            return 1;
        } catch (Exception $exc) {
            return -1;
        }
    }

    public function disableGroup($idGroup) {
        try {
            Mysql::open();
            $query = "update tbl_group set group_status=0 "
                    . "where id_group=$idGroup";
            Mysql::execute($query);
            Mysql::close();
            return 1;
        } catch (Exception $exc) {
            return -1;
        }
    }

    public function updateGroup($groupGrade, $groupSection, $groupSubject, $groupEnrollment, $teacherId, $groupId) {
        try {
            Mysql::open();
            $query = "update tbl_group set group_grade=$groupGrade, group_section=$groupSection, group_subject='$groupSubject', group_enrollment_num='$groupEnrollment',group_teacher_id=$teacherId where id_group=$groupId";
            Mysql::execute($query);
            Mysql::close();
            return 1;
        } catch (Exception $exc) {
            return -1;
        }
    }

    public function getAllGroups($groupStatus) {
        switch ($groupStatus) {
            case 0:
                $query = "SELECT * FROM tbl_group where group_status=0;";
                break;
            case 1:
                $query = "SELECT * FROM tbl_group where group_status=1;";
                break;
            case 2:
                $query = "SELECT * FROM tbl_group;";
                break;
            default:
                $query = "SELECT * FROM tbl_group;";
                break;
        }

        Mysql::open();
        $result = Mysql::query($query);
        $groupList = array();
        while ($row = Mysql::get_row_array($result)) {
            $groupAux = new Group();
            $groupAux->setGroupId($row['id_group']);
            $groupAux->setGroupGrade($row['group_grade']);
            $groupAux->setGroupSection($row['group_section']);
            $groupAux->setGroupSubject($row['group_subject']);
            $groupAux->setGroupEnrollmentNum($row['group_enrollment_num']);
            $groupAux->setGroupStatus($row['group_status']);
            $teacherAux = new Teacher();
            $teacherAux->setTeacherId($row['group_teacher_id']);
            $groupAux->setTeacher($teacherAux);
            array_push($groupList, $groupAux);
        }
        Mysql::close();
        return json_encode($groupList);
    }

    public function getGroupById($groupId) {
        $query = "SELECT * FROM tbl_group where id_group=$groupId;";
        Mysql::open();
        $result = Mysql::query($query);
        $groupAux = new Group();
        while ($row = Mysql::get_row_array($result)) {
            $groupAux->setGroupId($row['id_group']);
            $groupAux->setGroupGrade($row['group_grade']);
            $groupAux->setGroupSection($row['group_section']);
            $groupAux->setGroupSubject($row['group_subject']);
            $groupAux->setGroupEnrollmentNum($row['group_enrollment_num']);
            $groupAux->setGroupStatus($row['group_status']);
            $teacherAux = new Teacher();
            $teacherAux->setTeacherId($row['group_teacher_id']);
            $groupAux->setTeacher($teacherAux);
        }
        Mysql::close();
        return json_encode($groupAux);
    }

    public function getGroupByTecher($teacherId) {
        $query = "SELECT * FROM tbl_group where group_teacher_id=$teacherId and group_status=1;";
        Mysql::open();
        $result = Mysql::query($query);
        $groupList = array();
        while ($row = Mysql::get_row_array($result)) {
            $groupAux = new Group();
            $groupAux->setGroupId($row['id_group']);
            $groupAux->setGroupGrade($row['group_grade']);
            $groupAux->setGroupSection($row['group_section']);
            $groupAux->setGroupSubject($row['group_subject']);
            $groupAux->setGroupEnrollmentNum($row['group_enrollment_num']);
            $groupAux->setGroupStatus($row['group_status']);
            array_push($groupList, $groupAux);
        }
        Mysql::close();
        return json_encode($groupList);
    }
}
