<?php
use App\Models\Brand;
use App\Models\Product;
use App\Libraries\Phantrang;
$slug=$_REQUEST['cat'];
$row_brand=Brand::where([['status','=',1],['slug','=',$slug]])->first();
$brand_id=$row_brand->id;

//xử lý phân trang 
$page=Phantrang::pageCurrent();
$limit=8;
$offset=Phantrang::pageOffset($page,$limit);
$toltal=Product::where([['status','=',1],['brand_id','=',$brand_id]])->count();
//end

$product_list=Product::where([['status','=',1],['brand_id','=',$brand_id]])
->orderBy('created_at','DESC')
->skip($offset)
->take($limit)
->get();
?>
<?php require_once('views/frontend/header.php'); ?>
<section class="maincontent my-3">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            <?php require_once('views/frontend/mod_listcategory.php');
             require_once('views/frontend/mod_listbrand.php'); ?>
            </div>
            <div class="col-md-9">
                <h2 class="text-center">Thương Hiệu <?=$row_brand->name;?></h2>
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
                                <div class="col-md-4 ">
                                    <a href="index.php?option=cart&addcat=<?= $product->id; ?>" class="btn btn-sm btn-success">Thêm vào giỏ hàng</a>
                                </div>


                            </div>
                        </div>
                    <?php endforeach; ?>
                    
                </div>
                 <div><?=Phantrang::pageLinks($toltal,$page, $limit,'index.php?option=brand&cat='.$slug);?></div>
            </div>
        </div>
    </div>
</section>
<?php require_once('views/frontend/footer.php'); ?>