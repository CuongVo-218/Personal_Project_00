<?php

use App\Models\Post;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
if (!is_numeric($id)) {
    MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Xóa vĩnh viễn thành công']);
    header("location:index.php?option=page&cat=trash");
}

$row = Post::where([['id', '=', $id], ['status', '=', 0]])->first();

if ($row == NULL) {
    header("location:index.php?option=page&cat=trash");
}
$row->delete();

MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Xóa vĩnh viễn thành công']);
header('location:index.php?option=page&cat=trash');
