<?php

//
//  This application develop by PEPIUOX.
//  Created by : Lab eMotion
//  Author     : PePiuoX
//  Email      : contact@pepiuox.net
//

session_start();
$file = 'config/dbconnection.php';
if (file_exists($file)) {
    include 'config/dbconnection.php';
    $mypage = $_SERVER['PHP_SELF'];
    $page = $mypage;
    require_once 'start.php';
} else {
    $_SESSION['PathInstall'] = basename(dirname(__FILE__));
    header('Location: admin/install.php');
}
?>
