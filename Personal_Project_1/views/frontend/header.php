<!DOCTYPE html>
<html lang="en">
<hoad>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatiple" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title><?=$title?? 'SHOP';?></title>
  <link rel="stylesheet" href="public/css/all.min.css">
  <link rel="stylesheet" href="public/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/css/layoutsite.css">
  <link rel="stylesheet" href="public/css/style.css">
  </head>

  <body>
    <section class="topbar boder-bottom ">
      <div class="container ">
        <div class="row">
        <div class="col-md-5 fs-6 text-danger text-center">
           <a class="navbar-brand" href="#"><i class="fa-solid fa-phone-volume"></i> HOTLINE:123456789</a></div>
           <div class="col-md-3 fs-6 text-center">
              <a class="navbar-brand" href="#"><i class="fa-solid fa-map-location-dot"></i> HỆ THỐNG CỬA<br>HÀNG</a></div>
          
          <div class="col-md-2 ">
            <a href="index.php?option=cart" id="aa">
              <div id="cart">
                <div class="text-center" id="txt">
                  <img src="public/images/shoping.png" alt="icon" style="width: 25px;height: 25px;">
                  <span>Giỏ hàng</span>
                  <div id="slgh">
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-2 ">
            <a href="index.php?option=customer&f=login" id="aa">
              <div id="login">
                <div class="text" id="txt">
                  <img src="public/images/user.png" alt="user" style="width: 25px;height: 25px;">
                  <span id="textDN">Đăng nhập</span>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
      </div>
    </section>
    <section class="header">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <a href="http://localhost/LTWeb/VoSiCuong2118110178/" title="Logo">
              <img src="public/images/logos.jpg" alt="" width="150px">
            </a>

          </div>

          <div class="col-md-5">
          <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
          <div class="col-md-3 text-danger">
            <h5>Khuyến mãi hè siêu ưu đãi
            <p>Giảm 50% </h5>
          </div>
          <div class="col-md-">

          </div>
        </div>
      </div>
    </section>
    <!--section header-->
    <section class="mainmenu bg-mainmenu">
      <div class="container">
        <?php require_once('views/frontend/mod_mainmenu.php'); ?>


      </div>
    </section>