<?php
$footer_list = $db->oneRaw("SELECT * FROM news WHERE type = 'footer'")['content'];
$chinhsach_list = $db->getRaw("SELECT * FROM news WHERE type = 'chinh-sach'");
?>
<footer id="footer">
    <div class="wrap-content d-flex flex-column flex-md-row justify-content-between px-3 px-md-0">
        <div class="footer-info-list mb-2">
            <p class="footer-title-fanpage"><?= $setting_info[0]['setting_value'] ?></p>
            <?= $footer_list ?>
        </div>
        <div class="footer-chinhsach-list mb-2">
            <p class="footer-title-fanpage">CHÍNH SÁCH</p>
            <ul class="footer-list-chinhsach-ul">
                <?php
                foreach ($chinhsach_list as $chinhsach): ?>
                    <li><a href="<?= $chinhsach['slug'] ?>"><?= $chinhsach['title'] ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="footer-chinhsach-list mb-2">
            <p class="footer-title-fanpage">Fanpage</p>
            <div class="footer-fanpage-content">
                <div class="fb-page" data-href="<?= $setting_info[4]['setting_value'] ?>" data-tabs="timeline"
                    data-width="360" data-height="200" data-small-header="true" data-adapt-container-width="false"
                    data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="<?= $setting_info[4]['setting_value'] ?>" class="fb-xfbml-parse-ignore"><a
                            href="<?= $setting_info[4]['setting_value'] ?>">Facebook</a></blockquote>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="google-map pb-5 pb-md-0">
    <?= $setting_info[8]['setting_value'] ?>
</div>
<div class="d-md-none position-fixed bottom-0 start-0 end-0">
    <div class="p-2">
        <a href="https://zalo.me/<?= $setting_info[3]['setting_value'] ?>"><img style="width: 50px; height: 50px ;"
                src="assets/images/page/zalo.png"></a>
    </div>
    <div class="row bg-primary py-3">
        <div class="col d-flex flex-column align-items-center">
            <a class="text-center text-decoration-none text-white" href="tel:<?= $setting_info[2]['setting_value'] ?>">
                <i class="fa-solid fa-phone fs-5"></i>
                <p class="m-0 mt-2">Gọi ngay</p>
            </a>
        </div>
        <div class="col d-flex flex-column align-items-center">
            <a class="text-center text-decoration-none text-white" href="sms:<?= $setting_info[2]['setting_value'] ?>">
                <i class="fa-regular fa-message fs-5"></i>
                <p class="m-0 mt-2">Nhắn tin</p>
            </a>
        </div>
        <div class="col d-flex flex-column align-items-center">
            <a class="text-center text-decoration-none text-white" href="<?= $setting_info[7]['setting_value'] ?>">
                <i class="fa-brands fa-facebook-messenger fs-5"></i>
                <p class="m-0 mt-2">Facebook</p>
            </a>
        </div>
        <div class="col d-flex flex-column align-items-center">
            <a class="text-center text-decoration-none text-white" target="_blank"
                href="<?= $setting_info[7]['setting_value'] ?>">
                <i class="fa-solid fa-map-location-dot fs-5"></i>
                <p class="m-0 mt-2">Chỉ đường</p>
            </a>
        </div>

    </div>
</div>