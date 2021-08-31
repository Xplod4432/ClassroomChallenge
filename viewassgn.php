<?php 
    $title = "View Assignments";
    require_once './includes/header.php';
    require_once './db/conn.php';
    require_once './includes/admin_check.php';


    $results = $crud->getAllAssignments();
?>

    <table class="table">
        <tr>
            <th>Course</th>
            <th>Max Marks</th>
            <th>Last Date</th>
            <th>Actions</th>
        </tr>
        <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $r['name'] ?></td>
                <td><?php echo $r['max_marks'] ?></td>
                <td><?php echo $r['last_date'] ?></td>
                <td>
                <a href="viewa.php?aid=<?php echo $r['assign_id'] ?>" class="btn btn-primary">View</a>
                </td>
            </tr>
        <?php }?>
    </table>

<?php
  require './includes/footer.php'
?>