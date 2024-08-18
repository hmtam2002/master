<?php
$logo = $db->oneRaw("SELECT * FROM images WHERE type = 'logo'")['image'];
$banner = $db->oneRaw("SELECT * FROM images WHERE type = 'banner'")['image'];
?>
<header id="header">
    <div class="header-top wrap-content justify-content-center justify-content-md-between">
        <div class="d-flex">
            <a href="./">
                <div class="logo-box">
                    <img class="header-logo-image" src="assets/images/upload/<?= $logo ?>" alt="logo"
                        onerror="this.src='assets/images/noimage/noimage.png'">
                </div>
            </a>
            <img class="header-banner-image d-none d-lg-block" src="assets/images/upload/<?= $banner ?>" alt="logo"
                onerror="this.src='assets/images/noimage/noimage.png'">
        </div>
        <nav class="d-none d-md-block mt-5">
            <ul class="menu-list">
                <li class="menu-item">
                    <a class="menu-link <?= $active == 'trang-chu' ? 'active' : '' ?> " href="./">TRANG CHỦ</a>
                </li>
                <li class="menu-item ">
                    <a class="menu-link <?= $active == 'gioi-thieu' ? 'active' : '' ?>" href="gioi-thieu">GIỚI THIỆU</a>
                </li>
                <li class="menu-item">
                    <!-- <a class="menu-link <?= $active == 'san-pham' ? 'active' : '' ?>" href="san-pham">SẢN PHẨM</a> -->
                    <div class="dropdown">
                        <a class="dropdown-toggle menu-link <?= $active == 'san-pham' ? 'active' : '' ?>"
                            href="san-pham" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            SẢN PHẨM
                        </a>
                        <ul class="dropdown-menu" style="line-height: 1.5;">
                            <li><a style="font-size: 14px;" class="dropdown-item" href="san-pham">TẤT CẢ SẢN PHẨM</a>
                            </li>
                            <?php
                            $product_type_list = $db->getRaw("SELECT * FROM product_types");
                            foreach ($product_type_list as $product_type): ?>
                                <li><a style="font-size: 14px;" class="dropdown-item"
                                        href="<?= $product_type['slug'] ?>"><?= $product_type['title'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </li>
                <li class="menu-item">
                    <a class="menu-link <?= $active == 'tin-tuc' ? 'active' : '' ?>" href="tin-tuc">TIN TỨC</a>
                </li>
                <li class="menu-item">
                    <a class="menu-link <?= $active == 'khuyen-mai' ? 'active' : '' ?>" href="khuyen-mai">KHUYẾN MÃI</a>
                </li>
                <li class="menu-item">
                    <a class="menu-link <?= $active == 'video' ? 'active' : '' ?>" href="video">VIDEO</a>
                </li>
                <li class="menu-item">
                    <a class="menu-link <?= $active == 'lien-he' ? 'active' : '' ?>" href="lien-he">LIÊN HỆ</a>
                </li>
            </ul>
        </nav>
        <div class="header-tel d-none d-lg-flex mt-5">
            <a class="tel-link"
                href="tel:<?= $setting_info[2]['setting_value'] ?>"><?= $setting_info[2]['setting_value'] ?></a>
        </div>
    </div>
</header>



<!-- menu mobile -->
<div id="header-mobile" class="d-md-none">
    <button class="btn ms-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
        aria-controls="offcanvasExample">
        <i class="fa-solid fa-bars text-white fs-2 pt-1"></i>
    </button>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Danh mục</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="menu-mobile">
                <li>
                    <a href="./">TRANG CHỦ</a>
                </li>
                <li>
                    <a href="gioi-thieu">GIỚI THIỆU</a>
                </li>
                <!-- <li>
                    <a href="san-pham">SẢN PHẨM</a>
                </li> -->
                <li>
                    <a data-bs-toggle="collapse" href="#menusanpham" role="button" aria-expanded="false"
                        aria-controls="menusanpham">
                        SẢN PHẨM
                    </a>
                    <div class="collapse" id="menusanpham">
                        <ul class="menu-mobile">
                            <li><a href="san-pham">+ TẤT CẢ SẢN PHẨM</a></li>
                            <?php foreach ($product_type_list as $product_type): ?>
                                <li><a href="<?= $product_type['slug'] ?>">+ <?= $product_type['title'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="tin-tuc">TIN TỨC</a>
                </li>
                <li>
                    <a href="khuyen-mai">KHUYẾN MÃI</a>
                </li>
                <li>
                    <a href="video">VIDEO</a>
                </li>
                <li>
                    <a href="lien-he">LIÊN HỆ</a>
                </li>
            </ul>
        </div>
    </div>

</div>