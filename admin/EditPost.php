<?php include('nav.php');?>
                       
                       <div class="content flex-column-fluid" id="kt_content">
                       <?php
    $row = selectPost($_GET['edit']);
    //    var_dump($row);
    if (isset($_GET['edit']) && isset($_POST['post_id'])) {

        $updatePost = updatePost($_POST['post_id']);
        if ($updatePost) {
            $post_img = "../images/" . $row['post_img'];
//            var_dump($post_img);
            unlink($post_img);
            $message = '<p class="alert alert-success">ویرایش با موفقیت انجام شد</p>';
            header("refresh:1, url = Posts.php");
        } else {
            $message = '<p class="alert alert-danger">ویرایش با خطا مواجه شد</p>';
        }
    }
    ?>
                                       <div class="card card-custom gutter-b example example-compact">
                                           <div class="card-header">
                                               <h3 class="card-title">
                                               ویرایش مطلب
                                               </h3>
                                           </div>
                                           <?php if (isset($message)) echo $message; ?>
                                           <form action="" method="post" enctype="multipart/form-data" class="form">
                                    <div class="card-body">
                                        <div class="form-group form-group-last">
                                        </div>
                                        <div class="form-group">
                                            <label>عنوان پست</label>
                                            <input name="post_title" value="<?php echo $row['post_title'] ?>" type="text" class="form-control form-control-solid" placeholder="عنوان پست را وارد کنید" required>
                                        </div>
                                        <div class="form-group">
                                            <label>نویسنده پست</label>
                                            <input name="post_author" value="<?php echo $row['post_author'] ?>" type="text" class="form-control form-control-solid" placeholder="نام نویسنده را وارد کنید" required>
                                        </div>
                                        <div class="form-group">
                                            <label>انتخاب دسته بندی</label>
                                            <select name="post_category_id" class="form-control form-control-solid" required>
                                            <?php
                                          $selectAllCategory = selectAllCategory();
                                         foreach ($selectAllCategory as $valueCategory) {
                                           echo "<option value='" . $valueCategory->cate_id . "'>{$valueCategory->cate_title}</option>";
                                         }
                                         ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for=""> توضیحات پست</label>
                                            <input type="hidden" name="post_id" value="<?php echo $row['post_id'] ?>" class="textbox" placeholder="">
                                            <textarea name="post_body" class="form-control form-control-solid" rows="5"><?php echo $row['post_body'] ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>تگ های پست</label>
                                            <input name="post_tags" value="<?php echo $row['post_tags'] ?>" type="text" class="form-control form-control-solid" placeholder="تگ پست را وارد کنید" />
                                        </div>
                                        <div class="form-group">
                                        <img width="200px" height="110px" src="../images/<?php echo $row['post_img'] ?>" alt="">
                                            <input name="post_img" value="<?php echo $row['post_img'] ?>" type="file" class="form-control form-control-solid" placeholder="تگ پست را وارد کنید" />
                                        </div>
                                    </div>
                                           <div class="card-footer">
                                               <button name="updatePost" type="submit" class="btn btn-success">ویرایش</button>
                                           </div>
                                       </form>
                                       </div>
                                     
</div>


</div>


                       </div>
                      <?php include('footer.php');?>
