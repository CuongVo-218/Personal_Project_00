<?php

use App\Models\Category;
use App\Models\Product;
use App\Libraries\Phantrang;


$slug = $_REQUEST['cat'];
$row_cat = Category::where([['status', '=', 1], ['slug', '=', $slug]])->first();

$list_category_id = array();
array_push($list_category_id, $row_cat->id);
$list_category1 = Category::where([['status', '=', 1], ['parent_id', '=', $row_cat->id]])
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
//xử lý phân trang 
$page=Phantrang::pageCurrent();
$limit=4;
$offset=Phantrang::pageOffset($page,$limit);
$toltal=Product::where('status', '=', 1)->whereIn('category_id', $list_category_id)->count();


$product_list = Product::where('status', '=', 1)->whereIn('category_id', $list_category_id)
    ->orderBy('created_at', 'DESC')
    ->skip($offset)
    ->take($limit)
    ->get();
?>
<?php require_once('views/frontend/header.php'); ?>
<section class="maincontent my-3">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            <?php require_once('views/frontend/mod_listcategory.php'); ?>
            <?php require_once('views/frontend/mod_listbrand.php'); ?>
            </div>
            <div class="col-md-9">
                <h2 class="text-center"><?=$row_cat->name;?></h2>
                <div class="row">
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
                 <div><?=Phantrang::pageLinks($toltal,$page, $limit,'index.php?option=product&cat='.$slug);?></div>
            </div>
        </div>
    </div>
</section>
<?php require_once('views/frontend/footer.php'); ?>