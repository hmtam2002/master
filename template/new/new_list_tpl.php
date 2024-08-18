<?php
$new_list = $db->getRaw("SELECT * FROM news WHERE type = '$url'");
switch ($url)
{
    case 'tin-tuc':
        $vietsub = 'Tin tức';
        break;
    case 'khuyen-mai':
        $vietsub = 'Khuyến mãi';
        break;
}
$title = $vietsub;
$active = $url;
if (empty($new_list))
{
    setFlashData('smg', 'Nội dung chưa cập nhật');
    setFlashData('smg_type', 'danger');
}
$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
?>
<div class="py-3 bg-light">
    <div class="wrap-content px-3">
        <a style="font-size: 14px;" class="text-decoration-none" href="./">Trang chủ</a>
        <span style="font-size: 14px;"> / <?= $vietsub ?></span>
    </div>
</div>
<div class="wrap-content my-4 px-3">
    <h2 class="title-lienhe"><?= $vietsub ?></h2>
    <?php
    if (!empty($smg))
    {
        $f->getSmg($smg, $smg_type);
    } ?>
    <div class="row">
        <?php
        foreach ($new_list as $item):
            ?>
            <div class="col-6 col-sm-4 col-md-3">
                <div class="sanpham-item">
                    <a href="<?= $item['slug'] ?>">
                        <img style="min-height: 200px;" src="assets/images/upload/<?= $item['image'] ?>"
                            onerror="this.src='assets/images/noimage/noimage.png'" alt="Ảnh sản phẩm">
                    </a>
                    <a class="sanpham-item-title" href="<?= $item['slug'] ?>">
                        <?= $item['title'] ?>
                    </a>
                    <p style="font-size: 12px;" class="w-100 sanpham-item-desc mb-0 fst-italic">Ngày đăng:
                        <?= $item['create_at'] ?>
                    </p>
                    <p class="sanpham-item-desc"><?= $item['description'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>