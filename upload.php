<?php
    require_once './db/conn.php';
    require './includes/sanitise.php';

    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $tid = test_input($_GET['aid']);
        $Sid = test_input($_SESSION['userid']);
        $tempdob = date('Y-m-d');
        $temptime = date('H-i-s');

        $orig_file = $_FILES["assgn"]["tmp_name"];
        $ext = pathinfo($_FILES["assgn"]["name"], PATHINFO_EXTENSION);
        $target_dir = 'uploads/';
        $destination = "$target_dir$tempdob-$temptime.$ext";
        move_uploaded_file($orig_file,$destination);

        //Call function to insert and track if success or not
        $isSuccess = $crud->uploadAssignment($Sid,$tid,$destination);
        if($isSuccess){
            header("Location: viewrecords.php");
        }
        else{
            include 'includes/errormessage.php';
        }
    }
?>