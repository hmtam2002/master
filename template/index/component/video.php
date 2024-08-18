<?php
$list_video = $db->getRaw("SELECT * FROM images WHERE type = 'video'");
?>
<section class="px-3">
    <p class="sanpham-title">VIDEO</p>
    <!-- <div class="heading-title wrap-content">
        <div class="left-heading">
            VIDEO
        </div>
        <a class="heading-link" href="video">XEM THÊM >></a>
        <div class="heading-line"></div>
    </div> -->
    <div class="wrap-content row">
        <?php
        foreach ($list_video as $video): ?>
            <div style="height: 500px;" class="col-md-3 p-1">
                <iframe class="w-100 h-100" src="https://www.youtube.com/embed/<?= $f->getYouTubeVideoId($video['link']) ?>"
                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        <?php endforeach; ?>
    </div>
</section>