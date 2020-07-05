<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Windows 10
 * Date: 6/18/2019
 * Time: 5:55 AM
 */
    session_destroy();
    header("location:login.php");
?>