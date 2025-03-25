<?php

use App\Models\Post;
use App\Models\Topic;
$id =$_REQUEST['id'];
$row =Post::find($id);

$list_toppic = Topic::where('status', '!=', '0')->get();
$html_toppic_id = '';

foreach ($list_toppic as $toppic) {
if($toppic->id == $row->id){
    $html_toppic_id .= "<option selected value='" . $toppic->id . "'>" . $toppic->name . "</option>";
}
else{
    $html_toppic_id .= "<option selected value='" . $toppic->id . "'>" . $toppic->name . "</option>";
}

}
?>
<?php require_once('../views/backend/header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<form action="index.php?option=post&cat=process" method="post" enctype="multipart/form-data">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Cập nhật bài viết</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Cập nhật bài viết</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button name="CAPNHAT" type="submit" class=" btn btn-sm btn-success">
                                <i class="fas fa-save"></i>Lưu[cập nhật]
                            </button>
                            <a class="btn btn-sm btn-info" href="index.php?option=post">
                                <i class="fas fa-arrow-left"></i>Quay Về Danh Sách
                            </a>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">
                                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                <label for="title">Tên chủ đề</label>
                                <input name="title" value="<?= $row['title']; ?>" id="id" type="text" class="form-control" require placeholder="VD: Iphone 12">
                            </div>
                            <div class="mb-3">
                                <label for="detail">Chi tiết bài viết</label>
                                <textarea name="detail" id="detail" class="form-control" required required placeholder="VD: iphone 12"><?= $row['detail']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="type">Kiểu bài viết</label>
                                <textarea name="type" id="type" class="form-control" required required placeholder="VD: iphone 12"><?= $row['type']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="metadesc">Mô tả(SE0)</label>
                                <textarea name="metadesc" id="metadesc" class="form-control" required required placeholder="VD: iphone 12"><?= $row['metadesc']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="metakey">Từ khoá(SE0)</label>
                                <textarea name="metakey" id="metakey" class="form-control" required required placeholder="VD: iphone 12"><?= $row['metakey']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="topic_id">Chủ đề bài viết</label>
                                <select id="topic_id" name="topic_id" class="form-control">
                                    <option value="">
                                        --Chọn chủ đề--
                                    </option>
                                    <?= $html_toppic_id; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="img">Hình ảnh</label>
                                <input name="img" id="img" type="file" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="status">Trạng thái</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="2" <?= ($row->status == 2) ? 'selected' : ''; ?>>--Chưa xuất bản--</option>
                                    <option value="1" <?= ($row->status == 1) ? 'selected' : ''; ?>>--Đã xuất bản--</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button name="CAPNHAT" type="submit" class=" btn btn-sm btn-success">
                                <i class="fas fa-save"></i>Lưu[Cập nhật]
                            </button>
                            <a class="btn btn-sm btn-info" href="index.php?option=post">
                                <i class="fas fa-arrow-left"></i>Quay Về Danh Sách
                            </a>
                        </div>

                    </div>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>


</form>


<?php require_once('../views/backend/footer.php'); ?>