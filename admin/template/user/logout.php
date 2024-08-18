<?php

if ($ad->isLogin())
{
    $token = getSession("loginToken");
    $db->delete("admin_token", "token = '$token'");
    removeSession("loginToken");
    removeSession("adminName");
}
$func->redirect("index.php");