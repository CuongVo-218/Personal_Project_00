<?php
namespace App\Libraries;
class MessageArt
{
    public static function set_flash($name,$msg)
    {
        $_SESSION[$name]=$msg;
    }

    public static function get_flash($name)
    {
       $message= $_SESSION[$name];
       unset($_SESSION[$name]);
       return  $message;
    }
    public static function has_flash($name)
    {
       return isset($_SESSION[$name]) ;
    }
}
