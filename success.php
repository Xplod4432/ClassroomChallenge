<?php
    $title = 'Success'; 
    require_once 'includes/header.php';
    require_once './db/conn.php';
    require './includes/sanitise.php';

    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $fname = test_input($_POST['fname']);
        $lname = test_input($_POST['lname']);
        $dob = test_input($_POST['dob']);
        $username = test_input($_POST['mail']);
        $contact = test_input($_POST['phone']);
        $course1 = test_input($_POST['course']);
        $resaddress = test_input($_POST['address']);
        $password = test_input($_POST['password']);

        $orig_file = $_FILES["avatar"]["tmp_name"];
        $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
        $target_dir = 'uploads/';
        $destination = "$target_dir$contact.$ext";
        move_uploaded_file($orig_file,$destination);

        //Call function to insert and track if success or not
        $isSuccess = $user->insertUser($fname,$lname,$dob,$username,$password,$contact,$course1,$resaddress,$destination);
        if($isSuccess){
            include 'includes/successmessage.php';
        }
        else{
            include 'includes/errormessage.php';
        }

        

    }
?>
    <!-- This prints out values that were passed to the action page using method="post" -->
    <img src="<?php echo $destination; ?>" class="rounded-circle" style="width: 20%; height: 20%" />
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $_POST['firstname'] . ' ' . $_POST['lastname'];  ?>
            </h5>
            <p class="card-text">
                Date Of Birth: <?php echo $_POST['dob'];  ?>
            </p>
            <p class="card-text">
                Email Adress: <?php echo $_POST['mail'];  ?>
            </p>
            <p class="card-text">
                Contact Number: <?php echo $_POST['phone'];  ?>
            </p>
    
        </div>
    </div>
    

<br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>