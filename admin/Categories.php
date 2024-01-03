<?php include('nav.php');?>
<div class="content flex-column-fluid" id="kt_content">
<?php
if (isset($_GET['delete'])) {
$deleteCategory = deleteCategory($_GET['delete']);
if ($deleteCategory) {
header('location:Categories.php?success=ok');
} else {
header('location:Categories.php?error=ok');
}
}
addCategory()
    ?>
                                        <div class="card card-custom gutter-b example example-compact">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                دسته بندی ایجاد کنید
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <form action="" method="post">
                                            <div class="form-group">
                                                        <label>دسته بندی</label>
                                                        <input name="cate_title" type="text" class="form-control form-control-lg"  placeholder="اسم دسته بندی را وارد کنید"/>
                                                    </div>
                                            </div>
                                            <div class="card-footer">
                                                <button name="insertCategory" type="submit" class="btn btn-success">ایجاد</button>
                                            </div>
                                        </form>
                                        </div>
                                        <div class="row">
                                <div class="col-xl-12">
                                    <div class="card card-custom gutter-b">
                                        <div class="card-header flex-wrap py-3">
                                            <div class="card-title">
                                                <h3 class="card-label">
			                                	لیست دسته بندی ها
		                                    	</h3>
                                            </div>
                                        </div>
                                        <div class="card-body">
<?php
if (isset($_GET['success'])) {
echo '<p class="alert alert-success">حذف با موفقیت انجام شد</p>';
} elseif (isset($_GET['error'])) {
echo '<p class="alert alert-danger">حذف با  خطا مواجه شد</p>';
}
?>
                                            <div class="table-responsive">
                                            <table class="table table-bordered table-checkable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>نام دسته بندی</th>
                                                        <th>عملیات</th>
                                                    </tr>
                                                </thead>
<?php
$selectCategory = selectAllCategory();
if ($selectCategory) {
foreach ($selectCategory as $index => $value) {
?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $index + 1 ?></td>
                                                        <td><?php echo $value->cate_title ?></td>
                                                        <td>
                                                        <a href="EditCategory.php?edit=<?= $value->cate_id ?>" class="btn btn-success">ویرایش</a>
                                                        <a href="Categories.php?delete=<?= $value->cate_id; ?>" class="btn btn-danger">حذف</a>
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
                            </div>
                            </div>
                           </div>
                        </div>
                       <?php include('footer.php');?>
