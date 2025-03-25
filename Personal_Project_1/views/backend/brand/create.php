<?php

use App\Models\Brand;

$list = Brand::where('status', '!=', '0')->get();
$html_parent_id = '';
$html_sort_order = '';
foreach ($list as $item) 
{
    $html_parent_id .="<option value='". $item->id ."'>" . $item->name . "<?option>";
    $html_sort_order .="<option value='". ($item->ssort_order+1) ."'>Sau: " . $item->name . "<?option>";

}
?>
<?php require_once('../views/backend/header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<form action="index.php?option=brand&cat=process" method="post" enctype="multipart/form-data">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm thương hiệu</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Thêm thương hiệu</li>
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
                            <a class="btn btn-sm btn-info" href="index.php?option=brand">
                                <i class="fas fa-arrow-left"></i> Quay về danh sách
                            </a>


                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">
                                <label for="name">Tên thương hiệu</label>
                                <input name="name" id="name" type="text" class="form-control" required placeholder="VD:Giày Adidas">
                            </div>
                            <div class="mb-3">
                                <label for="metadesc">Mô tả(SEO)</label>
                                <textarea name="metadesc" id="metadesc" class="form-control" required required placeholder="Mô tả"></textarea>
                               
                            </div>
                            <div class="mb-3">
                                <label for="metakey">Từ khoá(SEO)</label>
                                <textarea name="metakey" id="metakey" class="form-control" required required placeholder="VD:Giày Adidas"></textarea>
                               
                            </div>
                        </div>
                        <div class="col-md-3">
                            
                            <div class="mb-3">
                                <label for="sort_order">Vị trí</label>
                                <select id="sort_order" name="sort_order" class="form-control">
                                    <option value="0">--Chọn vị trí--</option>
                                    <?= $html_sort_order; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="image">Hình ảnh</label>
                                <input name="image" id="image" type="file" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="status">Trạng thái</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="2">Chưa xuất bản</option>
                                    <option value="2">Xuất bản</option>
                                   
                                </select>
                            </div>
                            
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <div class="row">
                        <div class="col-md-12 text-right">
                            <button name="THEM" type="submit" class="btn btn-sm btn-success">
                                <i class="fas fa-save"></i> Lưu[Thêm]
                            </button>
                            <a class="btn btn-sm btn-info" href="index.php?option=brand">
                                <i class="fas fa-arrow-left"></i> Quay về danh sách
                            </a>

                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
</form>
<!-- /.content-wrapper -->
<?php require_once('../views/backend/footer.php'); ?>