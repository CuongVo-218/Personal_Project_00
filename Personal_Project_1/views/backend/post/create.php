<?php

use App\Models\Post;
use App\Models\Topic;


$list = Post::where('status', '!=', '0')->get();
$list_topic = Topic::where('status','!=','0')->get();
$html_topic_id = '';
foreach ($list_topic as $topic){ 
    $html_topic_id .= "<option value='" . $topic->id . "'>" . $topic->name . "</option>";
  
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
                        <h1>Thêm bài viết</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Thêm bài viết</li>
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
                        <button name="THEM" type="submit" class="btn btn-sm btn-success">
                                <i class="fas fa-save"></i> Lưu[Thêm]
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
                                <label for="title">Tên bài viết</label>
                                <input name="title" id="title" type="text" class="form-control" require placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="detail">Chi tiết bài viết</label>
                                <textarea name="detail" id="detail" class="form-control" required required placeholder=""></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="metadesc">Mô tả(SE0)</label>
                                <textarea name="metadesc" id="metadesc" class="form-control" required required placeholder=""></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="metakey">Từ khoá(SE0)</label>
                                <textarea name="metakey" id="metakey" class="form-control" required required placeholder=""></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="topic_id">Chủ đề bài viết</label>
                                <select id="topic_id" name="topic_id" class="form-control" required>
                                    <option value="">
                                        --Chọn chủ đề--
                                    </option>
                                    <?= $html_topic_id; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="img">Hình ảnh</label>
                                <input name="img" id="img" type="file" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="status">Trạng thái</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="2">
                                        Chưa xuất bản
                                    </option>
                                    <option value="1">
                                        Xuất bản
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
               
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>


</form>


<?php require_once('../views/backend/footer.php'); ?>