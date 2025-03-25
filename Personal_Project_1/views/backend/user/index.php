<?php

use App\Models\User;

$list = User ::all();

?>
<?php require_once('../views/backend/header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tất Cả Thành Viên</h1>
        </div>
        
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">

        
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th></th>
              
              <th>Id</th>
              <th>Tên thành viên<command>
              </th>
              <th></th>
              <th></th>
              <th></th>
            </tr>

          </thead>
          <tbody>
            <?php foreach ($list as $row) : ?>

              <tr>
                <td>
                  <input type="checkbox">

                </td>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td></td>
                <td></td>
                <td class="text-center">
                  <?php if($row['status']==1):?>
                   
                  <?php else:?>
                    <a class="btn btn-sm btn-danger" href="index.php?option=slider&cat=status&id=<?= $row['id'] ?>">
                  <i class="fas fa-toggle-off"></i>
                  </a>
                  <?php endif;?>
                  <a class="btn btn-sm btn-info" href="index.php?option=slider&cat=detail&id=<?= $row['id'] ?>">
                  <i class="fas fa-eye"></i>
                  </a>

                
                  <a class="btn btn-sm btn-danger" href="index.php?option=slider&cat=delete&id=<?= $row['id'] ?>">
                  <i class="fas fa-trash"></i>
                  </a>
          
                </td>
                
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
<?php require_once('../views/backend/footer.php'); ?>