<?php
    $title = "View Tests";
    require_once './includes/header.php';
    require_once './db/conn.php';
    require_once './includes/auth_check.php';

    $results = $crud->getTestsBySId($_SESSION['userid']);
?>

    <table class="table">
        <tr>
            <th>Test ID</th>
            <th>Max Marks</th>
            <th>Marks Obtained</th>
        </tr>
        <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $r['test_id']; ?></td>
                <td><?php echo $r['max_marks']; ?></td>
                <td><?php echo $r['marks_ob']; ?></td>
            </tr>
        <?php }?>
    </table>

<?php
  require './includes/footer.php'
?>