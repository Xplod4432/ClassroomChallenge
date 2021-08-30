<?php
$title = 'Attempt Test';
    require_once './includes/header.php';
    require_once './db/conn.php';
    require './includes/sanitise.php';

    if(isset($_POST['submittest'])){
        $tid = test_input($_GET['tid']);
        $Sid = test_input($_SESSION['userid']);
        $mob = 100;
        $isSuccess = $crud->attemptTest($Sid,$tid,$mob);
        if($isSuccess){
            header("Location: viewrecords.php");
        }
        else{
            include 'includes/errormessage.php';
        }
    }
?>
<form action="test.php?tid=<?php $_GET['tid']; ?>" method="post" enctype="multipart/form-data">
    <input type="submit" value="Submit Test" name="submittest">
</form>
<?php
  include 'includes/footer.php'
?>