<?php
    class crud{
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }

        public function insertDetails($fname,$lname,$dob,$email,$contact,$course1,$resaddress,$destination){
            try {
                // define sql statement to be executed
                $sql = "INSERT INTO userdetails (firstname,lastname,dateofbirth,username,contactnumber,course1,resaddress,avatar_path) VALUES (:fname,:lname,:dob,:email,:contact,:course1,:resaddress,:destination)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':course1',$course1);
                $stmt->bindparam(':resaddress',$resadress);
                $stmt->bindparam(':destination',$destination);

                // execute statement
                $stmt->execute();
                return true;
        
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
 
    }
    
?>