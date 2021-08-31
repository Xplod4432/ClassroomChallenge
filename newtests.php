<?php
    $title = "New Test";
    require_once './includes/header.php';
    require_once './db/conn.php';
    require_once './includes/admin_check.php';
    if (isset($_POST['submit'])) {
        $course = $_POST['Course'];
        $maxmarks = $_POST['mm'];
        $date = $_POST['lastdate'];
        $sub_res = $crud->insertTests($course,$date,$maxmarks);
        if ($sub_res) {
            include './includes/successmessage.php';
        }
        else {
            include './includes/errormessage.php';
        }
    }
    $results = $crud->getCourses();
?>
<h1 class="text-center">Create Test</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" autocomplete="off">
    <div class="mb-3">
        <label for="Course" class="form-label">Select Course</label>
        <select id="Course" name="Course" class="form-select">
            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                <option value="<?php echo $r['course_id'] ?>"><?php echo $r['name']; ?></option>
            <?php }?>
        </select>
    </div>
    <div class="mb-3">
        <label for="mm" class="form-label">Max Marks</label>
        <input required type="number" class="form-control" id="mm" name="mm">
    </div>
    <div class="mb-3">
        <label for="lastdate" class="form-label">Date of Test</label>
        <input required type="text" class="form-control" id="lastdate" name="lastdate">
    </div>
    <div class="py-3">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
<?php
  require './includes/footer.php'
?>