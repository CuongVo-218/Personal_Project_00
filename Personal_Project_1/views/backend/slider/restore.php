<?php
use App\Models\Slider;
use App\Libraries\MessageArt;

$id =$_REQUEST['id'];
$row =Slider::find($id);
$row->status =2;
$row->updated_at=date('Y-m-d H:i:s');
$row->updated_by=1;
$row->save();
MessageArt::set_flash('message',['type'=>'success','msg'=>'Khôi phục thành công']);
header('location:index.php?option=slider&cat=trash');