<?php
session_start();
unset($_SESSION['loginadmin']);
unset($_SESSION['name']);
unset($_SESSION['user_id']);
header('location:login.php');