<?php

use App\Models\Product;

if (!isset($_SESSION['logincustomer'])) {
    header('location:index.php?option=customer&f=login');
}
$content_cart = null;
if (isset($_SESSION['contentcart'])) {
    $content_cart = $_SESSION['contentcart'];
}
?>
<?php require_once('views/frontend/header.php'); ?>
<form action="index.php?option=cart&checkoutCart=true" method="post">
    <!--section mainmenu-->
    <section class="maincontent">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h1 class="text-center">GIỎ HÀNG CỦA BẠN</h1>
                    <?php if ($content_cart != null) : ?>
                        <table class="table table-bordered">
                            <tr>
                                <th>Id</th>
                                <th style="width: 100px">Hình</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>

                            </tr>
                            <?php $total_money = 0; ?>
                            <?php foreach ($content_cart as $cart) : ?>
                                <?php
                                $product = Product::find($cart['id']);
                                ?>
                                <tr>
                                    <th><?= $cart['id']; ?></th>
                                    <th><img class="img-fluid" src="public/images/product/<?= $product->image; ?>" alt="<?= $product->image; ?>"></th>
                                    <th><?= $product->name; ?></th>
                                    <th><?= number_format($cart['price']); ?></th>
                                    <th>
                                        <?= $cart['qty']; ?>
                                    </th>
                                    <th><?= number_format($cart['amount']); ?></th>

                                </tr>
                                <?php $total_money += $cart['amount']; ?>
                            <?php endforeach; ?>

                        </table>
                    <?php else : ?>
                        <h3>Chưa có sản phẩm trong giỏ hàng</h3>

                    <?php endif; ?>
                </div>
                <div class="col-md-3">
					<p>VUI LÒNG ĐIỀN THÔNG TIN</p>
                    <button type="submit">THANH TOÁN</button>
                    <div class="mb-3">
                        <input name="name"type="text" class="form-control" placeholder="Họ tên">
                    </div>
                    <div class="mb-3">
                        <input name="phone"type="text" class="form-control" placeholder="Điện thoại">
                    </div>
                    <div class="mb-3">
                        <input name="email"type="text" class="form-control" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input name="addres"type="text" class="form-control" placeholder="Địa chỉ">
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
<?php require_once('views/frontend/footer.php'); ?>
