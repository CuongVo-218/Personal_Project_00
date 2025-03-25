<?php require_once('views/frontend/header.php'); ?>
<?php
use App\Models\User;
if(isset($_POST['DANGNHAP']))
{
    $message_alert="";
    $username=$_POST['username'];
    $password=sha1($_POST['password']);
    $argc=null;
    if(filter_var($username,FILTER_VALIDATE_EMAIL)){
        $argc=[
            ['email','=',$username],
            ['password','=',$password],
            ['status','=',1]
        ];
    }else
    {
        $argc=[
            ['username','=',$username],
            ['password','=',$password],
            ['status','=',1]
        ];
    }
    
    $user=User::where($argc)->first();
    if($user!=null)
    {
        $_SESSION['logincustomer']=$username;
        $_SESSION['user_id']=$user->id;
        $message_alert="Đăng nhập thành công";
    }
    else{
        $message_alert="tai khoản không chính xác";
    }
}
?>
<!--section mainmenu-->
<section class="maincontent my-3">
    <form action="index.php?option=customer&f=login" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    <h3 class="text-center">ĐĂNG NHẬP KHÁCH HÀNG</h3>
                    <?php if(!isset($_SESSION['logincustomer'])):?>
                    <div class="mb-3">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" require name="username" id="username" placeholder="Tên đăng nhập hoặc email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password">Mật khẩu</label>
                        <input type="password" require name="password" id="username" placeholder="Nhập mật khẩu" class="form-control">
                    </div>
                    <div class="md-3">
                        <input name="DANGNHAP" type="submit"class="btn btn-success"value="ĐĂNG NHẬP">
                        <a href="index.php?option=customer&f=signup" class="btn btn-success">ĐĂNG KÝ</a>
                    </div>
                    <?php else:?>
                    <div class="mb-3">
                        <div class="alert alert-info">
                           Bạn đã đăng nhập
                        </div>
                        <a href="http://localhost/HOAITHUONGWEB/index.php">Trang Chủ</a>
                    </div>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?option=customer&f=logout" role="button">
                                <i class="fas fa-th-large"></i> Đăng xuất
                            </a>
                        </li>
                    </ul>
                    <?php endif;?>
                    <?php if( isset( $message_alert)):?>
                    <div class="mb-3">
                        <div class="alert alert-info">
                            <?= $message_alert;?>
                        </div>

                    </div>
                    
                    <?php endif;?>
                </div>
            </div>
        </div>
    </form>
</section>
<?php require_once('views/frontend/footer.php'); ?>