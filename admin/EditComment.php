<?php include('nav.php');?>
                       
                       <div class="content flex-column-fluid" id="kt_content">
    <?php
    $row = selectComment($_GET['edit']);

    if (isset($_GET['edit']) && isset($_POST['comment_id'])) {
        $updateComment = editComment($_POST['comment_id']);
        if ($updateComment) {
            $message = '<p class="alert alert-success">ویرایش با موفقیت انجام شد</p>';
            header("refresh:1, url = Comments.php");
        } else {
            $message = '<p class="alert alert-danger">ویرایش با خطا مواجه شد</p>';
        }
    }
    ?>
                                       <div class="card card-custom gutter-b example example-compact">
                                           <div class="card-header">
                                               <h3 class="card-title">
                                               ویرایش نظر
                                               </h3>
                                           </div>
                                           <div class="card-body">
                                           <?php if (isset($message)) echo $message; ?>
                                               <form action="" method="post">
                                           <div class="form-group">
                                           <input type="hidden" value="<?php echo $row['comment_id'] ?>" class="textbox" name="comment_id">
                                                       <label>نام کاربر</label>
                                                       <input disabled name="cate_title" value="<?php echo $row['comment_author'] ?>" type="text" class="form-control form-control-lg"  placeholder="اسم دسته بندی را وارد کنید"/>
                                                   </div>
                                           <div class="form-group">
                                                       <label>ایمیل کاربر</label>
                                                       <input disabled name="cate_title" value="<?php echo $row['comment_email'] ?>" type="text" class="form-control form-control-lg"  placeholder="اسم دسته بندی را وارد کنید"/>
                                                   </div>
                                           <div class="form-group">
                                                       <label>متن نظر</label>
                                                       <textarea name="comment_body" class="form-control form-control-lg"><?php echo $row['comment_body'] ?></textarea>
                                                   </div>
                                           </div>
                                           <div class="card-footer">
                                               <button name="editComment" type="submit" class="btn btn-success">ویرایش</button>
                                           </div>
                                       </form>
                                       </div>
                                     
</div>


</div>


                       </div>
                      <?php include('footer.php');?>
