<?php 
    $title = "HomePage";
    require './includes/header.php';
    require './db/conn.php';
    require_once './includes/auth_check.php';
    $Sid = $_SESSION['userid'];
    $U = $user->getUserDetails($Sid);
    $results = $crud->getCourses($Sid);
?>
<div class="row">
  <div class="col-sm-3 my-5">
    <div class="card">
    <img src="<?php echo $U['avatar_path']; ?>" class="card-img-top" alt="avatar">
    <div class="card-body">
    <h5 class="card-title"><?php echo $U['firstname'] . ' ' . $U['lastname']; ?></h5>
    <p class="card-text">Date Of Birth: <?php echo $U['dateofbirth'];  ?></p>
    <p class="card-text">
                Email Adress: <?php echo $U['username'];  ?>
            </p>
            <p class="card-text">
                Roll Number: <?php echo $U['id'];  ?>
            </p>
    </div>
    </div>
  </div>
  <div class="<?php if ($_SESSION['accesslevel'] == 1) {
    echo "col-sm-9";
  }
  else {
    echo "col-sm-4";
  }
  ?> my-5">
  <?php echo "<h4>" . date('l') . "'s Timetable</h4>"; ?>
    <div class="row overflow-scroll">
<?php
  while ($r = $results->fetch(PDO::FETCH_ASSOC)) {
    $course_name = $r['name'];
    $course_id = $r['course_id'];
    $lec_time = $r[date('l')];
    $lec_link = $r['name'];
    include "./includes/cards.php";
  }
?>
</div>
</div>
<?php if ($_SESSION['accesslevel'] == 0) { ?>
<div class="col-sm-4 my-5">
<p>
  <a class="btn btn-primary" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Upcoming Tests</a>
  <a class="btn btn-primary" data-bs-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false" aria-controls="multiCollapseExample2">Assignments Due</a>
</p>
<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card card-body">
        <div class="row overflow-scroll">
      <?php
        $results = $crud->getTests();
        while ($r=$results->fetch(PDO::FETCH_ASSOC)){
          $course_name = $r['name'];
          $course_id = $r['max_marks'];
          $lec_time = $r['dateoftest'];
          $lec_link = $r['test_id'];
          include "./includes/tcards.php";
      }
      ?>
        </div>
      </div>
  </div>
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample2">
      <div class="card card-body">
        <div class="row overflow-scroll">
          <?php
            $results = $crud->getAssignments();
            while ($r=$results->fetch(PDO::FETCH_ASSOC)){
              $course_name = $r['name'];
              $course_id = $r['max_marks'];
              $lec_time = $r['last_date'];
              $lec_link = $r['assign_id'];
              include "./includes/acards.php";
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<?php } ?>
</div>
<?php
  include 'includes/footer.php'
?>