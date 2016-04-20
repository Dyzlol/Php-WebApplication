<?php
    class DB_Entry{
        private $name;
        private $password;
        private $gpa;
        private $email;
        private $year;
        private $gender;

        public function __construct($name, $password, $gpa, $email, $year, $gender) {
            $this->name = $name;
            $this->password = $password;
            $this->gpa = $gpa;
            $this->email = $email;
            $this->year = $year;
            $this->gender = $gender;
        }

        public function getName(){
            return $this->name;
        }
        public function getPassword(){
            return $this->password;
        }
        public function getGPA(){
            return $this->gpa;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getYear(){
            return $this->year;
        }
        public function getGender(){
            return $this->gender;
        }
        public function setName($new_name){
            $this->name = $new_name;
        }
        public function setGrade($new_grade){
            $this->grade = $new_grade;
        }
        public function setGPA($new_gpa) {
            $this->gpa = $new_gpa;
        }
        public function setEmail($new_email){
            $this->email = $new_email;
        }
        public function setPassword($new_password){
            $this->password = $new_password;
        }
        public function setGender($new_gender){
            $this->gender = $new_gender;
        }
        public function setYear($new_year){
            $this->year = $new_year;
        }
    }
?>
