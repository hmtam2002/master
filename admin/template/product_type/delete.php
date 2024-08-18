<?php
$id = $func->filter()['id'];
$db->delete('product_types', "id='$id'");

setFlashData('smg', 'Xoá thành công');
$func->redirect('?com=product_type&act=list');
