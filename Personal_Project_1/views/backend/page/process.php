<?php

use App\Models\Post;
use App\Libraries\Mystring;
use App\Libraries\MessageArt;


if (isset($_POST['THEM'])) {
    $row = new Post;
    $row->title = $_POST['title'];
    $row->slug = Mystring::str_slug($_POST['title']);
    $row->topic_id = $_POST['topic_id'];
    $row->detail = $_POST['detail'];
    $row->type = $_POST['type'];
    $row->metadesc = $_POST['metadesc'];
    $row->metakey = $_POST['metakey'];
    $row->status = $_POST['status'];
    $row->created_at = date('Y-m-d H:i:s');
    $row->created_by =  $_SESSION['user_id'];
    $row->save();
    if (in_array($file_extension, ['png', 'gif', 'jpg'])) {
        $path_file = $path_dir . $row->slug . "." . $file_extension;
        move_uploaded_file($file['tmp_name'], $path_file);
        $row->image = $row->slug . "." . $file_extension;
        //end uploadfile
        // $row->save();
        // header('location:index.php?option=post');
        // MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    } else {
        header('location:index.php?option=page&cat=create');
        MessageArt::set_flash('message', ['type' => 'danger', 'msg' => 'Hình ảnh không hợp lệ']);
    }
    $row->save();
    header('location:index.php?option=page');
    MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Thêm trang đơn thành công']);
}



if (isset($_POST['CAPNHAT'])) {
    $id = $_POST['id'];
    $row = Post::find($id);
    $row->title = $_POST['title'];
    $row->detail = $_POST['detail'];
    $row->type = $_POST['type'];
    $row->metadesc = $_POST['metadesc'];
    $row->metakey = $_POST['metakey'];
    $row->status = $_POST['status'];
    $row->topic_id = $_POST['topic_id'];
    $row->slug = Mystring::str_slug($_POST['title']);
    $row->updated_at = date('Y-m-d H:i:s');
    $row->updated_by = $_SESSION['user_id'];
    $row->save();
    if (strlen($_FILES["img"]['name']) != 0) {
        $path_dir = "../public/images/product/";
        $file = $_FILES["img"];
        $path_file = $path_dir . basename($file["name"]);
        $file_extension = strtolower(pathinfo($path_file, PATHINFO_EXTENSION));
        if (!in_array($file_extension, ['png', 'gif', 'jpg'])) {
            header('location:index.php?option=page&cat=edit');
            MessageArt::set_flash('message', ['type' => 'danger', 'msg' => 'Hình ảnh không hợp lệ']);
        }
        $path_file = $path_dir . $row->slug . "." . $file_extension;
        $path_delete = $path_dir . $row->image;
        if (file_exists($path_delete)) {
            unlink($path_delete);
        }
        move_uploaded_file($file['tmp_name'], $path_file);
        $row->image = $row->slug . "." . $file_extension;
        //end uploadfile
    }
    // $row->save();
    // header('location:index.php?option=post');
    // MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'cập nhật thành công']);
    $row->save();
    MessageArt::set_flash('message',['type'=>'success','msg'=>'Cập nhật trang đơn thành công']);
    header('location:index.php?option=page');
}
