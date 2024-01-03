<?php include('nav.php');?>
                        <div class="content flex-column-fluid" id="kt_content">
                        <?php
    if (isset($_GET['delete'])) {
        $deleteComment = deleteComment($_GET['delete']);
        if ($deleteComment) {
            header('location:Comments.php?success=ok');
        } else {
            header('location:Comments.php?error=ok');
        }
    }
    ?>
    <?php
        if (isset($_GET['success'])) {
            echo '<p class="alert alert-success">حذف با موفقیت انجام شد</p>';
        } elseif (isset($_GET['error'])) {
            echo '<p class="alert alert-error">حذف با  خطا مواجه شد</p>';
        }
        ?>
                            <div class="card card-custom card-stretch" id="kt_page_stretched_card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">پست های وبلاگ را مدیریت کنید</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                <div class="table-responsive">
                                            <table class="table table-bordered table-checkable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>پست</th>
                                                        <th>نام</th>
                                                        <th>ایمیل</th>
                                                        <th>متن نظر</th>
                                                        <th>تاریخ</th>
                                                        <th>وضعیت</th>
                                                        <th>پاسخ</th>
                                                        <th>عملیات</th>
                                                    </tr>
                                                </thead>
                                                <?php
            $selectAllComment = selectAllComment();
            if ($selectAllComment) {
                foreach ($selectAllComment as $index => $value) {
                    ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?=  $index + 1 ?></td>
                                                        <td><?php echo showPostForComment($value['comment_post_id']); ?></td>
                                                        <td><?php echo $value['comment_author'] ?></td>
                                                        <td><?php echo $value['comment_email'] ?></td>
                                                        <td><?php echo $value['comment_body'] ?></td>
                                                        <td><?php echo convertDateToFarsi($value['comment_created_at']); ?></td>
                                                        <?php
                        if (isset($_GET['confirm'])) {
                            commentConfirm($_GET['confirm']);
                            header('location:Comments.php');
                        } elseif (isset($_GET['reject'])) {
                            commentReject($_GET['reject']);
                            header('location:Comments.php');
                        }
                        ?>
                                                        <td><?php
                            if ($value['comment_status'] == 0) {
                                ?>
                                <a class="btn btn-success" href="Comments.php?confirm=<?php echo $value['comment_id'] ?>">تایید
                                    نظر</a>
                                <?php
                            } else {
                                ?>
                                <a class="btn btn-danger"
                                   href="Comments.php?reject=<?php echo $value['comment_id'] ?>">رد نظر</a>
                            <?php }
                            ?></td>
                            <td>
                            <?php
                            if (!$value['comment_reply']) {
                                ?>
                                <a class="btn btn-info" href="ReplyComment.php?comment_id=<?php echo $value['comment_id'] ?>">پاسخ
                                    به نظر</a>
                            <?php } else {
                                echo 'این پاسخ است';
                            }
                            ?>
                        </td>
                                                        <td>
                                                        <a href="EditComment.php?edit=<?php echo $value['comment_id'] ?>" class="btn btn-success">ویرایش</a>
                                                        <a href="Comments.php?delete=<?php echo $value['comment_id'] ?>" class="btn btn-danger">حذف</a>
                                                        </td>
                                                    </tr>
                                                    <?php
                }
            } else {
                ?>
                <td colspan="3" class="alert alert-info">هیچ نظری در وبلاگ ثبت نشده است</td>
            <?php } ?>
                                                </tbody>
                                            </table>
                                            </div>
                                </div>
                            </div>
                        </div>
                      <?php include('footer.php');?>
