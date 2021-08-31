<?php
    $title = "View Submissions";
    require_once './includes/header.php';
    require_once './db/conn.php';
    require_once './includes/admin_check.php';
    require './includes/sanitise.php';
    if (isset($_POST['submit'])) {
        $subid = test_input($_GET['subid']);
        $mob = $_POST['mob'];
        $crud->updateAssgnMarks($subid,$mob);

    }
    $results = $crud->getAssignmentsById(test_input($_GET['aid']));
?>

    <table class="table">
        <tr>
            <th>Roll Number</th>
            <th>Student Name</th>
            <th>Marks</th>
            <th>Actions</th>
        </tr>
        <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $r['id']; ?></td>
                <td><?php echo $r['firstname'] . $r['lastname']; ?></td>
                <td><form action="viewa.php?subid=<?php echo $r['submit_id']; ?>&aid=<?php echo $_GET['aid']; ?>" method="post" enctype="multipart/form-data"><input type="number" placeholder="<?php echo $r['marksob']; ?>" name="mob" size="3"></td>
                <td>
                <a target="_blank" href="<?php echo $r['upload_file']; ?>" class="btn btn-primary">Download Assignment</a>
                <input type="submit" value="Update Marks" name="submit">
                </form>
                </td>
            </tr>
        <?php }?>
    </table>

<?php
  require './includes/footer.php'
?>