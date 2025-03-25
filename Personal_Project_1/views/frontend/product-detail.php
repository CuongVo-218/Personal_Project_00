<?php

use App\Models\Product;
use App\Models\Category;

$slug = $_REQUEST['id'];
$row_product = Product::where([['status', '=', 1], ['slug', '=', $slug]])->first();
//


$list_category_id = array();
array_push($list_category_id, $row_product->category_id);
$list_category1 = Category::where([['status', '=', 1], ['parent_id', '=', $row_product->category_id]])
    ->get();
if (count($list_category1) > 0) {
    foreach ($list_category1 as $row_cat1) {
        array_push($list_category_id, $row_cat1->id);
        $list_category2 = Category::where([['status', '=', 1], ['parent_id', '=', $row_cat1->id]])

            ->get();
        if (count($list_category2) > 0) {
            foreach ($list_category2 as $row_cat2) {
                array_push($list_category_id, $row_cat2->id);
                $list_category2 = Category::where([['status', '=', 1], ['parent_id', '=', $row_cat2->id]])
                    ->get();
                if (count($list_category3) > 0) {
                    foreach ($list_category3 as $row_cat2) {
                        array_push($list_category_id, $row_cat3->id);
                    }
                }
            }
        }
    }
}

$product_list = Product::where([['status', '=', 1],['id','!=',$row_product->id]])->whereIn('category_id', $list_category_id)
    ->orderBy('created_at', 'DESC')
    ->take(4)
    ->get();
?>
<?php require_once('views/frontend/header.php'); ?>
<form action="index.php?option=cart&addcat=<?= $row_product->id; ?>" method="post">
    <section class="maincontent my-3">
        <div class="container">
            <div class="row product-header">
                <div class="col-md-6">
                    <img class="img-fluid w-100" src="public/images/product/<?= $row_product->image; ?>" alt="<?= $row_product->image; ?>">
                </div>
                <div class="col-md-6">
                    <h1 class="product-name text-center"><?= $row_product->name; ?></h1>
                    <h2 class="product-price">Giá: <?= number_format($row_product->price); ?>VND</h2>
                    <div class="input-group mb-3">
                        <input name="qty" type="number" value="1" class="form-control" aria-describedby="basic-addon2">
                        <button name="ADDCART" type="submit" min="0"class="input-group-text" id="basic-addon2">Đặt mua</button>
                    </div>
                </div>
            </div>
            <div class="row product-detail">
                <div class="col-12">
                    <h5>CHI TIÊT SẢN PHẨM</h5>
                    <p>
                        <?= $row_product->detail; ?>
                    </p>
                </div>
            </div>
            <h5>SẢN PHẨM CÙNG LOẠI</h5>
            <div class="row product-other">
                <?php foreach ($product_list as $product) : ?>

                    <div class="col-md-3 mb-3">
                        <div class="card" style="width: 100%;">
                            <div class="product-image">
                                <a href="index.php?option=product&id=<?= $product->slug; ?>">
                                    <img class="img-fluid" src="public/images/product/<?= $product->image; ?>" alt="<?= $product->image; ?>">
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="index.php?option=product&id=<?= $product->slug; ?>">
                                        <?= $product->name; ?>
                                    </a>
                                </h5>
                                <h4> Giá bán: <?= number_format($product->price); ?>đ</h4>
                            </div>
                            <div class="col-md-12 ">
                                <a href="index.php?option=cart&addcat=<?= $product->id; ?>" class="btn btn-sm btn-success">Thêm vào giỏ hàng</a>
                            </div>


                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</form>
<?php require_once('views/frontend/footer.php'); ?>