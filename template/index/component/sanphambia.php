<?php
$product_type_list = $db->getRaw('SELECT * FROM product_types');

foreach ($product_type_list as $product_type):
    $id = $product_type['id'];
    $product_list = $db->getRaw("SELECT * FROM products");
    ?>
    <section id="sanphambia" class="px-3">
        <p class="sanpham-title">sản phẩm <?= $product_type['title'] ?></p>

        <!-- <div class="heading-title wrap-content">
            <div class="left-heading" style="max-width: 200px;">
                sản phẩm <?= $product_type['title'] ?>
            </div>
            <a class="heading-link" href="<?= $product_type['slug'] ?>">XEM THÊM >></a>
            <div class="heading-line"></div>
        </div> -->
        <div class="wrap-content row">
            <?php
            foreach ($product_list as $product): ?>
                <div class="col-6 col-sm-4 col-md-3 sanpham-item">
                    <div class="border-item-sanpham">
                        <div class="d-flex flex-column align-items-center">
                            <a class="w-100" href="<?= $product['slug'] ?>">
                                <img class="sanpham-item-image" src="assets/images/upload/<?= $product['image'] ?>"
                                    onerror="this.src = 'assets/images/noimage/noimage.png'" alt="<?= $product['title'] ?>">
                            </a>
                            <a class="sanpham-item-title" href="<?= $product['slug'] ?>">
                                <?= $product['title'] ?>
                            </a>
                            <p class="sanpham-item-desc"><?= $product['price'] ?></p>
                        </div>
                        <a href="<?= $product['slug'] ?>" class="btn btn-sanpham w-100">
                            <i style="font-size: 14px;"
                                class="fa-solid fa-phone d-none d-lg-inline me-2"></i><?= $setting_info[2]['setting_value'] ?>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php endforeach; ?>