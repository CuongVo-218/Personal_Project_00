<?php

use App\Models\Post;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
if (!is_numeric($id)) {
    header("location:index.php?option=page");
}

$row = Post::where([['id', '=', $id], ['status', '!=', 0]])->first();
//$row=new post();
// $row=post::find($id);
if ($row == NULL) {
    header("location:index.php?option=page");
}
$row->status = ($row->status == 1) ? 2 : 1;
$row->updated_at = date('Y-m-d H:i:s');
$row->updated_by = $_SESSION['user_id'] ?? 1;
$row->save();
MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật thành công']);
header('location: index.php?option=page');
 