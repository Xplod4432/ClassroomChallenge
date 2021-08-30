<div class="col">
    <div class="card h-100">
    <div class="card-body">
        <h5 class="card-title"><?php echo $course_name; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted">Max Marks: <?php echo $course_id; ?></h6>
        <p class="card-text">Test Date: <?php echo $lec_time; ?></p>
        <?php if ($lec_time == date('Y-m-d')) { ?>
        <a href="./test.php?tid=<?php echo $lec_link; ?>" class="card-link">Test Link</a>
        <?php } ?>
    </div>
    </div>
</div>