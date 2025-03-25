<?php

use App\Models\Post;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = Post::find($id);
$row->delete();
MessageArt::set_flash('message',['type'=>'success','msg'=>'Xoá khỏi CSDL thành công']);
header('location: index.php?option=post');
