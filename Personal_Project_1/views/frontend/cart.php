<!-- xử lý giỏ hàng -->
<?php
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Orderdetail;
use App\Libraries\Cart;
// unset($_SESSION['contentcart']);
if(isset($_REQUEST['addcat']))
{
    $id=$_REQUEST['addcat'];
    //chi tiết mẫu tin
    $product=Product::find($id);
    $cart_item=array(
        'id'=>$product->id,
        'price'=>$product->price,
        'qty'=>1,
        'amount'=>$product->price,
    );
    
    if(isset($_SESSION['contentcart']))
    {
        $carts=$_SESSION['contentcart'];
        if((Cart::cart_exists($carts,$id)==true)) //true
        {
         $carts=  Cart::cart_update($carts,$id,1);
    
    
    
        }
        else{
            $carts[]=$cart_item;
        }
        $_SESSION['contentcart']=$carts;
    
    }else{
        $carts[]=$cart_item;
        $_SESSION['contentcart']=$carts;
    
    }
     header("location:index.php?option=cart");
}
if(isset($_REQUEST['delcart']))
{
    $id=$_REQUEST['delcart'];
    if(isset($_SESSION['contentcart']))
    {
        $carts=$_SESSION['contentcart'];
        $carts= Cart::cart_delete($carts,$id);
        $_SESSION['contentcart']=$carts;
    }
    
    header("location:index.php?option=cart");

}
if(isset($_POST['updateCart']))
{

    echo"Cập nhật";
    $arr_qty=$_POST['qty'];
    foreach($arr_qty as $id=>$number)
    {
        $carts=$_SESSION['contentcart'];
        $carts=  Cart::cart_update($carts,$id,$number,"update");
        $_SESSION['contentcart']=$carts;
    }
    header("location:index.php?option=cart");
}
if(isset($_REQUEST['checkoutCart']))
{
    //luu vàng bảng order
    $user=User::find( $_SESSION['user_id']);
    $date=getdate();

    $order=new Order();
    $order->note=$date[0];
    $order->user_id=    $_SESSION['user_id'];
    
    $order->address=(isset($_POST['address'])?$_POST['address']:$user['address']);
    $order->name=(isset($_POST['name'])?$_POST['name']:$user['name']);
    $order->phone=(isset($_POST['phone'])?$_POST['phone']:$user['phone']);
    $order->email=(isset($_POST['email'])?$_POST['email']:$user['email']);
    $order->created_at=date('Y-m-d H:i:s');
    $order->status=2;
    if($order->save()){
        $carts=$_SESSION['contentcart'];
        foreach($carts as $cart)
        {
            $orderdetail=new Orderdetail();
            $orderdetail->order_id= $order->id;
            $orderdetail->product_id=$cart['id'];
            $orderdetail->price=$cart['price'];
            $orderdetail->qty=$cart['qty'];
            $orderdetail->amount=$cart['amount'];
            $orderdetail->save();
        }


    }
    unset($_SESSION['contentcart']);
    header("location:index.php?option=cart");



}
if(isset($_REQUEST['checkout']))
{
    require_once('views/frontend/cart-checkout.php');
}else{
    require_once('views/frontend/cart-content.php');
}






// echo"<pre>";
// print_r($carts);
// echo"</pre>";
