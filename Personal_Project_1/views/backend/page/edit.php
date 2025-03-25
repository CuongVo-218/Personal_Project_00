<?php

use App\Models\Post;
use App\Models\MyString;

$id=$_REQUEST['id'];
$row =Post::find($id);

$list = Post::where('status', '!=', '0')->get();
$html_parent_id = '';
$html_sort_order = '0';
foreach ($list as $item) 
{
    if($item->id==$row->parent_id)
    {
        $html_parent_id .="<option selected value='". $item->id ."'>" . $item->name . "<?option>";
    }else
    {
        $html_parent_id .="<option value='". $item->id ."'>" . $item->name . "<?option>";
    }
    if($item->sort_order==$row->sort_order){
        $html_sort_order .="<option selected value='". ($item->sort_order+1) ."'>Sau: " . $item->name . "<?option>";
    }
   
    $html_sort_order .="<option value='". ($item->sort_order+1) ."'>Sau: " . $item->name . "<?option>";

}
?>
<?php require_once('../views/backend/header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<form action="index.php?option=page&cat=process" method="post" enctype="multipart/form-data">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Cập nhật trang đơn</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Cập nhật trang đơn</li>
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
                            <button name="CAPNHAT" type="submit" class="btn btn-sm btn-success">
                                <i class="fas fa-save"></i> Lưu[Cập nhật]
                            </button>
                            <a class="btn btn-sm btn-info" href="index.php?option=page">
                                <i class="fas fa-arrow-left"></i> Quay về danh sách
                            </a>


                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">
                            <input type="hidden" name="id" value="<?=$row['id'];?>">
                                <label for="name">Tên thương hiệu</label>
                                <input name="name" value="<?=$row['name'];?>" id="name" type="text" class="form-control" required placeholder="VD: Iphone 12">
                            </div>
                            <div class="mb-3">
                                <label for="metadesc">Mô tả(SEO)</label>
                                <textarea name="metadesc" id="metadesc" class="form-control" required required placeholder="VD:  Iphone 1212"><?=$row['metadesc'];?></textarea>
                               
                            </div>
                            <div class="mb-3">
                                <label for="metakey">Từ khoá(SEO)</label>
                                <textarea name="metakey" id="metakey" class="form-control" required required placeholder="VD: Iphone 13 pro max"><?=$row['metakey'];?></textarea>
                               
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
                                    <option value="2"<?=($row->status == 2)?'selected':'';?>>Chưa xuất bản</option>
                                    <option value="1"<?=($row->status == 1)?'selected':'';?>>Xuất bản</option>
                                   
                                </select>
                            </div>
                            
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <div class="row">
                        <div class="col-md-12 text-right">
                            <button name="CAPNHAT" type="submit" class="btn btn-sm btn-success">
                                <i class="fas fa-save"></i> Lưu[Cập nhật]
                            </button>
                            <a class="btn btn-sm btn-info" href="index.php?option=page">
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