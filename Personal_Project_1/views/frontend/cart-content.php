<?php

use App\Models\Product;

$content_cart = null;
if (isset($_SESSION['contentcart'])) {
    $content_cart = $_SESSION['contentcart'];
}
?>
<?php require_once('views/frontend/header.php'); ?>
<form action="index.php?option=cart"method="post">
    <!--section mainmenu-->
<section class="maincontent">
    <div class="container">
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
                    <th>Xoá</th>
                </tr>
                <?php $total_money=0;?>
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
                            <input style="width:50px"min="0"type="number"name="qty[<?= $cart['id']; ?>]"value="<?= $cart['qty']; ?>"/>
                        </th>
                        <th><?= number_format($cart['amount']); ?></th>
                        <th class="text-center">
                            <a class="btn btn-sm btn-danger" href="index.php?option=cart&delcart=<?= $cart['id']; ?>">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </th>
                    </tr>
                    <?php $total_money+=$cart['amount'];?>
                <?php endforeach; ?>
                <tr>
                    <th colspan="4">
                        <a class="btn btn-sm btn-danger" href="index.php?option=cart&delcart=all">
                            Xoá Tất Cả
                        </a>
                        <input type="submit"name="updateCart" class="btn btn-sm btn-info" value="Cập nhật">
                        <a class="btn btn-sm btn-success" href="index.php?option=cart&checkout=true">Thanh toán</a>
                    </th>

                    <th colspan="3" class="text-end">
                        <strong>TỔNG TIỀN:<?=number_format($total_money)."VND";?></strong>
                    </th>
                </tr>
            </table>
        <?php else : ?>
            <h3>Chưa có sản phẩm trong giỏ hàng</h3>

        <?php endif; ?>

    </div>
</section>
</form>
<?php require_once('views/frontend/footer.php'); ?>
