<?php include('nav.php');?>
                       
                       <div class="content flex-column-fluid" id="kt_content">
                       <?php
    $row = selectCategory($_GET['edit']);
    if (isset($_GET['edit']) && isset($_POST['cate_id'])) {
        $updateCategory = updateCategory($_POST['cate_id']);
        if ($updateCategory) {
            $message = '<p class="alert alert-success">ویرایش با موفقیت انجام شد</p>';
            header("refresh:1, url = Categories.php");
        } else {
            $message = '<p class="alert alert-error">ویرایش با خطا مواجه شد</p>';
        }
    }
    ?>
                                       <div class="card card-custom gutter-b example example-compact">
                                           <div class="card-header">
                                               <h3 class="card-title">
                                               ویرایش دسته بندی
                                               </h3>
                                           </div>
                                           <div class="card-body">
                                           <?php if (isset($message)) echo $message; ?>
                                               <form action="" method="post">
                                           <div class="form-group">
                                                       <label>دسته بندی</label>
                                                       <input name="cate_title" value="<?= $row->cate_title; ?>" type="text" class="form-control form-control-lg"  placeholder="اسم دسته بندی را وارد کنید"/>
                                                       <input type="hidden" name="cate_id" value="<?php if (isset($row)) echo $row->cate_id;; ?>" placeholder="">
                                                   </div>
                                           </div>
                                           <div class="card-footer">
                                               <button name="editCategory" type="submit" class="btn btn-success">ویرایش</button>
                                           </div>
                                       </form>
                                       </div>
                                     
</div>


</div>


                       </div>
                      <?php include('footer.php');?>
