<?php
$new_list = $db->getRaw("SELECT * FROM news WHERE type = 'tin-tuc'");
$list_video = $db->getRaw("SELECT * FROM images WHERE type = 'video'");
?>
<section id="tintucvideo" class="my-5 px-3">
    <div class="row wrap-content">
        <div class="col-md-6 mb-4">
            <p class="sanpham-title mb-5">TIN TỨC</p>
            <?php
            foreach ($new_list as $item):
                ?>
                <div class="row mb-2">
                    <div class="col-5 col-md-4">
                        <a href="<?= $item['slug'] ?>">
                            <img style="height: 150px;" src="assets/images/upload/<?= $item['image'] ?>"
                                onerror="this.src='assets/images/noimage/noimage.png'" alt="Ảnh sản phẩm">
                        </a>
                    </div>
                    <div class="col-7 col-md-8">
                        <a class="sanpham-item-title" href="<?= $item['slug'] ?>">
                            <?= $item['title'] ?>
                        </a>
                        <p style="font-size: 12px;" class="w-100 sanpham-item-desc mb-0 fst-italic">Ngày đăng:
                            <?= $item['create_at'] ?>
                        </p>
                        <p class="tinntuc-item-desc"><?= $item['description'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-md-6 mb-4">
            <p class="sanpham-title mb-5">VIDEO</p>
            <div class="row">
                <?php
                foreach ($list_video as $video): ?>
                    <div class="col-12 box-video-trangchu">
                        <iframe class="w-100 h-100"
                            src="https://www.youtube.com/embed/<?= $f->getYouTubeVideoId($video['link']) ?>" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>