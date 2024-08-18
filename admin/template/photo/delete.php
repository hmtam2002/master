<?php
$filterAll = $func->filter();
if (!empty($filterAll['id']))
{
    $id = $filterAll['id'];
    $type = $filterAll['type'];
    $slider_detail = $db->getRows("SELECT * FROM images WHERE id=$id");
    if ($slider_detail > 0)
    {
        //thực hiện xoá
        $deleteSlider = $db->delete("images", "id = $id");
        if ($deleteSlider)
        {
            setFlashData("smg", "Đã xoá thành công");
            setFlashData("smg_type", "danger");
        }
    } else
    {
        setFlashData("smg", "Slider không tồn tại trong hệ thống");
        setFlashData("smg_type", "danger");
    }

} else
{
    setFlashData("smg", "Liên kết không tồn tại");
    setFlashData("smg_type", "danger");
}
$func->redirect("?com=photo&act=man_photo&type=$type");