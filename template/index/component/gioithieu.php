<?php
$gioithieu_content = $db->oneRaw("SELECT * FROM news WHERE type = 'gioi-thieu-index'")['content'];
$gioithieu_img = $db->oneRaw("SELECT * FROM images WHERE type = 'gioi-thieu'")['image'];
?>
<div class="wrap-content mt-5 row">
    <div class="col-md-6 mb-5">
        <p class="gioithieu-head">Giới thiệu về chúng tôi</p>
        <p class="gioithieu-title-company-name"><?= $setting_info[0]['setting_value'] ?></p>
        <div class="gioithieu-index-content">
            <?= $gioithieu_content ?>
        </div>
        <hr>
        <a href="gioi-thieu" class="btn btn-xemthem">Xem thêm >>></a>
    </div>
    <div class="col-md-6 pt-5 ps-5 mb-5 position-relative">
        <div class="gioi-thieu-box-image rounded-3">
            <img class="w-100 img-gioithieu shadow-lg rounded-3" onerror="this.src='assets/images/noimage/noimage.png'"
                src="assets/images/upload/<?= $gioithieu_img ?>" alt="Hình ảnh giới thiệu">
        </div>
    </div>
</div>