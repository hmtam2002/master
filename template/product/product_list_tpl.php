<?php
$active = 'san-pham';
$list_sanpham = $db->getRaw('SELECT * FROM products');
if (empty($list_sanpham))
{
    setFlashData('smg', 'Nội dung đang được cập nhật');
    setFlashData('smg_type', 'danger');
}
$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
?>
<div class="py-3 bg-light">
    <div class="wrap-content px-3">
        <a style="font-size: 14px;" class="text-decoration-none" href="./">Trang chủ</a>
        <span style="font-size: 14px;"> / <?= empty($title) ? 'TẤT CẢ SẢN PHẨM' : $title ?></span>
    </div>
</div>
<div class="wrap-content my-4 px-3">
    <p class="title-lienhe"><?= empty($title) ? 'TẤT CẢ SẢN PHẨM' : $title ?></p>
    <?php
    if (!empty($smg))
    {
        $f->getSmg($smg, $smg_type);
    } ?>
    <div class="row">
        <?php foreach ($list_sanpham as $sanpham): ?>
            <div class="col-6 col-sm-4 col-md-3">
                <div class="sanpham-item">
                    <a href="<?= $sanpham['slug'] ?>">
                        <img style="height: 200px;" src="assets/images/upload/<?= $sanpham['image'] ?>"
                            onerror="this.src='assets/images/noimage/noimage.png'" alt="Ảnh sản phẩm">
                    </a>
                    <a class="sanpham-item-title" href="<?= $sanpham['slug'] ?>">
                        <?= $sanpham['title'] ?>
                    </a>
                    <p class="sanpham-item-desc"><?= $sanpham['price'] ?></p>
                    <p class="sanpham-item-desc"><?= $sanpham['description'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>