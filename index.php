<?php 
    $title = "HomePage";
    require './includes/header.php';
    require './db/conn.php';
    require_once './includes/auth_check.php';
    
    $U = $user->getUserDetails($_SESSION['userid']);
    $results = $crud->getCourses();
?>
<div class="row">
    <div class="col-sm-4 my-5">
    
    </div>
</div>
<div class="row row-cols-1 row-cols-md-3 g-4 px-3 mb-5 mt-3 pb-3 bg-light">
<?php
  while ($r = $results->fetch(PDO::FETCH_ASSOC)) {
    $card_src = $r['imagepath'];
    $card_title = $r['blogtitle'];
    $card_tag = $r['name'];
    $card_text = $r['blogpreview'];
    $card_href = $r['blog_id'];
    include "./includes/cards.php";
  }
?>
</div>
<?php
  include 'includes/footer.php'
?>