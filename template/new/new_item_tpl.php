<div class="py-3 bg-light">
    <div class="wrap-content px-3">
        <a style="font-size: 14px;" class="text-decoration-none" href="./">Trang chủ</a>
        <span style="font-size: 14px;"> / <?= $title ?></span>
    </div>
</div>
<div class="wrap-content px-3 my-4">
    <p class="title-lienhe"><?= $title ?></p>
    <?php if (empty($new))
    {
        $func->getSmg('Nội dung chưa được cập nhật', 'warning');
    } else
    { ?>
        <!-- <h2 class="title-gioithieu-company"><?= $new['title'] ?></h2> -->
        <div class="new-content">
            <?= $new['content'] ?>
        </div>
        <?php
    } ?>
</div>