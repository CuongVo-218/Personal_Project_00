<?php
use App\Models\Product;
use App\Libraries\Phantrang;
//phân trang
$limit = 6;
$page=Phantrang::pageCurrent();
$offset = Phantrang::pageOffset($page, $limit);
$total = Product:: where('status','=',1)->count();
$pageNumber= ceil($total/$limit);
$pageLinks='';
$list_product = Product:: where('status','=',1)
->skip($offset)
->take($limit)
->orderBy('created_at', 'DESC')
->get();

?>
<?php require_once('views/frontend/header.php'); ?>
<section class="maimcontent my-3">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            <?php require_once('views/frontend/mod_listcategory.php');
             require_once('views/frontend/mod_listbrand.php'); ?>
            </div>
            <div class="col-md-9">
                <h2 class="text-center">TẤT CẢ SẢN PHẨM</h2>
                <div class="row">

                    <?php foreach($list_product as $product):?>
                    <div class="col-md-4">
                    <div class="product-item border" >
                        <div class="product-image" >
                            <a href="index.ph"p?option=product&id=<?= $product->slug;?>">
                            <img class="img-fluid" src="public/images/product/<?= $product->image;?>" alt="">
                            </a>
                        </div>

                        <div class="product-name">
                            <h3>
                                <a href="index.php?option=product&id=<?= $product->slug;?>">
                                     <?= $product->name;?>
                                </a>
                            </h3>
                        </div>


                        <div class="product-price-cart">
                            <div class="row">
                                <div class="col-md-6">Giá: <?= number_format($product->price) ;?></div>
                                <div class="col-md-4 ">
                                    <a href="index.php?option=cart&addcat=<?= $product->id; ?>" class="btn btn-sm btn-success">Thêm vào giỏ hàng</a>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
                <?php endforeach ;?>
                </div>
                <div><?=Phantrang::pageLinks($total, $page, $limit, 'index.php?option=product');?></div>
            </div>
        </div>
    </div>
</section>
<?php require_once('views/frontend/footer.php'); ?>
