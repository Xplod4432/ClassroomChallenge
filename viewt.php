<?php
    $title = "View Records";
    require_once './includes/header.php';
    require_once './db/conn.php';
    require_once './includes/admin_check.php';
    require './includes/sanitise.php';
    
    $results = $crud->getTestsById(test_input($_GET['tid']));
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
                <td><?php echo $r['firstname'] . $r['lastname']; ?></td>
                <td><?php echo $r['marks_ob']; ?></td>
                <td><?php echo $r['timeofattempt']; ?></td>
            </tr>
        <?php }?>
    </table>

<?php
  require './includes/footer.php'
?>