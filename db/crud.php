<?php
    class crud{
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }

        public function insertDetails($fname,$lname,$dob,$email,$contact,$course1,$resaddress,$destination){
            try {
                $sql = "INSERT INTO userdetails (firstname,lastname,dateofbirth,username,contactnumber,course1,resaddress,avatar_path) VALUES (:fname,:lname,:dob,:email,:contact,:course1,:resaddress,:destination)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':course1',$course1);
                $stmt->bindparam(':resaddress',$resadress);
                $stmt->bindparam(':destination',$destination);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getCourses(){
            try{
                $sql = "SELECT * FROM `courses`";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

        public function insertTests($cid,$dot,$mm){
            try {
                $sql = "INSERT INTO `tests`(`course_id`, `dateoftest`, `max_marks`) VALUES (:cid,:dot,:mm)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':cid',$cid);
                $stmt->bindparam(':dot',$dot);
                $stmt->bindparam(':mm',$mm);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function attemptTest($Sid,$tid,$mob){
            try {
                $sql = "INSERT INTO `testattempted`(`test_id`, `id`, `marks_ob`) VALUES (:tid,:Sid,:mob)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':Sid',$Sid);
                $stmt->bindparam(':tid',$tid);
                $stmt->bindparam(':mob',$mob);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        
        public function getTests(){
            try{
                $sql = "SELECT * FROM `tests` a inner join courses s on a.course_id = s.course_id WHERE `dateoftest` >= CURDATE()";
                $result = $this->db->query($sql);
                return $result;                
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }   
        }

        public function getAllTests(){
            try{
                $sql = "SELECT * FROM `tests` a inner join courses s on a.course_id = s.course_id ORDER BY dateoftest DESC";
                $result = $this->db->query($sql);
                return $result;                
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }   
        }

        public function insertAssignments($cid,$dot,$mm){
            try {
                $sql = "INSERT INTO `tests`(`course_id`, `late_date`, `max_marks`) VALUES (:cid,:dot,:mm)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':cid',$cid);
                $stmt->bindparam(':dot',$dot);
                $stmt->bindparam(':mm',$mm);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function updateAssgnMarks($subid,$mob){
            try {
                $sql = "UPDATE `assgn_submitted` SET `marksob`=:mob WHERE submit_id = :subid";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':subid',$subid);
                $stmt->bindparam(':mob',$mob);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function uploadAssignment($Sid,$tid,$mob){
            try {
                $sql = "INSERT INTO `testattempted`(`assign_id`, `id`, `upload_file`) VALUES (:Sid,:tid,:mob)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':Sid',$Sid);
                $stmt->bindparam(':tid',$tid);
                $stmt->bindparam(':mob',$mob);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        
        public function getAllAssignments(){
            try{
                $sql = "SELECT * FROM `assignments` a inner join courses s on a.course_id = s.course_id ORDER BY last_date DESC";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

        public function getAssignments(){
            try{
                $sql = "SELECT * FROM `assignments` a inner join courses s on a.course_id = s.course_id WHERE `last_date` >= CURDATE()";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }
 
    }
    
?>