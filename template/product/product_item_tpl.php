<div class="py-3 bg-light">
    <div class="wrap-content px-3">
        <a style="font-size: 14px;" class="text-decoration-none" href="./">Trang chủ</a>
        <span style="font-size: 14px;"> / <?= $product['title'] ?></span>
    </div>
</div>
<div class="wrap-content">
    <p class="p-3 bg-light"><span class="text-secondary">Sản phẩm</span> / <?= $product['title'] ?></p>
    <div class="row my-4 px-3">
        <div class="col-md-5">
            <div class="p-2 border rounded-3">
                <img style="min-height: 300px;" src="assets/images/upload/<?= $product['image'] ?>"
                    onerror="this.src='assets/images/noimage/noimage.png'" alt="">
            </div>
        </div>
        <div class="col-md-7">
            <h2 class="fw-bold text-sm"><?= $product['title'] ?></h2>
            <p>Giá: <?= $product['price'] ?></p>
            <p>Mô tả: <?= $product['description'] ?></p>
            <?= $product['content'] ?>
        </div>
    </div>
</div>