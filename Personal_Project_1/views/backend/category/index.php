<?php

use App\Models\Category;


$list = Category::where('status','!=','0')->orderBy('created_at','DESC')->get();

?>
<?php require_once('../views/backend/header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tất Cả Danh Mục</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
            <li class="breadcrumb-item active">Tất cả danh mục</li>
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
            <a class="btn btn-sm btn-success" href="index.php?option=category&cat=create">
              <i class="fas fa-plus"></i> Thêm
            </a>

            <a class="btn btn-sm btn-danger" href="index.php?option=category&cat=trash">
              <i class="fas fa-trash"></i> Thùng rác
            </a>
          </div>
        </div>

      </div>
      <div class="card-body">
        <?php include_once('../views/backend/mesageAlert.php');?>
        <table class="table table-bordered" id="myTable">
          <thead>
            <tr>
              <th class="text-center" style="width: 20px;">#</th>
              <th>Tên danh mục </th>
              <th>slug</th>
              <th class="text-center" style="width:100px;">Ngày tạo</th>
              <th class="text-center" style="width:200px;">Chức năng</th>
              <th class="text-center" style="width:20px;">ID</th>
            </tr>

          </thead>
          <tbody>
            <?php foreach ($list as $row) : ?>
            

              <tr>

                <td class="text-center">
                  <input type="checkbox">

                </td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['slug'] ?></td>
                <td class="text-center"><?= $row['created_at'] ?></td>
                <td class="text-center">
                  <?php if($row['status']==1):?>
                    <a class="btn btn-sm btn-success" href="index.php?option=category&cat=status&id=<?= $row['id'] ?>">
                  <i class="fas fa-toggle-on"></i>
                  </a>
                  <?php else:?>
                    <a class="btn btn-sm btn-danger" href="index.php?option=category&cat=status&id=<?= $row['id'] ?>">
                  <i class="fas fa-toggle-off"></i>
                  </a>
                  <?php endif;?>
                  <a class="btn btn-sm btn-info" href="index.php?option=category&cat=detail&id=<?= $row['id'] ?>">
                  <i class="fas fa-eye"></i>
                  </a>

                  <a class="btn btn-sm btn-primary" href="index.php?option=category&cat=edit&id=<?= $row['id'] ?>">
                  <i class="fas fa-edit"></i>
                  </a>

                  <a class="btn btn-sm btn-danger" href="index.php?option=category&cat=delete&id=<?= $row['id'] ?>">
                  <i class="fas fa-trash"></i>
                  </a>
          
                </td>
                <td class="text-center"><?= $row['id'] ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<?php require_once('../views/backend/footer.php'); ?>