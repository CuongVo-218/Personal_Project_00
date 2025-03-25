<?php require_once('views/frontend/header.php'); 
use App\Libraries\MessageArt;?>
<?php
use App\Models\User;
if(isset($_POST['btnDangKy']))
{
    $message_alert="";
    $username=$_POST['txtUserName'];
    if($username==""){
      $message_alert="Vui lòng nhập tên đăng nhập";
    }
    $password = $_POST['txtMatKhau'];
    if($password==""){
      $message_alert = "Vui lòng nhập mật khẩu";
    }
    $datebirth = $_POST['dtNgaySinh'];
    if( $datebirth=""){
      $message_alert = "Vui lòng chọn ngày sinh";
    }
    $email = $_POST['txtEmail'];
    if($email=""){
      $message_alert = "Vui lòng nhập email";
    }
    $phonenumber = $_POST['txtSoDienThoai'];
    if( $phonenumber=""){
      $message_alert = "Vui lòng nhập số điện thoại";
    }
    $address = $_POST['txtDiaChi'];
    if( $address=""){
      $message_alert = "Vui lòng chọn địa chỉ";
    }
    if( isset( $message_alert)){
      $row=new User;
      $row->name=$_POST['txtUserName'];
      $row->email=$_POST['txtEmail'];
      $row->phone=$_POST['txtSoDienThoai'];
      $row->username=$_POST['txtUserName'];
      $row->password=$password=sha1($_POST['txtMatKhau']);
      $row->address=$_POST['txtDiaChi'];
      $row->image="";
      $row->roles="2";
      $row->created_at= date('Y-m-d H:i:s');
      $row->created_by=1;
      $row->updated_at= date('Y-m-d H:i:s');
      $row->updated_by=1;
      $row->status=1;
      $row->save();
      MessageArt::set_flash('message',['type'=>'success','msg'=>'Đăng ký thành côngp']);
      $_SESSION['logincustomer']=$username;
      $_SESSION['user_id']=$row->id;
    echo "<script>alert('Đăng ký thành công');location.href='./';</script>";
    }
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
<!DOCTYPE html>
<html>

<head>
  <title>Đăng ký thành viên</title>
  <meta charset="utf-8" />
</head>

<body>
  <h1>Đăng ký thành viên</h1>

  <form name="frmDangKyThanhVien" id="frmDangKyThanhVien" method="post">
    <table width="1000px" cellspacing="0" cellpadding="15px">
      <!-- Họ tên row - Start -->
      <tr>
        <td width="100px">
          <label for="txtHoTen">Tên đăng nhập:</label>
        </td>
        <td>
          <input type="text" name="txtUserName" id="txtHoTen" value="" required="required"
            placeholder="Vui lòng nhập tên đăng nhập" autofocus="autofocus" />
        </td>
      </tr>
      <!-- Họ tên row - End -->
      <!-- Mật khẩu row - Start -->
      <tr>
        <td>
          <label for="txtMatKhau">Mật khẩu:</label>
        </td>
        <td>
          <input type="password" name="txtMatKhau" id="txtMatKhau" value="" required="required"
            placeholder="Vui lòng nhập mật khẩu" maxlength="32" />
        </td>
      </tr>
 
      <tr>
        <td>
          Giới tính:
        </td>
        <td>
          <label><input type="radio" name="rdGioiTinh" id="rdGioiTinh-1" value="1" checked="checked" /> Nam</label>
          <label><input type="radio" name="rdGioiTinh" id="rdGioiTinh-2" value="2" /> Nữ</label>
          <label><input type="radio" name="rdGioiTinh" id="rdGioiTinh-3" value="3" /> Không công bố</label>
        </td>
      </tr>
    
      <tr>
        <td>
          <label for="txtEmail">Email của bạn:</label>
        </td>
        <td>
          <input type="email" name="txtEmail" id="txtEmail" required="true" />
        </td>
      </tr>

      <tr>
        <td>
          <label for="txtSoDienThoai">Số điện thoại:</label>
        </td>
        <td>
          <input type="tel" name="txtSoDienThoai" id="txtSoDienThoai" required="true" pattern="[0-9]{10,}" title="Định dạng là nhập là: Nhập 10 số trở lên xxxxxxxxxx" />
        </td>
      </tr>
      <tr>
        <td>
          <label for="txtNgaySinh">Ngày sinh:</label>
        </td>
        <td>
          <input type="date" name="dtNgaySinh" id="dtNgaySinh" min="2020-01-01" /><br />
        </td>
      </tr>
      
      <tr>
        <td>
          <label for="txtDiaChi">Địa chỉ</label>
        </td>
        <td>
          <input type="text" name="txtDiaChi" id="txtDiaChi" list="danhsachtinhthanhpho" />
          <datalist id="danhsachtinhthanhpho">
            <option>Cần Thơ</option>
            <option>Vĩnh Long</option>
            <option>Hậu Giang</option>
            <option>Cà Mau</option>
            <option>Hồ Chí Minh</option>
            <option>Sóc Trăng</option>
          </datalist>
        </td>
      </tr>
     
      <tr>
        <td colspan="2" align="center">
          <input type="submit" name="btnDangKy" id="btnDangKy" value="Đăng ký" />
        </td>
      </tr>


    </table>
    <?php if( isset( $message_alert)):?>
                    <div class="mb-3">
                        <div class="alert alert-info">
                            <?= $message_alert;?>
                        </div>

                    </div>
                    
                    <?php endif;?>
  </form>
</body>
<div>
  <?php require_once('views/frontend/footer.php'); ?>
</div>


</html>