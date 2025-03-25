<?php

use App\Models\Slider;
use App\Libraries\Mystring;
use App\Libraries\MessageArt;
use App\Models\Brand;

if (isset($_POST['THEM'])) {
        $slider = Slider::find('id');
        $row->name = $_POST['name'];

        $row->status = $_POST['status'];
        $row->created_at = date('Y-m-d H:i:s');
        $row->created_by = 1;
        //INSERT INTO db_slider() VALUES()
        $row->save();
        MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
        header('location:index.php?option=slider');
    }


if (isset($_POST['CAPNHAT'])) {
    $id = $_POST['id'];
    $row = Slider::find($id);
    $row->name = $_POST['name'];
    $row->sort_order = $_POST['sort_order'];
    $row->status = $_POST['status'];
    $row->updated_at = date('Y-m-d H:i:s');
    $row->updated_by = 1;
    //INSERT INTO db_slider() VALUES()
    $row->save();
    MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật thành công']);
    header('location:index.php?option=slider');
}
