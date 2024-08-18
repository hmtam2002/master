<?php
$id = $func->filter()['id'];
$db->delete('products', "id='$id'");
setFlashData('smg', 'Xoá thành công');
$func->redirect('?com=product&act=list');
