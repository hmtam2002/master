<?php
$filterAll = $func->filter();
$id = $filterAll['id'];
$type = $filterAll['type'];
$db->delete('news', "id='$id'");
setFlashData('smg', 'Xoá thành công');
$func->redirect("?com=new&act=list&type=$type");
