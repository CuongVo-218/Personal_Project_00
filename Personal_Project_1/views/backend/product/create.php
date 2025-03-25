<?php

use App\Models\Category;
use App\Models\Brand;

$list_category = Category::where('status', '!=', '0')->get();
$list_brand = Brand::where('status', '!=', '0')->get();
$html_category_id = '';
$html_brand_id = '';

foreach ($list_category as $category) 
{
    $html_category_id .="<option value='". $category->id ."'>" . $category->name . "<?option>";
 

}
foreach ($list_brand as $brand) 
{
    $html_brand_id .="<option value='". $brand->id ."'>" . $brand->name . "<?option>";
 

}
?>
<?php require_once('../views/backend/header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<form action="index.php?option=product&cat=process" method="post" enctype="multipart/form-data">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm sản phẩm</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Thêm sản phẩm</li>
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
                            <a class="btn btn-sm btn-info" href="index.php?option=product">
                                <i class="fas fa-arrow-left"></i> Quay về danh sách
                            </a>


                        </div>
                    </div>

                </div>
                <div class="card-body">
                <?php include_once('../views/backend/mesageAlert.php');?>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">
                                <label for="name">Tên danh mục</label>
                                <input name="name" id="name" type="text" class="form-control" required placeholder="VD:Giày Nam">
                            </div>
                            <div class="mb-3">
                                <label for="detail">Chi tiết</label>
                                <textarea name="detail" id="detail" class="form-control" required required placeholder="Chi tiết"></textarea>
                               
                            </div>
                            <div class="mb-3">
                                <label for="metadesc">Mô tả(SEO)</label>
                                <textarea name="metadesc" id="metadesc" class="form-control" required required placeholder="Mô tae"></textarea>
                               
                            </div>
                            <div class="mb-3">
                                <label for="metakey">Từ khoá(SEO)</label>
                                <textarea name="metakey" id="metakey" class="form-control" required required placeholder="VD:Giày nam"></textarea>
                               
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="category_id">Danh mục</label>
                                <select id="category_id" name="category_id" class="form-control" required>
                                    <option value="">--Chọn danh mục--</option>
                                    <?= $html_category_id; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="brand_id">Thương hiệu</label>
                                <select id="brand_id" name="brand_id" class="form-control" required>
                                    <option value="">--Chọn thương hiệu--</option>
                                    <?= $html_brand_id; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="qty">Số lượng</label>
                                <input name="qty" id="qty" type="number"value="1" min="1" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="price">Giá</label>
                                <input name="price" id="price" type="number"value="100000" min="100000"step="50000" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="price_sale">Giá khuyến mãi</label>
                                <input name="price_sale" id="price_sale" type="number"value="100000" min="100000"step="50000" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="image">Hình ảnh</label>
                                <input name="image" id="image" type="file" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="status">Trạng thái</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="2">Chưa xuất bản</option>
                                    <option value="1">Xuất bản</option>
                                   
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
                            <a class="btn btn-sm btn-info" href="index.php?option=product">
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