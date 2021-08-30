<?php
    if(!($_SESSION['accesslevel'] == 1)){
        header("Location: login.php");
    }
?>