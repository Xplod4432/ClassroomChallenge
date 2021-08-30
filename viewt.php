<?php 
    require_once './includes/admin_check.php';
    $title = "View Records";
    require_once './includes/header.php';
    require_once './db/conn.php';
    require './includes/sanitise.php';
    if (isset($_POST['submit'])) {
        $subid = test_input($_GET['attid']);
        $crud->updateTestMarks($attenid,$mob);
    }
    $results = $crud->getTestsById(test_input($_GET['aid']));
?>

    <table class="table">
        <tr>
            <th>Roll Number</th>
            <th>Student Name</th>
            <th>Marks</th>
            <th>Time</th>
        </tr>
        <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $r['id']; ?></td>
                <td><?php echo $r['fname'] . $r['lastname']; ?></td>
                <td><?php echo $r['marks_ob']; ?></td>
                <td><?php echo $r['timeofattempt']; ?></td>
            </tr>
        <?php }?>
    </table>

<?php
  require './includes/footer.php'
?>