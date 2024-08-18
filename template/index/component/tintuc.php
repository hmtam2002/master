<?php
$new_list = $db->getRaw("SELECT * FROM news WHERE type = 'tin-tuc'");
?>
<section id="" class="px-3">
    <p class="sanpham-title">TIN TỨC</p>
    <!-- <div class="heading-title wrap-content">
        <div class="left-heading">
            TIN TỨC
        </div>
        <a class="heading-link" href="tin-tuc">XEM THÊM >></a>
        <div class="heading-line"></div>
    </div> -->
    <div class="wrap-content row">
        <?php
        foreach ($new_list as $item):
            ?>
            <div class="col-12 col-sm-4 col-md-3">
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
</section>