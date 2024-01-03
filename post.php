<?php require_once 'includes/init.php' ?>
<!doctype html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> وبلاگ خودمون</title>
  <link rel="stylesheet" href="Theme/css/font-awesome.min.css">
  <link rel="stylesheet" href="Theme/css/style.css">
  <link rel="stylesheet" href="Theme/css/bootstrap.rtl.min.css">
  <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
</head>

<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand titelblog" href="#">وبلاگ خودمون</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse mr-5" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto text-center  mb-1 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link btn-top active" aria-current="page" href="/blog">خانه</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link btn-top dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              دسته بندی
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php
            $showCategory = selectAllCategory();
            foreach ($showCategory as $value) {
                echo "<li><a class='dropdown-item' href='categories.php?cate_id={$value->cate_id}'>{$value->cate_title}</a></li>";
            }
            ?>
            </ul>
          </li>
          <li class="nav-item">
          <a class="nav-link btn-top" href="/blog/admin">پنل ادمین </a>
          </li>
      
         
        </ul>
        <form action="search.php" method="post" class="serchb row">
          <input class=" sherchinput col me-2" name="search" type="text" placeholder="جستجو ..." aria-label="Search">
          <button class="btn btn-outline-primary col" name="btnSearch"><span> جستجو</span></button>
        </form>
      </div>
    </div>
  </nav>
  <?php
  if (isset($_GET['post_id'])) {
    $showSinglePost = showSinglePost($_GET['post_id']);
  }
  if ($showSinglePost) {
    foreach ($showSinglePost as $value) {
  ?>
      <section class="home py-5" id="home">
        <div class="container-lg">
          <div class="row align-items-center align-content-center">
            <div class="col-md-12 mt-4 mt-md-0">
              <div class="home-img text-center bg-secondary py-4">
                <img src="images/<?php echo $value->post_img ?>" width="250px" height="250px" class="rounded-circle mx-auto d-block userimg" alt="profile img">
              </div>
            </div>
          </div>
          <div class="row align-items-center align-content-center">
            <div class="row row-cols-12 row-cols-md-12 g-3">
              <div class="col">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title text-center text-primary"><?php echo $value->post_title ?></h5>
                    <hr>
                    <p class="card-text"><?php echo $value->post_body ?></p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">نویسنده مطلب :<?php echo $value->post_author ?></small>
                    <small class="text-muted text-crate"> تاریخ انتشار : <?= convertDateToFarsi($value->post_created_at); ?> </small>
                  </div>
                </div>
              </div>
          <?php }
      } else {
        echo '<p class="alert alert-info text-center">این مطلب وجود ندارد</p>';
      } ?>
            </div>
          </div>
        </div>
        
      </section>
      
      <div class="container mt-5 py-4">
      <div class="alert alert-success text-center">بخش نظرات</div>
        <div class="jumbotron">
          <div class="row d-flex justify-content-center">
            <div class="col-md-8">
            <?php
                $showQuestion = showQuesion($_GET['post_id']);
                if ($showQuestion) {
                    foreach ($showQuestion as $value) {
                        ?>
              <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="user d-flex flex-row align-items-center"> <img src="Theme/img/user.png" width="30" class="user-img  rounded-circle mr-2"> 
                  <span>
                  <small>کاربر</small>
                    <small class="font-weight-bold text-primary"><?= $value['comment_author'] ?></small>
                    <small>گفت :</small>
                    </span>
                </div> 
                <small><?= convertDateToFarsi($value['comment_created_at']); ?></small>
                </div>
                <span>
                   <small class="font-weight-bold"><?= $value['comment_body'] ?></small>
                 </span> 
                
              </div>
              <?php

                            $showCommentReply = showCommentReply($value['comment_id']);
                            if($showCommentReply){
                            foreach ($showCommentReply as $item) {
                                ?>
              <div class="card p-4 bg-secondary">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="user d-flex flex-row align-items-center"><img src="Theme/img/admin.png" width="30" class="user-img rounded-circle mr-2"> 
                  <span>
                    <small class="text-light">ادمین</small>
                    <small class="font-weight-bold text-info">سایت</small>
                    <small class="text-light">پاسخ داد :</small>
                    </span>
                </div> 
                <small class="text-light"><?= convertDateToFarsi($value['comment_created_at']); ?></small>
                </div>
                <span>
                   <small class="font-weight-bold text-light"><?php echo $item['comment_body'] ?></small>
                 </span> 
                
              </div>
              <?php }} ?>
              <?php }
                } else {
                    echo '<p class="alert alert-info text-center">هنوز نظری برای این پست ثبت نشده است اولین نظر را ارسال کنید</p>';
                } ?>
            </div>
            <?php sendComment(); ?>
            <div class="col-md-4">
              <form action="" method="post">
                <div class="form-group">
                  <label for="usr">اسم :</label>
                  <input name="comment_author" type="text" class="form-control" id="usr">
                </div>
                <div class="form-group">
                  <label for="pwd">ایمیل :</label>
                  <input name="comment_email" type="email" class="form-control" id="pwd">
                </div>
                <div class="form-group">
                  <label for="comment">متن نظر:</label>
                  <textarea name="comment_body" class="form-control" rows="5" id="comment"></textarea>
                </div>
                <button type="submit" name="sendComment" class="btn btn-primary btn-block mt-3">ارسال نظر</button> 
              </form>
            </div>
          </div>
        </div>
        <footer class="footer border-top py-4">
          <div class="container-lg">
            <div class="row">
              <div class="col-lg-12">
              <p class="m-0 text-center text-danger text-muted">طراحی شده با <a href="https://codekurd.ir/">US</a></p>
              </div>
            </div>
          </div>
      </div>

      </footer>

      <script src="Theme/js/bootstrap.bundle.min.js"></script>
</body>

</html>