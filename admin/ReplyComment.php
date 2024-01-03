<?php include('nav.php');?>
                       
                       <div class="content flex-column-fluid" id="kt_content">
    <?php
    $row = selectComment($_GET['comment_id']);
    $replyComment = sendReplyComment($row['comment_id'], $row['comment_post_id']);
    if ($replyComment) {
        header('location:Comments.php');
    }
    ?>
                                       <div class="card card-custom gutter-b example example-compact">
                                           <div class="card-header">
                                               <h3 class="card-title">
                                               پاسخ به نظر
                                               </h3>
                                           </div>
                                           <div class="card-body">
                                               <form action="" method="post">
                                           <div class="form-group">
                                           <input type="hidden" value="<?php echo $row['comment_id'] ?>" class="textbox" name="comment_id">
                                                       <label>نام کاربر</label>
                                                       <input disabled  value="<?php echo $row['comment_author'] ?>" type="text" class="form-control form-control-lg"  placeholder="اسم دسته بندی را وارد کنید"/>
                                                   </div>
                                           <div class="form-group">
                                                       <label>ایمیل کاربر</label>
                                                       <input disabled  value="<?php echo $row['comment_email'] ?>" type="text" class="form-control form-control-lg"  placeholder="اسم دسته بندی را وارد کنید"/>
                                                   </div>
                                           <div class="form-group">
                                                       <label>متن نظر</label>
                                                       <textarea disabled  class="form-control form-control-lg"><?php echo $row['comment_body'] ?></textarea>
                                                   </div>
                                           <div class="form-group">
                                                       <label>پاسخ به نظر</label>
                                                       <textarea name="comment_body" class="form-control form-control-lg"></textarea>
                                                   </div>
                                           </div>
                                           <div class="card-footer">
                                               <button name="sendReplyComment" type="submit" class="btn btn-success">ویرایش</button>
                                           </div>
                                       </form>
                                       </div>
                                     
</div>


</div>


                       </div>
                      <?php include('footer.php');?>
