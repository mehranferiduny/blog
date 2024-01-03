                        <?php include('nav.php');?>
                        <div class="content flex-column-fluid" id="kt_content">
                        <?php
        if (isset($_GET['delete'])) {
            $row = selectPost($_GET['delete']);
            $delete = deletePost($_GET['delete']);
            if ($delete) {
                $post_img = "../images/" . $row['post_img'];
                unlink($post_img);
                header('location:Posts.php?success=true');
            } else {
                header('location:Posts.php?error=true');
//                echo 'error';
            }
        }
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
                                                        <th>عنوان پست</th>
                                                        <th>دسته بندی</th>
                                                        <th>نویسنده پست</th>
                                                        <th>تصویر</th>
                                                        <th>برچسب</th>
                                                        <th>تاریخ درج</th>
                                                        <th>عملیات</th>
                                                    </tr>
                                                </thead>
                                                <?php $selectAllPost = selectAllPost();
                                                if ($selectAllPost) {
                                                 foreach ($selectAllPost as $index => $value) {
                                               ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?=  $index + 1 ?></td>
                                                        <td><?= $value->post_title ?></td>
                                                        <td><?= showCategoryTitle($value->post_category_id) ?></td>
                                                        <td><?= $value->post_author ?></td>
                                                        <td><img width="160px" height="90px" src="../images/<?= $value->post_img ?>" alt=""></td>
                                                        <td><?= $value->post_tags ?></td>
                                                        <td><?= convertDateToFarsi($value->post_created_at); ?></td>
                                                        <td>
                                                        <a href="EditPost.php?edit=<?= $value->post_id ?>" class="btn btn-success">ویرایش</a>
                                                        <a href="Posts.php?delete=<?= $value->post_id ?>" class="btn btn-danger">حذف</a>
                                                        </td>
                                                    </tr>
                                                    <?php
                }
            } else {
                ?>
                <td colspan="3" class="alert alert-info">دسته ای وجود ندارد</td>
            <?php } ?>
                                                </tbody>
                                            </table>
                                            </div>
                                </div>
                            </div>
                        </div>
                      <?php include('footer.php');?>
