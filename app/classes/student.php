<?php
namespace App\classes;

class student
{
    protected function dbConnection() {
        $hostName = 'localhost';
        $userName = 'root';
        $password = '';
        $dbName = 'practice-database';
        $link = mysqli_connect($hostName, $userName, $password, $dbName);
        return $link;
    }

    public function saveStudentInfo($data){
        $link= mysqli_connect('localhost', 'root', '', 'practice-database');
        $sql= "INSERT INTO students (name, email, mobile) VALUES('$data[name]', '$data[email]', '$data[mobile]')";
        if (mysqli_query(student::dbConnection(), $sql)) {
            $massege= 'Student info save successfully';
                return $massege;
        } else {
            die('Query problem'.mysqli_error(student::dbConnection()) );
        }
    }

    public function getStudentsInfo(){
       $link= mysqli_connect('localhost', 'root', '', 'practice-database');
       $sql= "SELECT * FROM students";
       if (mysqli_query(student::dbConnection(), $sql)){
           $queryResult= mysqli_query(student::dbConnection(), $sql);
            return $queryResult;
       } else {
           die('Query problem'.mysqli_error(student::dbConnection()) );
       }
    }

    public function getStudentInfoById($id) {
        $sql = "SELECT * FROM students WHERE id= '$id' ";
        if ( mysqli_query(student::dbConnection(), $sql) ) {
            $queryResult = mysqli_query(student::dbConnection(), $sql);
            return $queryResult;
        }
    }

    public function updateStudentInfo($data) {
        $sql = "UPDATE  students SET name='$data[name]', email='$data[email]', mobile='$data[mobile]' WHERE id='$data[id]' ";
        if (mysqli_query(student::dbConnection(), $sql) ) {
            header('Location: view-student.php');
        } else {
            die("Query problem".mysqli_error(student::dbConnection()) );
        }
    }

    public function deleteStudentInfo($id) {
        $sql = "DELETE FROM students WHERE id='$id' ";
        if ( mysqli_query(student::dbConnection(), $sql) ) {
            $massege = "Student Info delete successfuly";
            return $massege;
        } else {
            die("Query problem". mysqli_error(student::dbConnection()) );
        }
    }

}