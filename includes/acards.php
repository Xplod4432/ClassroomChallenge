<div class="col">
    <div class="card h-100">
    <div class="card-body">
        <h5 class="card-title"><?php echo $course_name; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted">Max Marks: <?php echo $course_id; ?></h6>
        <p class="card-text">Last Date: <?php echo $lec_time; ?></p>
        <form action="upload.php?aid=<?php echo lec_link; ?>" method="post" enctype="multipart/form-data">
        <label class="custom-file-label" for="avatar">Upload Image</label>
        <input type="file" accept="image/*" class="custom-file-input" id="assgn" name="assgn" required>
        <input type="submit" value="Upload Image" name="submit">
        </form>
    </div>
    </div>
</div>